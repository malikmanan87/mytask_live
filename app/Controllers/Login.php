    <?php

    namespace App\Controllers;

    use CodeIgniter\Controller;
    use App\Models\Login_model;
    use CodeIgniter\Config\BaseConfig;

    class Login extends Controller
    {
        public function index()
        {
            helper(['form']);
            echo view('login');
        }

        public function auth()
        {
            $username = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            // initiate curl request
            $client = \Config\Services::curlrequest();
            $response = $client->request("POST", "https://disruptivetech.unisza.edu.my/api/common/v1/auth/login", ['json' => ['username' => $username, "password" => $password],]);

            $data = json_decode($response->getBody());

            // jika kod 200 - success
            if ($data->status == 200) { echo "200";
                $session = session();
                $newdata = [
                    'email'  => $data->data->info->email,
                    'staffno'     => $data->data->info->idnumber,
                    'name'     => $data->data->info->nama,
                    'logged_in' => true,
                ];            
                $session->set($newdata);
                return redirect()->to('/home');
            }else { 
                    return redirect()->to('/login')->with('create', 'success');
                }
        }

        public function denied()
        {
            echo view('denied');
        }

        public function logout()
        {
            $session = session();
            $session->destroy();
            return redirect()->to('/');
        }
    }

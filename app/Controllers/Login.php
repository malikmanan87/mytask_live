<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Login_model;
use CodeIgniter\Config\BaseConfig;

class Login extends Controller
{
    public function index()
    {
        $client = \Config\Services::curlrequest();
        // $client = service('curlrequest');
        if ($client) {
            echo "ada";
        }

        // $response = $client->request('POST', 'https://disruptivetech.unisza.edu.my/api/common/v1/auth/login', [
        //     'auth' => ['malikmanan', 'Passw0rd@un1sz4' , 'digest'],
        // ]);
        // echo $response->getBody();

        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $username = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // https://disruptivetech.unisza.edu.my/api/common/v1/auth/login,{"username" : "malikmanan","password" : "Passw0rd@un1sz4"}



        $model = new Login_model();
        $data['auth'] = $model->getUser($username, $password);

        if (!empty($data['auth'])) {
            $session = session();
            $session->set('email', $this->request->getVar('email'));
            $session->set('logged_in', true);
            return redirect()->to('/home');
        } else {
            // return redirect()->to('/denied');
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

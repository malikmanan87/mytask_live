<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Access_model;

class Login extends Controller
{
    public function index()
    {
        $session = session();
        if ($session->logged_in == true) {
            return redirect()->to('/home');
        }
        // helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $username = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        // initiate curl request
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request("POST", "https://disruptivetech.unisza.edu.my/api/common/v1/auth/login", ['json' => ['username' => $username, "password" => $password],]);
            $jsondata = json_decode($response->getBody());

            $model = new Access_model(); //connect model access utk dptkan lvl access
            $data = $model->getEmail($username);

            if ($data[0] == $username) { //jika ada access dlm table access
                $session = session();
                $newdata = [
                    'email'  => $jsondata->data->info->email,
                    'staffno'     => $jsondata->data->info->idnumber,
                    'name'     => $jsondata->data->info->nama,
                    'logged_in' => true,
                    'access' => 3
                ];
                // $encode = $url_encoded($newdata);
                $session->set($newdata);
                return redirect()->to('/home')->with('signin', 'success');
            } else { //set access sbg staf biasa = 1
                $session = session();
                $newdata = [
                    'email'  => $jsondata->data->info->email,
                    'staffno'     => $jsondata->data->info->idnumber,
                    'name'     => $jsondata->data->info->nama,
                    'logged_in' => true,
                    'access' => 1
                ];
                $session->set($newdata);
                return redirect()->to('/home')->with('signin', 'success');
            }
        } catch (\Exception) {
            // throw new \CodeIgniter\Router\Exceptions\RedirectException($route);
            return redirect()->to('/login')->with('failed', 'success');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}

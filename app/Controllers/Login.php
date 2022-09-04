<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        $session = session();
        if ($session->logged_in == true) {
            return redirect()->to('/home');
        }
        helper(['form']);
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
            $data = json_decode($response->getBody());
            $session = session();
            $newdata = [
                'email'  => $data->data->info->email,
                'staffno'     => $data->data->info->idnumber,
                'name'     => $data->data->info->nama,
                'logged_in' => true,
            ];
            // $encode = $url_encoded($newdata);
            $session->set($newdata);
            return redirect()->to('/home');
        } catch (\Exception $e) {
            // throw new \CodeIgniter\Router\Exceptions\RedirectException($route);
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

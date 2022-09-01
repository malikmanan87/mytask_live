<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Login_model;

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

        // https://disruptivetech.unisza.edu.my/api/common/v1/auth/login

        // $yantemp = strpos($username, "@");
        // if (!$yantemp) {
        //     $username = $username . '@unisza.edu.my';
        // }
        // ini_set("default_socket_timeout", 5); // tak jadi
        // imap_timeout(3, 5); // tak jadi
        // $imapserver = '172.17.1.45:993/imap/ssl/novalidate-cert/readonly';
        // $username = trim(strtolower($username));
        // $mbox = @imap_open("{" . $imapserver . "}", $username, $password, OP_HALFOPEN);

        // if ($mbox) {
        //     echo "success";
        // }
        // else{
        //     echo "failed";
        // }

        // $model = new Login_model();
        // $data['auth'] = $model->getUser($username, $password);

        // if (!empty($data['auth'])) {
            $session = session();
            $session->set('email', $this->request->getVar('email'));
            $session->set('logged_in', true);
            return redirect()->to('/');
        // } else {
        //     return redirect()->to('/denied');
        //     // return redirect()->to('/login')->with('create', 'success');
        // }
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

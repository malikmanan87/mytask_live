<?php

namespace App\Controllers;

use App\Models\Process_model;

use CodeIgniter\Controller;

class Report extends Controller
{
    public function index()
    {
        $session = session();
        $model = new Process_model();
        $data['result'] = $model->getReport($session->email);
        echo view('personal/report', $data);
    }

    public function readme(Type $var = null)
    {
        echo view('readme');
    }
}

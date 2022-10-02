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

    public function allreport(Type $var = null)
    {
        $model = new Process_model();
        $data['result'] = $model->getReport();
        $data['resultrank1'] = $model->getRank1();
        $data['resultrank2'] = $model->getRank2();
        $data['resultrank3'] = $model->getRank3();

        if (empty($data['result'])) {
            return redirect()->back();
        } else
            return view('personal/allreport', $data);
    }

    public function monthly($emel, $month)
    {
        $model = new Process_model();
        $data['result'] = $model->getMonthly(base64_decode($emel), $month);
        if (empty($data['result'])) {
            return redirect()->back();
        } else
            return view('personal/report', $data);
    }

    public function cumulative($emel)
    {
        $model = new Process_model();
        $data['result'] = $model->getCumulative(base64_decode($emel));
        if (empty($data['result'])) {
            return redirect()->back();
        } else
            return view('personal/report', $data);
    }
}

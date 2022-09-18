<?php

namespace App\Controllers;
use App\Models\Process_model;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new Process_model();
        $data['result'] = $model->getRecords();
        $data['stat0'] = $model->getStat(0);        
        $data['stat1'] = $model->getStat(1);
        $data['stat11'] = $model->getStat(11);
        $data['stat2'] = $model->getStat(2);
        $data['stat3'] = $model->getStat(3);
       
        return view('home',$data);
    }
}

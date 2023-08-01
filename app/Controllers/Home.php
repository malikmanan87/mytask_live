<?php

namespace App\Controllers;

use App\Models\Process_model;
use App\Models\Process2_model;

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
        $data['allrecord'] = $model->countAllRecord();

        // utk record isyifaa
        $model2 = new Process2_model();
        $data['result2'] = $model2->getRecords2();

        // get count for chart

        $data['chart1'] = count($model->getChart1('d1'));
        $data['chart2'] = count($model->getChart2('d2'));
        $data['chart3'] = count($model->getChart3('d3'));
        $data['chart4'] = count($model->getChart4('d4'));
        $data['chart5'] = count($model->getChart5('d5'));
        $data['chart6'] = count($model->getChart6('d6'));
        $data['chart7'] = count($model->getChart7('d7'));

        return view('home', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\Ambikanak_model;
use CodeIgniter\I18n\Time;

class Anak extends BaseController
{
    public function index()
    {
        $datetoday = Time::today('Asia/Kuala_Lumpur', 'en_US');
        // return view('forms/ambikanak');
        $model = new Ambikanak_model();
        $data['result'] = $model->findAll();

        // if (!$data['result']) {
        //     $data['result'] = '';
        //     return view('forms/ambikanak', $data);
        // } else
        return view('forms/ambikanak', $data);
    }

    public function saveambikanak()
    {
        $datetoday = Time::today('Asia/Kuala_Lumpur', 'en_US');
        $timenow = Time::now('Asia/Kuala_Lumpur', 'en_US');
        $model = new Ambikanak_model();

        // cari rekod jika dah ada
        $cari = $model->where('tarikh', $datetoday)->findAll();

        // simpan masa masuk ke pejabat
        if ($cari) {
            if ($cari[0]['masamasuk'] == '00:00:00') {
                $data = [
                    'masamasuk' => $timenow,
                ];
                $id = $cari[0]['id'];
                $model->update($id, $data);
                return redirect()->back()->with('masuksuccess', 'success');
            } else {
                return redirect()->back()->with('updatefailed', 'failed');
            }
        } else {
            // simpan masa keluar ambk anak
            $model->save([
                'tarikh' => $datetoday,
                'masakeluar' => $timenow
            ]);
            return redirect()->back()->with('keluarsuccess', 'success');
        }
    }
}

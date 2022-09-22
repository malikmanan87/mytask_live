<?php

namespace App\Controllers;

use App\Models\Access_model;
use CodeIgniter\I18n\Time;

class Staf extends BaseController
{
    public function index()
    {
        $model = new Access_model();
        $data['result'] = $model->getStaf(); //get all staf
        return view('personal/managestaf', $data);
    }

    public function addnewstaf(Type $var = null)
    {

        $newemail = $this->request->getVar('newemail');
        $newaccess = $this->request->getVar('newaccess');

        $model = new Access_model();
        $data['result'] = $model->checkStaf($newemail); //check email if existed

        if ($data['result']) {
            return redirect()->back()->with('existed', 'failed');
        } else {
            $myTime = new Time('now');
            $session = session();
            $model->save([
                'email' => $newemail,
                'level' => $newaccess,
                'created_at' => $myTime,
                'created_by' => $session->email
            ]);
            return redirect()->back();
        }
    }

    public function setaccess($id,$access)
    {
        $model = new Access_model();
        $data['result'] = $model->setAccess($id, $access);
        if ($data['result']) {
            return redirect()->back()->with('successaccess', 'success');
        } else {
            return redirect()->back()->with('failedaccess', 'failed');
        }
    }
}

<?php

namespace App\Controllers;

use App\Models\Contact_model;

class Contact extends BaseController
{
    public function index()
    {
        return view('contact_us/contact');
    }

    public function send(Type $var = null)
    {
        $inputName = $this->request->getVar('inputName');
        $inputEmail = $this->request->getVar('inputEmail');
        $inputSubject = $this->request->getVar('inputSubject');
        $inputMessage = $this->request->getVar('inputMessage');

        $model = new Contact_model();
        $model->save([
            'name' => $inputName,
            'email' => $inputEmail,
            'subject' => $inputSubject,
            'msg' => $inputMessage
        ]);
        return redirect()->back();
    }

    public function complaint(Type $var = null)
    {
        $model = new Contact_model();
        $data['result'] = $model->getMsg();
        if ($data['result']) {
            return view('contact_us/complaint_report', $data);
        } else
            return view('contact_us/complaint_report', $data);
    }

    public function fixInprogress($id, $status)
    {
        $model = new Contact_model();
        $data['result'] = $model->fixInprogress($id, $status);
        if ($data['result']) {
            return redirect()->back()->with('updatesuccess', 'success');
        } else
            return redirect()->back()->with('updatefailed', 'failed');
    }

    public function deletecomp($id)
    {
        $model = new Contact_model();
        $data['result'] = $model->deleteComplain($id);
        if ($data['result']) {
            return view('contact_us/complaint_report', $data);
        } else
            return view('contact_us/complaint_report', $data);
    }
}

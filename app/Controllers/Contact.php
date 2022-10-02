<?php

namespace App\Controllers;

use App\Models\Contact_model;

class Contact extends BaseController
{
    public function index()
    {
        $model = new Contact_model();
        return view('contact_us/contact', $data);
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
            return redirect()->back();
    }
}

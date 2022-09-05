<?php

namespace App\Controllers;

use App\Models\Process_model;
use CodeIgniter\I18n\Time;

class Process extends BaseController
{
    public function new()
    {
        return view('forms/new');
    }

    public function create()
    {
        $session = session();

        $rules = [
            'location' => 'required',
            'phone' => 'required',
            'description' => 'required',
            // 'password' => 'required|min_length[10]',
            // 'passconf' => 'required|matches[password]',
            // 'email'    => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            return view('forms/new', [
                'validation' => $this->validator,
            ]);
        } else {
            $now = new Time('now');
            $model = new Process_model();
            $model->save([
                'cat_device' => $this->request->getVar('devcat'),
                'cat_problem' => $this->request->getVar('probcat'),
                'location' => $this->request->getVar('location'),
                'phone' => $this->request->getVar('phone'),
                'description' => $this->request->getVar('description'),
                'created_by' => $this->request->getVar('createdby'),
                'created_at' => $now,
            ]);
        }
        return redirect()->to('/home')->with('create', 'success');
    }

    public function read($id)
    {
        $model = new Process_model();
        $data['result'] = $model->getRecords($id);

        if (empty($data['result'])) {
            return redirect()->to('/');
        } else
            return view('forms/read', $data);
    }

    public function attend($id)
    {
        $now = new Time('now');
        $session = session();
        $emailattendee = $this->request->getVar('emailattendee');
        $progress = $this->request->getVar('progress');

        $model = new Process_model();
        $data['result'] = $model->getRecords($id);

        if ($data['result']['status'] != 0 and $data['result']['attendee'] != null) { //kalau status dh 1 dan tiada assign tech lg, update action shj
            $update = $model->update($id, ['progress' => $progress, 'updated_at' => $now]);
        } else { //status baru dan assign tech
            $update = $model->changeStatus1($id, $emailattendee);
        }

        if ($update) {
            return redirect()->back()->with('updatesuccess', 'success');
        } else
            return redirect()->back()->with('updatefailed', 'failed');
    }

    public function completedbytech($id)
    { 
        $model = new Process_model();
        $model->update($id, ['status' => 11]);
        return redirect()->to('/home')->with('completed', 'success');
    }

    public function completed($id)
    {
        $model = new Process_model();
        $model->update($id, ['status' => 2]);
        return redirect()->to('/home')->with('completed', 'success');
    }

    public function cancel($id) //cancel case user
    {
        $model = new Process_model();
        $model->update($id, ['status' => 3]);
        return redirect()->to('/home')->with('cancelsuccess', 'success');
    }

    public function newcaselist($id)
    {
        $model = new Process_model();
        $data['result'] = $model->getStatus($id);
        if (empty($data['result'])) {
            return redirect()->to('/');
        } else
            return view('tables/newcaselist', $data);
    }

    public function inprogresslist($id)
    {
        $model = new Process_model();
        $data['result'] = $model->getStatus($id);
        if (empty($data['result'])) {
            return redirect()->to('/');
        } else
            return view('tables/inprogresslist', $data);
    }

    public function completelist($id)
    {
        $model = new Process_model();
        $data['result'] = $model->getStatus($id);
        if (empty($data['result'])) {
            return redirect()->to('/');
        } else
            return view('tables/completelist', $data);
    }

    public function canceledlist($id)
    {
        $model = new Process_model();
        $data['result'] = $model->getStatus($id);
        if (empty($data['result'])) {
            return redirect()->to('/');
        } else
            return view('tables/canceledlist', $data);
    }
}

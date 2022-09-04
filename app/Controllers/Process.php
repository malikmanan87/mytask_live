<?php

namespace App\Controllers;

use App\Models\Report_model;

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
            'probdesc' => 'required',
            // 'password' => 'required|min_length[10]',
            // 'passconf' => 'required|matches[password]',
            // 'email'    => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            return view('forms/new', [
                'validation' => $this->validator,
            ]);
        } else {

            $model = new Report_model();
            $model->save([
                'cat_device' => $this->request->getVar('devcat'),
                'cat_problem' => $this->request->getVar('probcat'),
                'description' => $this->request->getVar('probdesc'),
            ]);
        }
        return redirect()->to('/')->with('create', 'success');
    }

    public function read($id)
    {
        $model = new Report_model();
        $data['result'] = $model->getRecords($id);

        if (empty($data['result'])) {
            return redirect()->to('/');
        } else
            return view('forms/read', $data);
    }

    public function attend($id)
    {
        $model = new Report_model();
        $update = $model->changeStatus1($id);

        if ($update) {
            return redirect()->back()->with('updatesuccess', 'success');
        } else
            return redirect()->back()->with('updatefailed', 'failed');
    }

    public function newcaselist($id)
    {
        $model = new Report_model();
        $data['result'] = $model->getStatus($id);
        if (empty($data['result'])) {
            return redirect()->to('/');
        } else
            return view('tables/newcaselist', $data);
    }

    public function inprogresslist($id)
    {
        $model = new Report_model();
        $data['result'] = $model->getStatus($id);
        if (empty($data['result'])) {
            return redirect()->to('/');
        } else
            return view('tables/inprogresslist', $data);
    }

    public function completelist($id)
    {
        $model = new Report_model();
        $data['result'] = $model->getStatus($id);
        if (empty($data['result'])) {
            return redirect()->to('/');
        } else
            return view('tables/completelist', $data);
    }

    public function canceledlist($id)
    {
        $model = new Report_model();
        $data['result'] = $model->getStatus($id);
        if (empty($data['result'])) {
            return redirect()->to('/');
        } else
            return view('tables/canceledlist', $data);
    }
}

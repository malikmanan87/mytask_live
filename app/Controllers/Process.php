<?php

namespace App\Controllers;

use App\Models\Process_model;
use App\Models\Process2_model;
use CodeIgniter\I18n\Time;

class Process extends BaseController
{
    public function new()
    {
        return view('forms/new');
    }

    public function newisyifaa()
    {
        return view('forms/newisyifaa');
    }

    public function create()
    {
        $session = session();

        $rules = [
            'location' => 'required',
            'user' => 'required',
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

            // generate random 6 char for ticket id
            $letters = 'abcdefghijklmnopqrstuvwxyz';
            $randomid = '';
            for ($x = 0; $x < 3; ++$x) {
                $randomid .= $letters[rand(0, 25)] . rand(0, 9);
            }
            // eoc

            $model->save([
                'ticket_id' => strtoupper($randomid),
                'cat_device' => $this->request->getVar('devcat'),
                'cat_problem' => $this->request->getVar('probcat'),
                'location' => $this->request->getVar('location'),
                'phone' => $this->request->getVar('phone'),
                'description' => $this->request->getVar('description'),
                'created_by' => $this->request->getVar('createdby'),
                'ic_by' => $this->request->getVar('icby'),
                'created_at' => $now,
                'temp_user' => $this->request->getVar('user')
            ]);
        }
        return redirect()->to('/home')->with('create', 'success');
    }

    public function createisyifaa()
    {
        // $session = session();

        $rules = [
            'locationisyifaa' => 'required',
            'userisyifaa' => 'required',
            'descriptionisyifaa' => 'required',
        ];

        

        if (!$this->validate($rules)) {
            return view('forms/new', [
                'validation' => $this->validator,
            ]);
        } else {
            $now = new Time('now');
            $model = new Process2_model();
            // eoc

            // print_r($this->request->getVar('userisyifaa')); die();

            $model->save([
                'locationisyifaa' => $this->request->getVar('locationisyifaa'),
                'userisyifaa' => $this->request->getVar('userisyifaa'),
                'descriptionisyifaa' => $this->request->getVar('descriptionisyifaa'),
                'status' => 0,
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

        // check jika tiada assign pd sape2, auto ambik emel attendee yg klik
        if (!empty($this->request->getVar('assign'))) { //jika ada select tech
            $emailattendee = $this->request->getVar('assign');

            // send emel notification
            // $email = \Config\Services::email();
            // $email->setFrom('admin@mytask.com', 'Admin');
            // $email->setTo($emailattendee);
            // $email->setCC('mekrogayahhussin@unisza.edu.my');
            // $email->setBCC('malikmanan@unisza.edu.my');
            // $email->setSubject('New ticket from MyTask System');
            // $email->setMessage('test');
            // $email->send();

            // if (! $email->send()) {
            //     print_r($email->printDebugger(['headers']));
            //     // return redirect()->back()->with('emailfailed', 'failed');
            //     exit();
            // }

        } else {
            $emailattendee = $this->request->getVar('emailattendee'); //ambil nilai session email
        }

        // $emailattendee = $this->request->getVar('emailattendee');
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

    public function toupdate($id) //update selagi status = 0, new
    {
        $model = new Process_model();
        $data['result'] = $model->getRecords($id);

        return view('forms/update', $data);
    }

    public function doupdate()
    {
        // print_r($_REQUEST);
        $id = $this->request->getVar('uid');
        $u1 = $this->request->getVar('udevcat');
        $u2 = $this->request->getVar('uprobcat');
        $u3 = $this->request->getVar('ulocation');
        $u4 = $this->request->getVar('utemp_user');
        $u5 = $this->request->getVar('uphone');
        $u6 = $this->request->getVar('udescription');
        $u7 = $this->request->getVar('uprogress');

        $model = new Process_model();
        $data['status'] = $model->toUpdate($id, $u1, $u2, $u3, $u4, $u5, $u6, $u7);
        if (empty($data['status'])) {
            return redirect()->back()->with('updatefailed', 'failed');
        } else
            return redirect()->back()->with('updatesuccess', 'success');
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class Process_model extends Model
{
    protected $table      = 'newcomplain';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['ticket_id', 'cat_device', 'cat_problem', 'location', 'phone', 'description', 'created_by', 'created_at', 'updated_at', 'deleted_at', 'status', 'attendee', 'progress', 'temp_user'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    // protected $validationRules = [
    //     'username'     => 'required|alpha_numeric_space|min_length[3]',
    //     'email'        => 'required|valid_email|is_unique[users.email]',
    //     'password'     => 'required|min_length[8]',
    //     'pass_confirm' => 'required_with[password]|matches[password]',
    // ];
    // protected $validationMessages = [
    //     'email' => [
    //         'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
    //     ],
    // ];

    public function getRecords($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }

    public function getStat($id)
    {
        if ($this->where('status', $id)->findColumn('status')) {
            return count($this->where('status', $id)->findColumn('status'));
        } else return '0';
    }

    public function getStatus($id)
    {
        if ($id == 0) {
            return $this->where('status', 0)->findAll();
        } elseif ($id == 1) {
            return $this->whereIn('status', [1, 11])->findAll();
        } elseif ($id == 2) {
            return $this->where('status', 2)->findAll();
        } elseif ($id == 3) {
            return $this->where('status', 3)->findAll();
        } else
            return;
    }

    public function changeStatus1($id, $emailattendee)
    {
        $now = new Time('now');
        return $this->update($id, ['status' => 1, 'attendee' => $emailattendee, 'updated_at' => $now]);
    }

    public function getReport($email = false)
    {
        if ($email === false) {

            $queryawi = "select DISTINCT newcomplain.attendee,table1.cur_month ,table1.cur_ticket, table2.cum_ticket from newcomplain
            left join (
                select DISTINCT attendee, month(created_at) as cur_month,count(ticket_id) as cur_ticket
                from newcomplain
                where month(created_at) = month(CURRENT_DATE)
                GROUP BY attendee, month(created_at)
            ) as table1 on table1.attendee = newcomplain.attendee
            left join (
                select DISTINCT attendee, COUNT(ticket_id) as cum_ticket
                FROM newcomplain
                group by attendee
            ) as table2 on table2.attendee = newcomplain.attendee
            order by newcomplain.attendee asc";

            $db = db_connect();
            $query = $db->query($queryawi);
            $query = $query->getResultArray();
            return $query;
        } else {
            return $this->where('attendee', $email)->findAll();
        }
    }

    public function getMonthly($a,$b)
    {
        return $this->where('attendee', $a)->where('month(created_at)', $b)->findAll();
    }

    public function toUpdate($id, $u1, $u2, $u3, $u4, $u5, $u6, $u7)
    {
        return $this->update($id, ['cat_device' => $u1, 'cat_problem' => $u2, 'location' => $u3, 'temp_user' => $u4, 'phone' => $u5, 'description' => $u6, 'progress' => $u7]);
    }
}

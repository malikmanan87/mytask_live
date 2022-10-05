<?php

namespace App\Models;

use CodeIgniter\Model;

class Contact_model extends Model
{
    protected $table      = 'contact';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['name', 'email', 'subject', 'msg', 'status', 'deleted_at'];

    public function getMsg()
    {
        return $this->where('deleted_at', null)->findAll();
    }

    public function fixInprogress($id, $status)
    {
        if ($status == 1) {
            return $this->update($id, ['status' => 1]);
        } elseif ($status == 2) {
            return $this->update($id, ['status' => 2]);
        }
    }

    public function deleteComplain($id)
    {
        $now = date("Y-m-d H:i:s");
        return $this->update($id, ['deleted_at' => $now]);
    }
}

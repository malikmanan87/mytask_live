<?php

namespace App\Models;

use CodeIgniter\Model;

class Contact_model extends Model
{
    protected $table      = 'contact';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['name', 'email', 'subject', 'msg', 'status'];

    public function getMsg()
    {
        return $this->findAll();
    }

    public function fixInprogress($id, $status)
    {
        if ($status == 1) {
            return $this->update($id, ['status' => 1]);
        } elseif ($status == 2) {
            return $this->update($id, ['status' => 2]);
        }
    }
}

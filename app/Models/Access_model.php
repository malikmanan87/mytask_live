<?php

namespace App\Models;

use CodeIgniter\Model;

class Access_model extends Model
{
    protected $table      = 'access';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['email', 'level'];

    public function getEmail($username)
    {
        return $this->where('email', $username)->findAll();
    }

    public function getStaf($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }

    public function checkStaf($newemail)
    {
        return $this->where('email', $newemail)->findAll();
    }

    public function setAccess($id, $access)
    {
        return $this->update($id, ['level' => $access]);
    }
}

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

    public function getEmail($email = false)
    {
        return $this->findColumn('email',$email);
    }
}
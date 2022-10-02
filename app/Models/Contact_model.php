<?php

namespace App\Models;

use CodeIgniter\Model;

class Contact_model extends Model
{
    protected $table      = 'contact';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['name', 'email', 'subject', 'msg'];

    public function getMsg()
    {
        return $this->findAll();
    }
}

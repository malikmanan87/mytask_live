<?php

namespace App\Models;
use CodeIgniter\Model;

class Login_model extends Model
{
    // protected $DBGroup = 'mytask_db';
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'pass'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getUser($email,$password)
    {
        return $this
        ->where('email', $email)
        ->where('password', $password)
        ->find();
    }

}
<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

use function PHPUnit\Framework\returnSelf;
use function PHPUnit\Framework\returnValue;

class Report_model extends Model
{
    protected $table      = 'newcomplain';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['cat_device', 'cat_problem', 'description', 'created_at', 'updated_at', 'deleted_at', 'status'];

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
            return $this->where('status', 1)->findAll();
        } elseif ($id == 2) {
            return $this->where('status', 2)->findAll();
        } elseif ($id == 3) {
            return $this->where('status', 3)->findAll();
        } else
            return;
    }

    public function changeStatus1($id)
    {
        return $this->update($id, ['status' => 1]);
    }
}

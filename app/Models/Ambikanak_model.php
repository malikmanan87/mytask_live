<?php

namespace App\Models;

use CodeIgniter\Model;

class Ambikanak_model extends Model
{
    protected $table      = 'ambikanakdb';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['tarikh', 'masakeluar', 'masamasuk'];
}

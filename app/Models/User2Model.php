<?php

namespace App\Models;

use CodeIgniter\Model;

class User2Model extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    // protected $allowedFields = ['id', 'email', 'username', 'foto', 'fullname',];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

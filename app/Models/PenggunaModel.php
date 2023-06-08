<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ip', 'nama', 'email', 'jk', 'umur'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUser($ip)
    {
        return $this->where('ip', $ip)->findAll();
    }

    public function getPengguna()
    {
        return $this->orderBy('id', 'desc')->findAll();
    }
}

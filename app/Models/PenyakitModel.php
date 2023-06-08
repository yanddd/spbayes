<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $table      = 'penyakit';
    protected $primaryKey = 'id_penyakit';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama_penyakit', 'foto', 'desk', 'saran'];

    public function getPenyakit($id)
    {
        return $this->where('id_penyakit', $id)->first();
    }

    public function getAllPenyakit()
    {
        return $this->orderBy('id_penyakit')->findAll();
    }
}

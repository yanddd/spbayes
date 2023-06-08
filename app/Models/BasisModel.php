<?php

namespace App\Models;

use CodeIgniter\Model;

class BasisModel extends Model
{
    protected $table      = 'basis_pengetahuan';
    protected $primaryKey = 'id_pengetahuan';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_penyakit', 'id_gejala'];

    public function getBasisAll()
    {
        return $this->orderBy('id_pengetahuan')->findAll();
    }

    public function basisGejala()
    {
        $builder = $this->db->table('basis_pengetahuan');
        $builder->select('basis_pengetahuan.id_gejala as id_gejala, gejala.nama_gejala');
        $builder->join('gejala', 'gejala.id_gejala = basis_pengetahuan.id_gejala');
        $builder->orderBy('id_gejala')->groupBy('id_gejala');
        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;
    }

    public function getBasisG($kode)
    {
        $builder = $this->db->table('basis_pengetahuan');
        $builder->select('basis_pengetahuan.id_gejala as kodeGejala, nama_gejala, id_pengetahuan');
        $builder->join('gejala', 'gejala.id_gejala = basis_pengetahuan.id_gejala');
        $builder->where('id_penyakit', $kode);
        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;
    }

    public function getPenyakit($id)
    {
        return $this->where('id_penyakit', $id)->findAll();
    }

    public function getBasisSame($id_penyakit, $id_gejala)
    {
        return $this->where('id_penyakit', $id_penyakit)->where('id_gejala', $id_gejala)->first();
    }

    public function cekBasis($id)
    {
        return $this->where('id_gejala', $id)->findAll();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $table      = 'gejala';
    // protected $primaryKey = 'id_gejala';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_gejala', 'nama_gejala'];

    public function getGejala()
    {
        return $this->findAll();
    }

    public function getautoG($id)
    {
        return $this->where('id_gejala', $id)->first();
    }

    public function getKodegejala()
    {
        $kode = $this->db->table('gejala')->select('RIGHT(id_gejala, 2) as id_gejala', false)->orderBy('id_gejala', 'DESC')->limit(1)->get()->getRowArray();

        if ($kode['id_gejala'] ?? []) {
            $no = intval($kode['id_gejala']) + 1;
        } else {
            $no = 1;
        }

        $tgl = 'G';
        $batas = str_pad($no, 2, "0", STR_PAD_LEFT);
        $kodeK = $tgl . $batas;
        return $kodeK;
    }

    public function getUpdate($data, $id)
    {
        $builder = $this->db->table('gejala');
        $builder->where('id_gejala', $id);
        $builder->update($data);
    }

    public function getDelete($id)
    {
        $builder = $this->db->table('gejala');
        $builder->where('id_gejala', $id);
        $builder->delete();
    }

    public function gejalanot($data)
    {
        $test = $builder = $this->db->table('basis_pengetahuan')->select('id_gejala')->where('id_penyakit', $data);
        $builder = $this->db->table('gejala');
        $builder->select('*');
        $builder->whereNotIn('id_gejala', $test);
        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;
    }
}

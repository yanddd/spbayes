<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table = 'hasil_diagnosa';
    protected $primaryKey = 'id_hasil';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ip', 'penyakit', 'gejala', 'id_penyakit', 'nilai'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // public function getId($ip)
    // {
    //     $kode = $this->db->table('hasil_diagnosa')->select('RIGHT(id_hasil, 2) as id_hasil', false)->where('ip', $ip)->orderBy('id_hasil', 'DESC')->limit(1)->get()->getRowArray();

    //     if ($kode['id_hasil'] ?? []) {
    //         $no = intval($kode['id_hasil']) + 1;
    //     } else {
    //         $no = 1;
    //     }

    //     $ipAdd = $ip;
    //     $batas = str_pad($no, 2, "0", STR_PAD_LEFT);
    //     $kodeK = $ipAdd . $batas;
    //     return $kodeK;
    // }

    public function getIdfirst($data)
    {
        return $this->select('id_hasil')->where('ip', $data)->orderBy('id_hasil', 'desc')->first();
    }

    public function getHasil($data)
    {
        $builder = $this->db->table('hasil_diagnosa');
        $builder->join('penyakit', 'penyakit.id_penyakit = hasil_diagnosa.id_penyakit');
        $builder->select('hasil_diagnosa.id_penyakit as id_penyakit, hasil_diagnosa.penyakit as penyakit, nama_penyakit, nilai, foto, desk, saran');
        $builder->where('id_hasil', $data);
        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;
    }

    public function seripenyakit($data)
    {
        return $this->where('id_hasil', $data)->first();
    }

    public function getRiwayat()
    {
        $builder = $this->db->table('hasil_diagnosa');
        $builder->join('pengguna', 'pengguna.ip = hasil_diagnosa.ip');
        $builder->join('penyakit', 'penyakit.id_penyakit = hasil_diagnosa.id_penyakit');
        $builder->select('penyakit.nama_penyakit as nama_penyakit, nilai, pengguna.nama as nama, pengguna.email as email, id_hasil, gejala, penyakit, id_hasil, hasil_diagnosa.id_penyakit as penyakitsatu');
        $builder->orderBy('id_hasil', 'desc');
        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;
    }

    public function getJumDiag()
    {
        return $this->selectCount('id_hasil')->first();
    }
    public function getJumPeny($data)
    {
        return $this->selectCount('id_hasil')->where('id_penyakit', $data)->first();
    }

    public function getByUser()
    {
        $builder = $this->db->table('hasil_diagnosa');
        $builder->join('penyakit', 'penyakit.id_penyakit = hasil_diagnosa.id_penyakit');
        $builder->select('penyakit.nama_penyakit as nama_penyakit, nilai, id_hasil')->where('ip', service('request')->getIPAddress());
        $builder->orderBy('id_hasil', 'desc');
        $query = $builder->get();
        $data = $query->getResultArray();
        return $data;
    }
}

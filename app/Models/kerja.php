<?php

namespace App\Models;

use CodeIgniter\Model;

class kerja extends Model
{
    protected $table      = 'riwayat_thl';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'username', 'lokasi', 'jalur_bef', 'waktu_sel', 'latitude1', 'longitude1', 'foto_bef', 'waktu_af', 'jalur_af', 'latitude2', 'longitude2', 'foto_af', 'keterangan1', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'waktu_bef';
    protected $updatedField  = 'waktu_af';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function getdetail($kerja = false)
    {

        if ($kerja == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $kerja])->first();
    }

    public function search($cari)
    {
        $builder = $this->table('riwayat_thl');
        $builder->like('username', $cari);
        $builder->orlike('lokasi', $cari);

        return $builder;
    }

    public function getPosts()
    {
        return $this->orderBy('waktu_bef', 'DESC')->findAll();
    }

    public function getDataByPeriodAndLocation($start, $end, $lokasi = null)
    {
        $builder = $this->where('waktu_bef >=', $start)
            ->where('waktu_bef <=', $end);

        if ($lokasi !== null) {
            $builder->where('lokasi', $lokasi);
        }

        return $builder->findAll();
    }

    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }
}

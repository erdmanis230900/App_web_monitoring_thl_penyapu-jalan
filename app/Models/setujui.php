<?php

namespace App\Models;

use CodeIgniter\Model;

class setujui extends Model
{
    protected $table      = 'setujui';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'username', 'lokasi', 'jalur_bef', 'waktu_bef', 'latitude1', 'longitude1', 'foto_bef', 'jalur_af', 'waktu_af', 'latitude2', 'longitude2', 'foto_af', 'keterangan1', 'status', 'status1', 'waktu_sel'];

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
}

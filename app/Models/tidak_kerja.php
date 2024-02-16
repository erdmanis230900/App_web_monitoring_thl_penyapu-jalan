<?php

namespace App\Models;

use CodeIgniter\Model;

class tidak_kerja extends Model
{
    protected $table      = 'tidak_kerja';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'username', 'lokasi', 'alasan1', 'komentar', 'foto_bukti', 'created_at', 'update_at', 'waktu_k'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
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
        $builder = $this->table('tidak_kerja');
        $builder->like('username', $cari);
        $builder->orlike('lokasi', $cari);

        return $builder;
    }

    public function getPosts()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    public function getDataByPeriodAndLocation($start, $end, $lokasi = null)
    {
        $builder = $this->where('created_at >=', $start)
            ->where('created_at <=', $end);

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

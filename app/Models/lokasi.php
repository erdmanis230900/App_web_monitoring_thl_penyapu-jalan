<?php

namespace App\Models;

use CodeIgniter\Model;

class lokasi extends Model
{
    protected $table      = 'lok';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'daerah'];


    public function getdetail($lok = false)
    {
        if ($lok == false) {
            return $this->findAll();
        }

        return $this->where(['daerah' => $lok])->first();
    }
    public function getUsersCount()
    {
        return $this->countAll();
    }
}

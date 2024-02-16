<?php

namespace App\Models;

use CodeIgniter\Model;

class saveubah extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';


    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'fullname', 'alamat', 'kelamin', 'lahir', 'lokasi', 'jabatan'];


    public function getdetail($lok = false)
    {
        if ($lok == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $lok])->first();
    }
    public function getUsersCount()
    {
        return $this->countAll();
    }
}

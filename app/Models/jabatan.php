<?php

namespace App\Models;

use CodeIgniter\Model;

class jabatan extends Model
{
    protected $table      = 'auth_groups';

    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'description'];


    public function getdetail($pers = false)
    {
        if ($pers == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $pers])->first();
    }
}

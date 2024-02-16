<?php

namespace App\Models;

use CodeIgniter\Model;

class group extends Model
{
    protected $table      = 'auth_groups_users';

    protected $returnType     = 'array';

    protected $allowedFields = ['group_id', 'user_id'];


    public function getdetail($pers = false)
    {
        if ($pers == false) {
            return $this->findAll();
        }

        return $this->where(['group_id' => $pers])->first();
    }
}

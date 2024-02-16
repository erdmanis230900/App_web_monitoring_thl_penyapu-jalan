<?php

namespace App\Models;

use CodeIgniter\Model;

class addUser extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $useTimestamps   = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'fullname', 'alamat', 'kelamin', 'lahir', 'lokasi', 'jabatan', 'user_img',
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at', 'jalur_bef', 'foto_bef', 'latitude1', 'longitude1', 'jalur_af', 'foto_af', 'latitude2', 'longitude2',
    ];

    public function getdetail($kerja = false)
    {

        if ($kerja == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $kerja])->first();
    }
}

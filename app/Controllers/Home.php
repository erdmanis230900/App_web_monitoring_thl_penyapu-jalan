<?php

namespace App\Controllers;

use App\Models\lokasi;

class home extends BaseController
{
    public function dashboard()
    {
        $lok = new lokasi();
        $users = new \Myth\Auth\Models\UserModel();
        $data = [
            'title' => 'Dashboard',
            'users' => $users->getUsersCount(),
            'lok' => $lok->getUsersCount()
        ];
        return view('dashboard/index', $data);
    }
}

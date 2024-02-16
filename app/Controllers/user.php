<?php

namespace App\Controllers;

use App\Models\lokasi;

class user extends BaseController
{
    public function add()
    {
        return view('user/add');
    }
    public function index()
    {
        return view('user/index');
    }

    public function ubah($id)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $lokasi = new lokasi();
        $data = [
            'users' => $users->getdetail($id),
            'lokasi' => $lokasi->getdetail()
        ];

        if (empty($data['users'])) {
            return redirect()->to('/admin');
        }

        return view('user/ubah', $data);
    }

    public function save_user()
    {
        $users = new \Myth\Auth\Models\UserModel();

        $users->save([
            'id' => $this->request->getVar('id'),
            'fullname' => $this->request->getVar('fullname'),
            'alamat' => $this->request->getVar('alamat'),
            'kelamin' => $this->request->getVar('kelamin'),
            'lahir' => $this->request->getVar('lahir')

        ]);

        session()->setFlashdata('pesan', 'data telah ditambahkan');

        return redirect()->to('/user/index',)->withInput();
    }

    public function datathl()
    {
        $currentUser = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $users = new \Myth\Auth\Models\UserModel();
        $carinya = $this->request->getVar('cari');
        if ($carinya) {
            $datanya = $users->search($carinya);
        } else {
            $datanya = $users;
        }


        $data = [
            // 'users' => $users->findAll(),
            'users' => $datanya->paginate(5, 'users'),
            'pager' => $users->pager,
            'current' => $currentUser


        ];

        return view('user/datathl', $data);
    }

    public function detail($id = 0)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users->getdetail($id);

        if (empty($data['users'])) {
            return redirect()->to('/user');
        }

        return view('user/detail', $data);
    }

    public function ubahthl($id)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $lokasi = new lokasi();
        $data = [
            'users' => $users->getdetail($id),
            'lokasi' => $lokasi->getdetail()
        ];

        if (empty($data['users'])) {
            return redirect()->to('/admin');
        }

        return view('user/ubahthl', $data);
    }

    public function savethl()
    {
        $users = new \Myth\Auth\Models\UserModel();

        $users->save([
            'id' => $this->request->getVar('id'),
            'jabatan' => $this->request->getVar('jabatan')

        ]);

        session()->setFlashdata('pesan', 'data telah ditambahkan');

        return redirect()->to('/user/index',)->withInput();
    }

    public function print_laporan()
    {
        return view('user/print');
    }

    public function Daftar_anggota_berhalangan()
    {
        $currentUser = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $users = new \Myth\Auth\Models\UserModel();
        $carinya = $this->request->getVar('cari');
        if ($carinya) {
            $datanya = $users->search($carinya);
        } else {
            $datanya = $users;
        }


        $data = [
            // 'users' => $users->findAll(),
            'users' => $datanya->paginate(5, 'users'),
            'pager' => $users->pager,
            'current' => $currentUser


        ];

        return view('user/berhalangan', $data);
    }

    public function detail_laporan_berhalangan($id = 0)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users->getdetail($id);

        if (empty($data['users'])) {
            return redirect()->to('/user');
        }

        return view('user/berhalangan2', $data);
    }


    public function anggota_berhalangan()
    {
        $currentUser = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $users = new \Myth\Auth\Models\UserModel();
        $carinya = $this->request->getVar('cari');
        if ($carinya) {
            $datanya = $users->search($carinya);
        } else {
            $datanya = $users;
        }


        $data = [
            // 'users' => $users->findAll(),
            'users' => $datanya->paginate(5, 'users'),
            'pager' => $users->pager,
            'current' => $currentUser


        ];

        return view('user/daftar_berhalangan', $data);
    }

    public function detail_berhalangan($id = 0)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users->getdetail($id);

        if (empty($data['users'])) {
            return redirect()->to('/user');
        }

        return view('user/detail_berhalangan', $data);
    }
}

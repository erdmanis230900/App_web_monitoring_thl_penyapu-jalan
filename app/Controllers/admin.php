<?php

namespace App\Controllers;



use App\Models\lokasi;
use App\Controllers\BaseController;
use App\Models\addUser;
use App\Models\group;
use Myth\Auth\Models\GroupModel;


class admin extends BaseController
{
    public function index()
    {
        $currentUser = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $users = new \Myth\Auth\Models\UserModel();
        $carinya = $this->request->getVar('cari');
        if ($carinya) {
            $datanya = $users->search($carinya)->orderBy('created_at', 'desc'); // Urutkan berdasarkan created_at terbaru
        } else {
            $datanya = $users->orderBy('created_at', 'desc'); // Urutkan berdasarkan created_at terbaru
        }

        $data = [
            'users' => $datanya->paginate(5, 'users'),
            'pager' => $users->pager,
            'current' => $currentUser
        ];
        return view('admin/index', $data);
    }

    public function detail($id = 0)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users->getdetail($id);

        if (empty($data['users'])) {
            return redirect()->to('/admin');
        }

        return view('admin/detail', $data);
    }

    public function add()
    {
        return view('admin/add');
    }

    public function ubah($id)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $lokasi = new lokasi();
        $groups = new GroupModel();
        $data = [
            'users' => $users->getdetail($id),
            'lokasi' => $lokasi->getdetail(),
            'groups' => $groups->getdetail()
        ];

        if (empty($data['users'])) {
            return redirect()->to('/admin');
        }

        return view('admin/ubah', $data);
    }
    public function ubah_foto($id)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users->getdetail($id);

        if (empty($data['users'])) {
            return redirect()->to('/admin');
        }

        return view('admin/ubah_foto', $data);
    }
    public function save_user()
    {
        $users = new \Myth\Auth\Models\UserModel();
        $groups = new group();
        if (!$this->validate(
            [
                'lokasi' => 'required[users.lokasi]'
            ]
        )) {
            session()->setFlashdata('pesan', 'Beberapa Data yang dapat di tambahakan, tapi DATA LOKASI tidak boleh sama');

            $users->save([
                'id' => $this->request->getVar('id'),
                'fullname' => $this->request->getVar('fullname'),
                'alamat' => $this->request->getVar('alamat'),
                'kelamin' => $this->request->getVar('kelamin'),
                'lahir' => $this->request->getVar('lahir'),
                'jabatan' => $this->request->getVar('jabatan')

            ]);

            return redirect()->to('/admin/index')->withInput();
        }

        $users->save([
            'id' => $this->request->getVar('id'),
            'fullname' => $this->request->getVar('fullname'),
            'alamat' => $this->request->getVar('alamat'),
            'kelamin' => $this->request->getVar('kelamin'),
            'lahir' => $this->request->getVar('lahir'),
            'jabatan' => $this->request->getVar('jabatan')

        ]);

        session()->setFlashdata('pesan', 'data telah ditambahkan');

        return redirect()->to('/admin/index',)->withInput();
    }

    public function hapus($id)
    {
        $users = new \Myth\Auth\Models\UserModel();

        //hapus
        if ($this->request->getVar('fotonya') != 'default.svg') {
            unlink('img/' . $this->request->getVar('fotonya'));
        }
        $users->delete($id);
        session()->setFlashdata('pesan', 'Data Data Telah Dihapus');
        return redirect()->to('/admin/index')->withInput();
    }

    public function hapus_lokasi($id)
    {
        $lokasi = new lokasi();
        $lokasi->delete($id);
        session()->setFlashdata('pesan', 'Data Data Telah Dihapus');
        return redirect()->to('/admin/addlok')->withInput();
    }

    public function addlok()
    {
        $lok = new lokasi();
        $lokasi = [
            'lokasi' => $lok->findAll(),
        ];

        return view('admin/addlok', $lokasi);
    }

    public function savelok()
    {
        $lokasi = new lokasi();
        $lokasi->save([
            'daerah' => $this->request->getVar('daerah')
        ]);
        session()->setFlashdata('pesan', 'Data Data lokasi/daerah telah ditambah kan');
        return redirect()->to('/admin/addlok')->withInput();
    }

    public function jabatan($id)
    {
        // Mendapatkan data pengguna yang akan diedit
        $groups = new GroupModel();
        $users = new \Myth\Auth\Models\UserModel();
        $lokasi = new lokasi();
        $data = [
            'groups' => $groups->getdetail(),
            'lokasi' => $lokasi->getdetail(),
            'users' => $users->getdetail($id)
        ];

        return view('admin/jabatan', $data);
    }

    public function simpan_jabatan()
    {
        $users = new \Myth\Auth\Models\UserModel();
        $groups = new group();
        $users->save([
            'id' => $this->request->getVar('id'),
            'lokasi' => $this->request->getVar('lokasi')
        ]);
        $groups->save([
            'user_id' => $this->request->getPost('id'),
            'group_id' => $this->request->getPost('role')
        ]);
        session()->setFlashdata('pesan', 'Data telah ditambahkan');
        return redirect()->to('/admin/index',)->withInput();
    }

    public function saveUser()
    {
        $model = new addUser();

        $model->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password_hash' => password_hash($this->request->getVar('password_hash'), PASSWORD_BCRYPT),
        ]);

        session()->setFlashdata('pesan', 'Data telah ditambahkan');
        return redirect()->to('/admin/index');
    }
}

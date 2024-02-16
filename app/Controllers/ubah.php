<?php

namespace App\Controllers;

use App\Models\lokasi;

class ubah extends BaseController
{
    public function foto($id)
    {
        $users = new \Myth\Auth\Models\UserModel();

        $data = [
            'users' => $users->getdetail($id)

        ];

        if (empty($data['users'])) {
            return redirect()->to('/admin');
        }

        return view('foto/ubahfoto', $data);
    }

    public function save($id)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users->getdetail($id);
        if (!$this->validate(
            [
                'user_img' => 'uploaded[user_img]|max_size[user_img,6024]|is_image[user_img]|mime_in[user_img,image/png,image/jpeg,image/jpg]'
            ]
        )) {
            session()->setFlashdata('pesan', 'Data Tidak Dapat di Tambahkan, karena tidak Sesuai kriteria File foto');

            return redirect()->to('/admin/index')->withInput();
        }
        $filefoto = $this->request->getFile('user_img');
        $namafoto = $filefoto->getRandomName();
        $filefoto->move('img', $namafoto);
        if ($this->request->getVar('fotolama') != 'default.svg') {
            unlink('img/' . $this->request->getVar('fotolama'));
        }
        $users->save([
            'id' => $id,
            'user_img' => $namafoto

        ]);
        session()->setFlashdata('pesan', 'Data Telah Diubah');
        return redirect()->to('/admin/index')->withInput();
    }
}

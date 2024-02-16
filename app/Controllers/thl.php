<?php

namespace App\Controllers;

use App\Models\kerja;
use App\Models\lokasi;
use App\Models\setujui;
use App\Models\tidak_kerja;
use App\Models\unsetuju;
use PhpCsFixer\Fixer\ClassNotation\FinalClassFixer;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use CodeIgniter\I18n\Time;
use DateTime;

use function PHPUnit\Framework\returnValue;
use function PHPUnit\Framework\returnValueMap;

class thl extends BaseController
{
    public function index()
    {
        return view('thl/index');
    }

    public function laporan()
    {
        $laporan = new kerja();
        $riwayatku = $this->request->getVar('cari');
        if ($riwayatku) {
            $datanya = $laporan->search($riwayatku);
        } else {
            $datanya = $laporan;
        }
        $data = [
            'riwayat' => $datanya->getPosts()

        ];
        return view('thl/laporan', $data);
    }
    public function buat_kerja($id)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $data = [
            'users' => $users->getdetail($id),
        ];
        return view('thl/form_mulai', $data);
    }

    public function save_mulai($id)
    {
        $users = new \Myth\Auth\Models\UserModel();

        // Periksa apakah tanggal terakhir pembaruan kurang dari hari ini
        $userData = $users->find($id);
        $lastUpdateDate = $userData->updated_at;
        $today = date('Y-m-d');

        if ($lastUpdateDate < $today) {
            // Izinkan pembaruan data
            if (!$this->validate(
                [
                    'foto_bef' => 'uploaded[foto_bef]|max_size[foto_bef,6024]|is_image[foto_bef]|mime_in[foto_bef,image/png,image/jpeg,image/jpg]'
                ]
            )) {
                session()->setFlashdata('pesan', 'Data Tidak Dapat di Tambahkan, karena tidak Sesuai kriteria File foto');

                return redirect()->to('/user/index')->withInput();
            }
            $filefoto = $this->request->getFile('foto_bef');
            $namafoto = $filefoto->getRandomName();
            $filefoto->move('img', $namafoto);
            $users->save([
                'id' => $this->request->getVar('id'),
                'foto_bef' => $namafoto,
                'jalur_bef' => $this->request->getVar('jalur_bef'),
                'latitude1' => $this->request->getVar('latitude1'),
                'longitude1' => $this->request->getVar('longitude1'),
                'keterangan1' => $this->request->getVar('keterangan1'),
                'alasan1' => $this->request->getVar('alasan1')

            ]);

            $user_id = $this->request->getVar('id');
            session()->set('user_id', $user_id);

            // Selain ID pengguna, simpan data lain yang Anda butuhkan dalam sesi.
            session()->set('foto_bef', $namafoto);
            session()->set('jalur_bef', $this->request->getVar('jalur_bef'));
            session()->set('latitude1', $this->request->getVar('latitude1'));
            session()->set('longitude1', $this->request->getVar('longitude1'));

            // Redirect pengguna ke halaman 'mulai2'.
            return redirect()->to('/thl/mulai2');
        } else {
            // Tampilkan pesan bahwa pembaruan tidak diizinkan
            return redirect()->to('user/index')->with('pesan', 'Anda Telah Bekerja Hari Ini, Coba Lagi Besok');
        }
    }

    // public function save_mulai()
    // {
    //     $users = new \Myth\Auth\Models\UserModel();
    //     if (!$this->validate(
    //         [
    //             'foto_bef' => 'uploaded[foto_bef]|max_size[foto_bef,6024]|is_image[foto_bef]|mime_in[foto_bef,image/png,image/jpeg,image/jpg]'
    //         ]
    //     )) {
    //         session()->setFlashdata('pesan', 'Data Tidak Dapat di Tambahkan, karena tidak Sesuai kriteria File foto');

    //         return redirect()->to('/user/index')->withInput();
    //     }
    //     $filefoto = $this->request->getFile('foto_bef');
    //     $namafoto = $filefoto->getRandomName();
    //     $filefoto->move('img', $namafoto);
    //     $users->save([
    //         'id' => $this->request->getVar('id'),
    //         'foto_bef' => $namafoto,
    //         'jalur_bef' => $this->request->getVar('jalur_bef'),
    //         'latitude1' => $this->request->getVar('latitude1'),
    //         'longitude1' => $this->request->getVar('longitude1'),
    //         'keterangan1' => $this->request->getVar('keterangan1'),
    //         'alasan1' => $this->request->getVar('alasan1')

    //     ]);

    //     $user_id = $this->request->getVar('id');
    //     session()->set('user_id', $user_id);

    //     // Selain ID pengguna, simpan data lain yang Anda butuhkan dalam sesi.
    //     session()->set('foto_bef', $namafoto);
    //     session()->set('jalur_bef', $this->request->getVar('jalur_bef'));
    //     session()->set('latitude1', $this->request->getVar('latitude1'));
    //     session()->set('longitude1', $this->request->getVar('longitude1'));

    //     // Redirect pengguna ke halaman 'mulai2'.
    //     return redirect()->to('/thl/mulai2');
    // }



    public function mulai2()
    {
        // Ambil kembali ID pengguna dari sesi.
        $user_id = session()->get('user_id');

        if ($user_id) {
            // Gunakan ID pengguna untuk mengambil data tambahan dari database.
            $users = new \Myth\Auth\Models\UserModel();
            $user = $users->find($user_id);

            // Ambil data lain yang disimpan dalam sesi.
            $foto_bef = session()->get('foto_bef');
            $jalur_bef = session()->get('jalur_bef');
            $latitude1 = session()->get('latitude1');
            $longitude1 = session()->get('longitude1');

            // Kemudian, Anda dapat menampilkan data ini di halaman 'mulai2'.
            return view('thl/mulai2', [
                'user' => $user,
                'foto_bef' => $foto_bef,
                'jalur_bef' => $jalur_bef,
                'latitude1' => $latitude1,
                'longitude1' => $longitude1,
            ]);
        } else {
            echo "Error";
        }
    }

    public function selesai_kerja($id)
    {
        $users = new \Myth\Auth\Models\UserModel();
        $user = $users->getdetail($id);

        // Ambil waktu server
        $now = new DateTime();


        $updated_at = new DateTime($user->updated_at);

        // Hitung selisih waktu
        $diff = $now->diff($updated_at);

        // Periksa apakah sudah satu jam atau lebih
        $hoursPassed = $diff->h + ($diff->days * 24);

        if ($hoursPassed >= 1) {
            // Izinkan pengguna melanjutkan ke halaman thl/form_selesai
            $data = [
                'users' => $user,
            ];

            return view('thl/form_selesai', $data);
        } else {
            return redirect()->to('thl/mulai2')->with('pesan', 'Anda Terlalu Cepat Bekerja. Tunggu ' . (1 - $hoursPassed) . ' jam lagi untuk melanjutkan.');
        }
    }

    // public function selesai_kerja($id)
    // {
    //     $users = new \Myth\Auth\Models\UserModel();
    //     $data = [
    //         'users' => $users->getdetail($id),
    //     ];

    //     return view('thl/form_selesai', $data);
    // }

    public function selesai()
    {
        $thl = new kerja();
        if (!$this->validate(
            [
                'foto_af' => 'uploaded[foto_af]|max_size[foto_af,6024]|is_image[foto_af]|mime_in[foto_af,image/png,image/jpeg,image/jpg]'
            ]
        )) {
            session()->setFlashdata('pesan', 'Data Tidak Dapat di Tambahkan, karena tidak Sesuai kriteria File foto');

            return redirect()->to('/thl/selesai_kerja')->withInput();
        }
        $filefoto = $this->request->getFile('foto_af');
        $namafoto = $filefoto->getRandomName();
        $filefoto->move('img', $namafoto);

        // datediff tanggal awal dia mulai kerja, input data saat selesai bekerj (cari selisih jam) >= 2jam maka boleh menyimpan selesai bekerja
        $thl->save([
            'username' => $this->request->getVar('username'),
            'waktu_sel' => $this->request->getVar('waktu_sel'),
            'lokasi' => $this->request->getVar('lokasi'),
            'jalur_bef' => $this->request->getVar('jalur_bef'),
            'foto_bef' => $this->request->getVar('foto_bef'),
            'foto_af' => $namafoto,
            'latitude1' => $this->request->getVar('latitude1'),
            'longitude1' => $this->request->getVar('longitude1'),
            'jalur_af' => $this->request->getVar('jalur_af'),
            'latitude2' => $this->request->getVar('latitude2'),
            'longitude2' => $this->request->getVar('longitude2'),
            'keterangan1' => $this->request->getVar('keterangan1')
        ]);

        session()->setFlashdata('pesan', 'data telah ditambahkan');
        $user_id = $this->request->getVar('id');
        session()->set('user_id', $user_id);

        // Selain ID pengguna, simpan data lain yang Anda butuhkan dalam sesi.
        session()->set('username', $this->request->getVar('username'));
        session()->set('foto_bef', $this->request->getVar('foto_bef'));
        session()->set('jalur_bef', $this->request->getVar('jalur_bef'));
        session()->set('latitude1', $this->request->getVar('latitude1'));
        session()->set('longitude1', $this->request->getVar('longitude1'));
        session()->set('foto_af', $namafoto);
        session()->set('jalur_af', $this->request->getVar('jalur_af'));
        session()->set('latitude2', $this->request->getVar('latitude2'));
        session()->set('longitude2', $this->request->getVar('longitude2'));
        session()->setFlashdata('pesan', 'Data telah disimpan, silahkan lihat pada laporan masuk');
        return redirect()->to('/thl/selesai_thl')->withInput();
    }

    public function selesai_thl()
    {

        // Ambil kembali ID pengguna dari sesi.
        $user_id = session()->get('user_id');

        if ($user_id) {
            // Gunakan ID pengguna untuk mengambil data tambahan dari database.
            $users = new \Myth\Auth\Models\UserModel();
            $user = $users->find($user_id);

            // Ambil data lain yang disimpan dalam sesi.
            $username = session()->get('username');
            $foto_bef = session()->get('foto_bef');
            $jalur_bef = session()->get('jalur_bef');
            $latitude1 = session()->get('latitude1');
            $longitude1 = session()->get('longitude1');
            $foto_af = session()->get('foto_af');
            $jalur_af = session()->get('jalur_af');
            $latitude2 = session()->get('latitude2');
            $longitude2 = session()->get('longitude2');

            // Kemudian, Anda dapat menampilkan data ini di halaman 'mulai2'.
            return view('thl/selesai_thl', [
                'user' => $user,
                'username' => $username,
                'foto_bef' => $foto_bef,
                'jalur_bef' => $jalur_bef,
                'latitude1' => $latitude1,
                'longitude1' => $longitude1,
                'foto_af' => $foto_af,
                'jalur_af' => $jalur_af,
                'latitude2' => $latitude2,
                'longitude2' => $longitude2,
            ]);
        } else {
            echo "Error";
        }
    }

    public function detail_riwayat($id)
    {
        $detail = new kerja();

        $data = [
            'detail' => $detail->getdetail($id)
        ];

        return view('thl/detail_riwayat', $data);
    }

    public function acc_kerja($id)
    {
        $tableAModel = new kerja();
        $tableBModel = new setujui();

        // Ambil data dari Table A berdasarkan ID
        $data = $tableAModel->getById($id);

        if ($data) {
            // Pindahkan data ke Table B
            $data['status'] = $this->request->getPost('status');
            $tableBModel->insert($data);

            // Hapus data dari Table A
            $tableAModel->delete($id);
            session()->setFlashdata('pesan', 'Data telah Di Setujui');
            return view('thl/data');
        } else {
            session()->setFlashdata('pesan', 'Data Tidak Dapat Diproses (ERROR)');
            return view('thl/data2');
        }
    }

    public function acc_kerja_ubah($id)
    {
        $tableAModel = new unsetuju();
        $tableBModel = new setujui();

        // Ambil data dari Table A berdasarkan ID
        $data = $tableAModel->getById($id);

        if ($data) {
            // Pindahkan data ke Table B
            $data['status'] = $this->request->getPost('status');
            $tableBModel->insert($data);

            // Hapus data dari Table A
            $tableAModel->delete($id);
            session()->setFlashdata('pesan', 'Data telah Di Setujui');
            return view('thl/data');
        } else {
            session()->setFlashdata('pesan', 'Data Tidak Dapat Diproses (ERROR)');
            return view('thl/data2');
        }
    }

    public function konfirmasi_kesalahan($id)
    {
        $detail = new kerja();
        $data = [
            'detail' => $detail->getById($id)
        ];
        return view('thl/konf_success', $data);
    }


    public function unacc_kinerja($id)
    {
        $tableAModel = new kerja();
        $tableBModel = new unsetuju();

        // Ambil data dari Table A berdasarkan ID
        $data = $tableAModel->getById($id);

        if ($data) {
            // Pindahkan data ke Table B
            $data['status'] = $this->request->getPost('status');
            $tableBModel->insert($data);

            // Hapus data dari Table A
            $tableAModel->delete($id);

            session()->setFlashdata('pesan', 'Data Tidak Disetujui');
            return view('thl/data2');
        } else {
            session()->setFlashdata('pesan', 'Data Tidak Dapat Diproses Atau Ditemukan (ERROR)');
            return view('thl/data2');
        }
    }


    public function laporan_disetujui()
    {
        $laporan = new setujui();
        $riwayatku = $this->request->getVar('cari');
        if ($riwayatku) {
            $datanya = $laporan->search($riwayatku);
        } else {
            $datanya = $laporan;
        }
        $data = [
            'riwayat' => $datanya->getPosts()

        ];
        return view('thl/laporan2', $data);
    }

    public function detail_riwayat_disetujui($id)
    {
        $detail = new setujui();
        $data = [
            'detail' => $detail->getdetail($id)
        ];

        return view('thl/detail_riwayat2', $data);
    }

    public function laporan_tidak_disetujui()
    {
        $laporan = new unsetuju();
        $riwayatku = $this->request->getVar('cari');
        if ($riwayatku) {
            $datanya = $laporan->search($riwayatku);
        } else {
            $datanya = $laporan;
        }
        $data = [
            'riwayat' => $datanya->getPosts()

        ];
        return view('thl/laporan3', $data);
    }

    public function detail_riwayat_tidak_disetujui($id)
    {
        $detail = new unsetuju();
        $data = [
            'detail' => $detail->getdetail($id)
        ];

        return view('thl/detail_riwayat3', $data);
    }

    public function ubah_riwayat($id)
    {
        $detail = new unsetuju();
        $data = [
            'detail' => $detail->getdetail($id)
        ];

        return view('thl/ubah_riwayat', $data);
    }

    public function update_riwayat_jalur()
    {
        $dataModel = new unsetuju();

        $dataModel->save([
            'id' => $this->request->getVar('id'),
            'jalur_bef' => $this->request->getVar('jalur_bef'),
            'jalur_af' => $this->request->getVar('jalur_af'),
            'status' => $this->request->getVar('status'),
            'status1' => $this->request->getVar('status1')

        ]);
        session()->setFlashdata('pesan', 'Data telah Di Ubah');
        return view('thl/data');
    }

    public function update_riwayat_foto()
    {
        $dataModel = new unsetuju();

        if (!$this->validate(
            [

                'foto_bef' => 'uploaded[foto_af]|max_size[foto_af,6024]|is_image[foto_af]|mime_in[foto_af,image/png,image/jpeg,image/jpg]',

                'foto_af' => 'uploaded[foto_af]|max_size[foto_af,6024]|is_image[foto_af]|mime_in[foto_af,image/png,image/jpeg,image/jpg]'
            ]
        )) {
            session()->setFlashdata('pesan', 'Data Tidak Dapat di Tambahkan, karena tidak Sesuai kriteria File foto');

            return redirect()->to('/thl/data')->withInput();
        }
        $filefoto_bef = $this->request->getFile('foto_bef');
        $filefoto_af = $this->request->getFile('foto_af');
        $namafoto_bef = $filefoto_bef->getRandomName();
        $namafoto_af = $filefoto_af->getRandomName();
        $filefoto_bef->move('img', $namafoto_bef);
        $filefoto_af->move('img', $namafoto_af);

        $dataModel->save([
            'id' => $this->request->getVar('id'),
            'foto_bef' => $namafoto_bef,
            'foto_af' => $namafoto_af,
            'status' => $this->request->getVar('status'),
            'status1' => $this->request->getVar('status1')



        ]);
        session()->setFlashdata('pesan', 'Data telah Di Ubah');
        return view('thl/data');
    }

    public function tidak_kerja($id)
    {
        $detail = new \Myth\Auth\Models\UserModel();
        $data = [
            'detail' => $detail->getdetail($id)
        ];
        return view('thl/tidak_kerja', $data);
    }

    public function simpan_laporan()
    {
        $users = new \Myth\Auth\Models\UserModel();
        if (!$this->validate(
            [
                'foto_bukti' => 'uploaded[foto_bukti]|max_size[foto_bukti,6024]|is_image[foto_bukti]|mime_in[foto_bukti,image/png,image/jpeg,image/jpg]'
            ]
        )) {
            session()->setFlashdata('pesan', 'Data Tidak Dapat di Tambahkan, karena tidak Sesuai kriteria File foto');

            return redirect()->to('/user/index')->withInput();
        }
        $filefoto = $this->request->getFile('foto_bukti');
        $namafoto = $filefoto->getRandomName();
        $filefoto->move('img', $namafoto);
        $users->save([
            'id' => $this->request->getVar('id'),
            'keterangan1' => $this->request->getVar('alasan1'),
            'alasan1' => $this->request->getVar('alasan1'),
            'foto_bukti' => $namafoto,
            'komentar' => $this->request->getVar('komentar')

        ]);

        session()->setFlashdata('pesan', 'Data kalau anda berhalangan telah di simpan');

        return redirect()->to('/user/index')->withInput();
    }

    public function THL_berhalangan()
    {
        $laporan = new tidak_kerja();
        $riwayatku = $this->request->getVar('cari');
        if ($riwayatku) {
            $datanya = $laporan->search($riwayatku);
        } else {
            $datanya = $laporan;
        }
        $data = [
            'riwayat' => $datanya->getPosts()

        ];
        return view('thl/berhalangan', $data);
    }

    public function detail_berhalangan($id)
    {
        $laporan = new tidak_kerja();
        $data = [
            'detail' => $laporan->getdetail($id)
        ];

        return view('thl/berhalangan_detail', $data);
    }

    public function simpan_laporan_berhalangan()
    {
        $users = new tidak_kerja();
        $data = new \Myth\Auth\Models\UserModel();
        $data->save([
            'id' => $this->request->getVar('id'),
            'keterangan1' => $this->request->getVar('keterangan1'),
        ]);
        $users->save([
            'username' => $this->request->getVar('username'),
            'lokasi' => $this->request->getVar('lokasi'),
            'alasan1' => $this->request->getVar('alasan1'),
            'foto_bukti' => $this->request->getVar('foto_bukti'),
            'komentar' => $this->request->getVar('komentar'),
            'waktu_k' => $this->request->getVar('updated_at')

        ]);

        session()->setFlashdata('pesan', 'Data kalau anda berhalangan telah di simpan');

        return redirect()->to('/user/index')->withInput();
    }
    public function tidak_setujui_laporan_berhalangan()
    {

        $data = new \Myth\Auth\Models\UserModel();
        $data->save([
            'id' => $this->request->getVar('id'),
            'keterangan1' => $this->request->getVar('keterangan1'),
        ]);

        session()->setFlashdata('pesan', 'Data kalau anda berhalangan telah di simpan');

        return redirect()->to('/user/index')->withInput();
    }
}

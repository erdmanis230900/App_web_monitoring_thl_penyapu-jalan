<?php

namespace App\Controllers;

use App\Models\setujui;
use App\Models\tidak_kerja;

class laporan extends BaseController
{
    public function index()
    {
        return view('print/index');
    }

    public function filterData()
    {
        $start = $this->request->getPost('start');
        $end = $this->request->getPost('end');
        $lokasi = $this->request->getPost('cari');
        // Validasi periode

        // Panggil model untuk mendapatkan data
        $dataModel = new setujui();

        $data = [
            'data' => $dataModel->getDataByPeriodAndLocation($start, $end, $lokasi)
        ];

        // Kirim data ke view untuk ditampilkan
        return view('print/print', $data);
    }

    public function filterFoto()
    {
        $start = $this->request->getPost('start');
        $end = $this->request->getPost('end');
        $lokasi = $this->request->getPost('cari');
        // Validasi periode

        // Panggil model untuk mendapatkan data
        $dataModel = new setujui();

        $data = [
            'data' => $dataModel->getDataByPeriodAndLocation($start, $end, $lokasi)
        ];

        // Kirim data ke view untuk ditampilkan
        return view('print/printfoto', $data);
    }

    public function print_laporan_berhalangan()
    {
        return view('print/print_tdk');
    }

    public function print_data_berhalangan()
    {
        $start = $this->request->getPost('start');
        $end = $this->request->getPost('end');
        $lokasi = $this->request->getPost('cari');
        // Validasi periode

        // Panggil model untuk mendapatkan data
        $dataModel = new tidak_kerja();

        $data = [
            'data' => $dataModel->getDataByPeriodAndLocation($start, $end, $lokasi)
        ];

        // Kirim data ke view untuk ditampilkan
        return view('print/print2', $data);
    }
}

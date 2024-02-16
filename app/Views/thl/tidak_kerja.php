<?php

use App\Controllers\user;
?>
<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Tenaga Harian Lepas</h1>
    <div class="row">
        <div class="col-sm">

            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
                <br>
                <form action="/thl/simpan_laporan/<?= user()->id; ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= user()->id; ?>">
                    <div class="card">
                        <h5 class="card-header">Perhatian!!</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="hidden" name="alasan1" value="Saya Berhalangan/tidak Kerja Hari ini" required>
                                    <label for="exampleFormControlTextarea1"><strong>Kenapa Anda Tidak Kerja Hari ini?</strong></label><br>
                                    <input type="file" class="form-control" name="foto_bukti">
                                    <textarea name="komentar" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="isi alasan Kenapa anda tidak berkerja hari ini?" required></textarea>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                                Konfirmasi
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Perhatian!!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda Yakin?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                            <button class="btn btn-danger" type="submit">Kirim</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
                <br>
                <form action="<?= base_url('thl/laporan'); ?>" method="post">
                    <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                    <button class="btn btn-primary" type="submit" name="submit">Kembali</button>
                </form>
            </div>

        </div>

    </div>
</div>


<?= $this->endSection(); ?>
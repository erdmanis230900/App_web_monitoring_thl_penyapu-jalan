<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Tenaga Harian Lepas Penyapu index </h1>
    <div class="row">
        <div class="col-sm">

            <h1>Ubah Riwayat <?= $detail['username']; ?></h1>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ubah Jalur Lokasi</h5>
                            <form action="/thl/update_riwayat_jalur" method="post">
                                <input type="hidden" name="id" id="id" value="<?= $detail['id']; ?>">
                                <input type="hidden" name="status" id="status" value="Saya Telah Mengubah data Saya">
                                <label for="jalur_bef">Lokasi Mulai Kerja</label>
                                <textarea name="jalur_bef" id="jalur_bef" cols="50" rows="3" class="form-control" placeholder="<?= $detail['jalur_bef']; ?>" required></textarea>
                                <br>
                                <label for="jalur_af">Lokasi Selesai kerja</label>
                                <textarea name="jalur_af" id="jalur_af" cols="50" rows="3" class="form-control" placeholder="<?= $detail['jalur_af']; ?>" required></textarea>
                                <br>
                                <label for="status">Keterangan Saya</label>
                                <textarea name="status1" id="status1" cols="50" rows="3" class="form-control" required></textarea>
                                <br>
                                <button type="submit" class="btn btn-danger" onclick="cekklik()">Konfirmasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ubah Foto</h5>
                            <form action="/thl/update_riwayat_foto" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value="<?= $detail['id']; ?>">
                                <input type="hidden" name="status1" id="status1" value="Saya Telah Mengubah data Saya">
                                <label for="jalur_bef">Foto Mulai Kerja</label>
                                <input type="file" class="form-control" name="foto_bef" required>
                                <br>
                                <label for="jalur_af">Foto Selesai kerja</label>
                                <input type="file" class="form-control" name="foto_af" required>
                                <br>
                                <label for="jalur_af">Keterangan Saya</label>
                                <textarea name="status" id="status" cols="50" rows="3" class="form-control" required></textarea>
                                <br>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                                    Konfirmasi
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi !!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Data Yang Di Ubah Sudah benar?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- /.container-fluid -->
<script>
    function cekklik() {
        alert('anda telah mengisi data anda, klik OK untuk melanjutkan')
    }
</script>

<?= $this->endSection(); ?>
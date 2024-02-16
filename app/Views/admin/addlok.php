<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Lokasi</h1>
    <div class="alert-danger" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>

    <div class="row">
        <div class="col-sm">
            <form action="/admin/savelok" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="daerah" class="col-sm-2 col-form-label">Lokasi Daerah</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="daerah" name="daerah" placeholder="Masukan Lokasi" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" onclick="return confirm('Apaka Anda Yakin Ingin Ingin Menyimpan?')">Simpan</button>
                <a href="/admin/index" class="btn btn-danger">Kembali</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    Kelola Daerah
                </button>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content modal-dialog-centered">
                        <div class="modal-header ">
                            <h5 class="modal-title" id="staticBackdropLabel">Kelola Daerah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card" style="width: 18rem;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kelola</th>
                                            <th scope="col">Daerah/Lokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lokasi as $lok) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <form action="/admin/hapus_lokasi/<?= $lok['id']; ?>" method="post" class="d-inline">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apaka Anda Yakin Ingin Menghapus?')">Hapus</button>
                                                    </form>
                                                </th>
                                                <td><?= $lok['daerah']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
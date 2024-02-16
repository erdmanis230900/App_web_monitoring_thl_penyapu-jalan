<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Pengguna</h1>
    <div class="row">
        <div class="col-lg-10">
            <div class="card mb-3" style="max-width: 940px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                            <img src="/img/<?= $users->foto_bukti; ?>" class="img-thumbnail" style="max-width: 150px;">
                        </button>
                    </div>
                    <div class=" col-md-8">
                        <div class="card-body">
                            <h2 class="card-header">Laporan Berhalangan dari <?= $users->username; ?></h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col"><?= $users->username; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama Panjang</td>
                                        <td><?= $users->fullname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td><?= $users->lokasi; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td><strong><?= $users->alasan1; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Komentar</td>
                                        <td><?= $users->komentar; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto Mulai Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="/img/<?= $users->foto_bukti; ?>" class="img-thumbnail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<?= $this->endSection(); ?>
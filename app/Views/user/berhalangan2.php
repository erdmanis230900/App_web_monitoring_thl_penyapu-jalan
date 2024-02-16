<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Status Kerja <?= user()->username; ?></h1>
    <div class="row">
        <div class="col-lg-10">
            <div class="card mb-3" style="max-width: 940px;">
                <div class="row no-gutters">
                    <div class="col-md-4">

                        <img src="/img/<?= $users->foto_bukti; ?>" class="img-thumbnail" style="max-width: 300px;">

                    </div>
                    <div class=" col-md-8">
                        <div class="card-body">
                            <h2 class="card-header">Status Kerja <?= user()->username; ?></h2>
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
                                        <td><strong><?= $users->keterangan1; ?></strong></td>
                                    </tr>
                                </tbody>
                                <tr>
                                    <?php if (in_groups('user')) : ?>

                                        <td>
                                            <form action="/thl/simpan_laporan_berhalangan" method="post">
                                                <input type="hidden" name="id" value="<?= $users->id; ?>">
                                                <input type="hidden" name="username" value="<?= $users->username; ?>">
                                                <input type="hidden" name="lokasi" value="<?= $users->lokasi; ?>">
                                                <input type="hidden" name="alasan1" value="<?= $users->alasan1; ?>">
                                                <input type="hidden" name="komentar" value="<?= $users->komentar; ?>">
                                                <input type="hidden" name="foto_bukti" value="<?= $users->foto_bukti; ?>">
                                                <input type="hidden" name="updated_at" value="<?= $users->updated_at; ?>">
                                                <input type="hidden" name="keterangan1" value="Hari ini Anda Berhalangan">
                                                <button class=" btn btn-success" type="submit" name="submit">Setujui</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="/thl/tidak_setujui_laporan_berhalangan" method="post">
                                                <input type="hidden" name="id" value="<?= $users->id; ?>">
                                                <input type="hidden" name="keterangan1" value="Laporan Anda Tidak Disetujui Karena Ada Kesalahan, Silahkan Kirim Kembali">
                                                <input type="hidden" name="alasan1" value="Laporan Anda Tidak Disetujui Karena Tidak Valid, Silahkan Kirim Kembali">
                                                <button class=" btn btn-danger" type="submit" name="submit">Tidak Disetujui</button>
                                            </form>
                                        </td>

                                    <?php endif; ?>
                                </tr>

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
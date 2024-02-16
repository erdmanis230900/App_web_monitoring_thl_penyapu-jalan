<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card mb-3" style="max-width: 540px;">
        <h2 class="card-header">Laporan Berhalangan Kerja <?= $detail['username']; ?></h2>
        <div class="row no-gutters">
            <div class="card-body">
                <table class="table" style="max-width: 100%;">
                    <thead>
                        <tr>
                            <td style="width: 30%;">Username</td>
                            <td style="width: 70%;"><?= $detail['username']; ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lokasi Kerja</td>
                            <td><?= $detail['lokasi']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td><?= $detail['created_at']; ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan berhalangan</td>
                            <td><?= $detail['komentar']; ?></td>

                        </tr>
                        <tr>
                            <td>
                                <!-- Button trigger modal picture -->
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                                    <img src="/img/<?= $detail['foto_bukti']; ?>" class="img-thumbnail" style="max-width: 150px;">
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php if (in_groups('user_thl')) : ?>
                    <form action="<?= base_url('thl/THL_berhalangan'); ?>" method="post">
                        <input type="hidden" id="cari" name="cari" value="<?= user()->username; ?>">
                        <button class="btn btn-primary" type="submit" name="submit">Kembali</button>
                    </form>
                <?php endif; ?>
                <?php if (in_groups('user')) : ?>
                    <form action="<?= base_url('thl/THL_berhalangan'); ?>" method="post">
                        <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                        <button class="btn btn-primary" type="submit" name="submit">Kembali</button>
                    </form>
                <?php endif; ?>
                <?php if (in_groups('admin')) : ?>
                    <div class="container">
                        <div class="row">
                            <a href="<?= base_url('thl/THL_berhalangan'); ?>" class="btn btn-primary" type="submit" name="submit">Kembali</a>
                        </div>
                    </div>
                <?php endif; ?>
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
                <img src="/img/<?= $detail['foto_bukti']; ?>" class="img-thumbnail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
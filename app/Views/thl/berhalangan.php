<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php if (in_groups('user')) : ?>
        <h1 class="h3 mb-4 text-gray-800">Laporan Berhalangan THL Penyapu Jalan</h1>
    <?php endif; ?>
    <?php if (in_groups('user_thl')) : ?>
        <h1 class="h3 mb-4 text-gray-800">Laporan Berhalangan <?= user()->username; ?></h1>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm">
            <div class="d-none d-sm-block">
                <div class="row">
                    <div class="col-lg-10">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Wilayah</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($riwayat as $d) : ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><?= $d['lokasi']; ?></td>
                                        <td><?= $d['username']; ?></td>
                                        <td><strong><?= $d['komentar']; ?></strong></td>
                                        <td><a href="<?= base_url('thl/detail_berhalangan/' . $d['id']); ?>" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- untuk hp THL -->
            <?php if (in_groups('user_thl')) : ?>
                <div class="d-block d-sm-none">
                    <div class="row">
                        <div class="col-lg-5">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th scope="col">username</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($riwayat as $d) : ?>
                                        <tr>

                                            <td><?= $d['username']; ?></td>
                                            <td><strong><?= $d['komentar']; ?></strong></td>
                                            <td><a href="<?= base_url('thl/detail_berhalangan/' . $d['id']); ?>" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <!-- untuk hp Koordinator -->
            <?php if (in_groups('user')) : ?>
                <div class="d-block d-sm-none">
                    <div class="row">
                        <div class="col-lg-5">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th scope="col">username</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($riwayat as $d) : ?>
                                        <tr>

                                            <td><?= $d['username']; ?></td>
                                            <td><strong><?= $d['komentar']; ?></strong></td>
                                            <td><a href="<?= base_url('thl/detail_berhalangan/' . $d['id']); ?>" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <!-- untuk hp admin -->
            <?php if (in_groups('admin')) : ?>
                <div class="d-block d-sm-none">
                    <div class="row">
                        <div class="col-lg-5">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th scope="col">Username</th>
                                        <th scope="col">Waktu Kirim</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($riwayat as $d) : ?>
                                        <tr>

                                            <td><?= $d['username']; ?></td>
                                            <td><strong><?= $d['komentar']; ?></strong></td>
                                            <td><a href="<?= base_url('thl/detail_berhalangan/' . $d['id']); ?>" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<?= $this->endSection(); ?>
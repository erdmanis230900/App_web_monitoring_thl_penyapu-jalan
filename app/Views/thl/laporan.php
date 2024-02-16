<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php if (in_groups('user')) : ?>
        <h1 class="h3 mb-4 text-gray-800">Laporan Kinerja Pada <?= user()->lokasi; ?></h1>
    <?php endif; ?>
    <?php if (in_groups('user_thl')) : ?>
        <h1 class="h3 mb-4 text-gray-800">Laporan Kinerja <?= user()->username; ?></h1>
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
                                    <th scope="col">Lokasi Mulai</th>
                                    <th scope="col">Lokasi Selesai</th>
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
                                        <td><?= $d['jalur_bef']; ?></td>
                                        <td><?= $d['jalur_af']; ?></td>
                                        <td><a href="<?= base_url('thl/detail_riwayat/' . $d['id']); ?>" class="btn btn-primary">Detail</a></td>
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

                                        <th scope="col">Lokasi Mulai</th>
                                        <th scope="col">Lokasi Selesai</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($riwayat as $d) : ?>
                                        <tr>

                                            <td><?= $d['jalur_bef']; ?></td>
                                            <td><?= $d['jalur_af']; ?></td>
                                            <td><a href="<?= base_url('thl/detail_riwayat/' . $d['id']); ?>" class="btn btn-primary">Detail</a></td>
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

                                        <th scope="col">Username</th>
                                        <th scope="col">Waktu Kerja</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($riwayat as $d) : ?>
                                        <tr>

                                            <td><?= $d['username']; ?></td>
                                            <td><?= $d['waktu_bef']; ?></td>
                                            <td><a href="<?= base_url('thl/detail_riwayat/' . $d['id']); ?>" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <?php if (in_groups('admin')) : ?>
                <div class="d-block d-sm-none">
                    <div class="row">
                        <div class="col-lg-5">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th scope="col">Username</th>
                                        <th scope="col">Waktu Kerja</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($riwayat as $d) : ?>
                                        <tr>

                                            <td><?= $d['username']; ?></td>
                                            <td><?= $d['waktu_bef']; ?></td>
                                            <td><a href="<?= base_url('thl/detail_riwayat/' . $d['id']); ?>" class="btn btn-primary">Detail</a></td>
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
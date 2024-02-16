<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Print Laporan Bulanan </h1>
    <div class="row">
        <div class="col-sm">

            <div class="row">
                <div class="col-sm">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">

                            <div class="col-md">
                                <div class="card-body">
                                    <h5 class="card-title">Laporan Bulanan</h5>
                                    <?php if (empty(user()->fullname)) : ?>
                                        <div class="alert alert-danger">
                                            Anda harus mengisi nama panjang Anda terlebih dahulu.
                                        </div>
                                    <?php else : ?>
                                        <form method="post" action="/laporan/filterData" target="_blank">
                                            <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                                            <label for="start">Mulai Tanggal:</label>
                                            <input type="date" name="start" class="form-control" required>
                                            <br>
                                            <label for="end">Akhir Tanggal :</label>
                                            <small class="form-text text-muted alert-danger">Harap Ditambahkan Sehari contoh Jika <strong>Akhir Tanggal</strong> "09/05/2023" Ditambahkan Sehari menjadi "10/05/2023" supaya data terbaca pada Aplikasi</small>
                                            <input type="date" name="end" class="form-control" required>
                                            <br>
                                            <button type="submit" class="btn btn-success btn-lg btn-block">Filter</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">

                            <div class="col-md">
                                <div class="card-body">
                                    <h5 class="card-title">Laporan Foto Bulanan</h5>
                                    <?php if (empty(user()->fullname)) : ?>
                                        <div class="alert alert-danger">
                                            Anda harus mengisi nama panjang Anda terlebih dahulu.
                                        </div>
                                    <?php else : ?>
                                        <form method="post" action="<?= base_url('laporan/filterFoto') ?>" target="_blank">
                                            <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                                            <label for="start">Mulai Tanggal:</label>
                                            <input type="date" name="start" class="form-control" required>
                                            <br>
                                            <label for="end">Akhir Tanggal :</label>
                                            <small class="form-text text-muted alert-danger">Harap Ditambahkan Sehari contoh Jika <strong>Akhir Tanggal</strong> "09/05/2023" Ditambahkan Sehari menjadi "10/05/2023" supaya data terbaca pada Aplikasi</small>
                                            <input type="date" name="end" class="form-control" required>
                                            <br>
                                            <button type="submit" class="btn btn-success btn-lg btn-block">Filter</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
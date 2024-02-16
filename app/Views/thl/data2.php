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

                <form action="<?= base_url('thl/laporan'); ?>" method="post">
                    <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                    <button class="btn btn-primary" type="submit" name="submit">Kembali</button>
                </form>
            </div>

        </div>

    </div>
</div>

<!-- /.container-fluid -->

<?= $this->endSection(); ?>
<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Tenaga Harian Lepas Penyapu index </h1>
    <div class="row">
        <div class="col-sm">
            <div class="alert-danger" role="alert">
                <?= session()->getFlashdata('error'); ?>
            </div>

            <h1>masih belum ada content</h1>

        </div>

    </div>
</div>

<!-- /.container-fluid -->

<?= $this->endSection(); ?>
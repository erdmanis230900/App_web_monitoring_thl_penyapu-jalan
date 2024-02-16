<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">dashboard</h1>

    <div class="row">
        <div class="col-sm">
            <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Jumlah Data Koodinator dan THL</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $users; ?> Anggota</h5>
                    <p class="card-text">Jumlah Data Yang Telah Terdaftar Disetiap Titik daerah yang tersebar di sekitar Minahasa</p>
                    <?php if (in_groups('admin')) : ?>
                        <a href="/admin/index" class="btn btn-success"> Lihat</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Jumlah Data Lokasi</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $lok; ?> Lokasi</h5>
                    <p class="card-text">Jumlah Data Yang Telah Terdaftar Disetiap Titik daerah yang tersebar di sekitar Minahasa</p>
                    <?php if (in_groups('admin')) : ?>
                        <a href="/admin/index" class="btn btn-success"> Lihat</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="d-block d-sm-none">
            <div class="card text-center">
                <div class="card-header">
                    Lokasi Kantor
                </div>
                <div class="card-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d763.4073244613296!2d124.91030131572937!3d1.3177270569629598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sdinas%20lingkungan%20hidup%20minahasa!5e0!3m2!1sid!2sid!4v1684946733828!5m2!1sid!2sid" width="350" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="card-footer text-muted">
                        Dinas Lingkungan Hidup
                    </div>
                </div>
            </div>

        </div>
        <div class="d-none d-sm-block">
            <div class="card text-center">
                <div class="card-header">
                    Lokasi Kantor
                </div>
                <div class="card-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d763.4073244613296!2d124.91030131572937!3d1.3177270569629598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sdinas%20lingkungan%20hidup%20minahasa!5e0!3m2!1sid!2sid!4v1684946733828!5m2!1sid!2sid" width="1000" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="card-footer text-muted">
                        Dinas Lingkungan Hidup
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- /.container-fluid -->

<?= $this->endSection(); ?>
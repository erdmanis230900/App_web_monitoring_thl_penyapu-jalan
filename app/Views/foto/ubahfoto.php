<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Foto <?= $users->username; ?></h1>

    <form action="/ubah/save/<?= $users->id; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="fotolama" value="<?= $users->user_img; ?>">
        <div class="row mb-3">
            <div class="col-sm-4">
                <h2><label for="foto" class=" col-form-label">Foto ( ukuran 3x4)</label></h2>

                <div class="input-group mb-3">
                    <img src="/img/<?= $users->user_img ?>" class="img-thumbnail">
                </div>
                <input type="file" class="form-control" id="user_img" name="user_img" required>


                file harus jpg, png, jpeg!!!
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/ubah/<?= $users->id; ?>" class="btn btn-danger">Kembali</a>
    </form>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
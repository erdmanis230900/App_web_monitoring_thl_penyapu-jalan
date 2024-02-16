<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data</h1>
    <div class="row-sm">
        <div class="col-sm">
            <form action="/admin/save_user/<?= $users->id; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $users->id; ?>">

                <div class="row mb-3">
                    <label for="kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-5">
                        <select class="form-control" aria-label="Default select example" id="kelamin" name="kelamin">
                            <option selected value="<?= $users->kelamin; ?>">Pilih</option>
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>

                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/admin/<?= $users->id; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
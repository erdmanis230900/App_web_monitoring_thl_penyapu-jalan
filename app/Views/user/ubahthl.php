<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data</h1>
    <div class="row-sm">
        <div class="col-sm">
            <form action="/user/savethl/<?= $users->id; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $users->id; ?>">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-5">
                        <lebel class="form-control" readonly><?= $users->username; ?></lebel>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kelamin" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-5">
                        <select class="form-control" aria-label="Default select example" id="jabatan" name="jabatan">
                            <option value="Penyapu Jalan">Penyapu Jalan</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" onclick="return confirm('Apaka Anda Yakin Ingin mengubah data?')">Simpan</button>
                <a href="/user/<?= $users->id; ?>" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
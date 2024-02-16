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
                    <label for="nama" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-5">
                        <lebel class="form-control" readonly><?= $users->username; ?></lebel>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Panjang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $users->fullname; ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $users->alamat; ?>">
                    </div>
                </div>
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
                <div class="row mb-3">
                    <label for="ttl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" id="lahir" name="lahir" value="<?= $users->lahir; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan DLH</label>
                    <div class="col-sm-5">
                        <select class="form-control" aria-label="Default select example" id="jabatan" name="jabatan">
                            <option selected disabled value="">Pilih</option>
                            <option value="koordinator">koordinator</option>
                            <option value="Penyapu Jalan">Penyapu Jalan</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto ( ukuran 3x4)</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $users->user_img ?>" class="img-thumbnail" style="width: 100px;">
                        <a href="/ubah/foto/<?= $users->id; ?>" class="btn btn-primary">Ubah foto</a>
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
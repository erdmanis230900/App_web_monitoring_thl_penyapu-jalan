<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-4 text-gray-800">Ubah Data <?= $users->username; ?></h1>
    <div class="alert alert-danger" role="alert">
        PERHATIAN!!! <a class="alert-link">JABATAN DIDALAM SISTEM</a> TIDAK DAPAT DIUBAH LAGI JIKA SUDAH PERNAH DI ISI, <br>JADI <a class="alert-link"> HARAP DI PERHATIKAN JIKA BARU MENGISI DATA!!!!</a>
    </div>
    <div class="row-sm">
        <div class="col-sm">
            <form action="/admin/simpan_jabatan/<?= $users->id; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $users->id; ?>">
                <div class="row mb-3">
                    <label for="kelamin" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-5">
                        <select class="form-control" aria-label="Default select example" id="lokasi" name="lokasi">
                            <option selected disabled value="">Pilih</option>
                            <?php foreach ($lokasi as $d) : ?>
                                <option value="<?= $d['daerah']; ?>"><?= $d['daerah']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="role" class="col-sm-2 col-form-label">Jabatan Didalam Sistem Sebagai</label>
                    <div class="col-sm-5">
                        <select class="form-control" aria-label="Default select example" id="role" name="role" required>
                            <option selected disabled value="">Pilih</option>
                            <?php foreach ($groups as $d) : ?>
                                <option value="<?= $d->id; ?>"><?= $d->description; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-muted alert-danger">Mohon Diperhatikan</small>
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
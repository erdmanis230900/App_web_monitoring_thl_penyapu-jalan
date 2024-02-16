<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row-sm">
        <div class="col-sm">
            <div class="alert-danger" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <h1 class="h3 mb-4 text-gray-800">Blank Page Admin</h1>
            <br>
            <a href="/admin/add" class="btn btn-primary mb-3">Tambah Anggota</a>
            <a href="/admin/addlok" class="btn btn-primary mb-3">Tambah Lokasi</a>
        </div>
    </div>
    <div class="col-6">
        <div class="row">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data" aria-label="Cari Data" aria-describedby="button-addon2" name="cari">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Lokasi Kerja</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (5 * ($current - 1)); ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><img src="/img/<?= $user->user_img; ?>" alt="" class="fotoprof" style="width: 80px"></td>
                            <td><a href="<?= base_url('admin/' . $user->id); ?>"><?= $user->username; ?></a></td>
                            <td><?= $user->jabatan; ?></td>
                            <td><?= $user->lokasi; ?></td>
                            <td>
                                <a href="<?= base_url('admin/' . $user->id); ?>" class="btn btn-primary">Detail</a>

                            </td>
                            <td>
                                <a href="<?= base_url('admin/jabatan/' . $user->id); ?>" class="btn btn-success">Jabatan</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?= $pager->links('users', 'my_pager'); ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
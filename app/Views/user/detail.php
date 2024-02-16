<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Pengguna</h1>
    <div class="row">
        <div class="col-lg-10">
            <div class="card mb-3" style="max-width: 940px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $users->user_img; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-header">Wilayah <?= $users->lokasi; ?></h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col"><?= $users->username; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama Panjang</td>
                                        <td><?= $users->fullname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email Pengguna</td>
                                        <td><?= $users->email; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?= $users->alamat; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td><?= $users->kelamin; ?></td>
                                    </tr>
                                    <tr>
                                        <td>tempat tanggal lahir</td>
                                        <td><?= $users->lahir; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi Kerja</td>
                                        <td><?= $users->lokasi; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan Pengguna</td>
                                        <td><?= $users->jabatan; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <form action="<?= base_url('user/datathl') ?>" method="post">
                                <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                                <a href="/user/ubahthl/<?= $users->id; ?>" class="btn btn-warning">Edit</a>
                                <button class=" btn btn-primary" type="submit" name="submit">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
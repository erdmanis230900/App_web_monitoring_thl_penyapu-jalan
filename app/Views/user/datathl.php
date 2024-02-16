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
            <h1 class="h3 mb-4 text-gray-800">Halaman Koordinator <?= user()->lokasi; ?></h1>
            <br>
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
            <!-- lihat di monitor -->
            <div class="d-none d-sm-block">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Pengguna</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Lokasi Kerja</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><a href="<?= base_url('user/' . $user->id); ?>"><img src="/img/<?= $user->user_img; ?>" alt="" class="fotoprof" style="width: 80px"></a></td>
                                <td><a href="<?= base_url('user/' . $user->id); ?>"><?= $user->username; ?></a></td>
                                <td><?= $user->jabatan; ?></td>
                                <td><?= $user->lokasi; ?></td>
                                <td>
                                    <a href="<?= base_url('user/' . $user->id); ?>" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>


            <!-- lihat di Hp -->
            <div class="row">
                <div class="col-lg-10">
                    <div class="d-block d-sm-none">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th scope="col">Nama Pengguna</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Lokasi Kerja</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><a href="<?= base_url('user/' . $user->id); ?>"><?= $user->username; ?></a></td>
                                        <td><?= $user->jabatan; ?></td>
                                        <td><?= $user->lokasi; ?></td>
                                        <td>
                                            <a href="<?= base_url('user/' . $user->id); ?>" class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="row">
        <div class="col">
            <h1>Contoh Konten</h1>
            <p class="d-block d-sm-none">Paragraf konten hanya terlihat di perangkat seluler.</p>
            <p class="d-none d-sm-block">Paragraf konten hanya terlihat di layar monitor.</p>
        </div>
    </div>
</div> -->
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
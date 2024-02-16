<?php

use App\Controllers\user;
?>
<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Pengguna</h1>
    <div class="row">
        <div class="col-lg-10">
            <div class="alert-danger" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>

            <div class="card mb-3" style="max-width: 940px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a href="/ubah/foto/<?= user()->id; ?>"><img src="/img/<?= user()->user_img; ?>" class="img-thumbnail"></a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-header">Wilayah <?= user()->lokasi; ?></h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col"><?= user()->username; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama Panjang</td>
                                        <td><?= user()->fullname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email Pengguna</td>
                                        <td><?= user()->email; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?= user()->alamat; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td><?= user()->kelamin; ?></td>
                                    </tr>
                                    <tr>
                                        <td>tempat tanggal lahir</td>
                                        <td><?= user()->lahir; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi Kerja</td>
                                        <td><?= user()->lokasi; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan Pengguna</td>
                                        <td><?= user()->jabatan; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="/user/ubah/<?= user()->id; ?>" class="btn btn-warning">Edit</a>
                            <a href="/" class="btn btn-primary">Kembali</a>
                            <br>
                            <br>
                            <br>

                            <!-- Button trigger modal -->
                            <?php if (in_groups('user_thl')) : ?>
                                <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#staticBackdrop" onclick="cekLokasi()">
                                    Mulai Berkerja
                                </button>
                                <br>
                                <a href="/thl/tidak_kerja/<?= user()->id; ?>" class="btn btn-lg btn-block btn-danger" onclick="tidakkerja()">Saya Tidak Bisa Bekerja hari ini</a>
                            <?php endif; ?>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Anda Sudah Siap Berkerja?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>
                                                <strong>
                                                    GPS Lokasi Anda Telah Aktif? Sebelum Mulai Bekerja Gerakan HP/Device Untuk Mendapatkan Lokasi Yang Lebih Akurat
                                                </strong>
                                            </h5>
                                            <img src="/img/shaking_phone.gif" class="img-thumbnail">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Belum Siap</button>
                                            <form action="/thl/buat_kerja/<?= user()->id; ?>" method="post">
                                                <button id="tombol" type="submit" class="btn btn-primary" onclick="cekLokasi()" disabled>Tunggu 7 Detik</button>
                                            </form>

                                            <!-- <a href="/thl/buat_kerja/?= user()->id; ?>" class="btn btn-primary" onclick="cekLokasi()">Mulai Kerja</a> -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
<!-- /.container-fluid -->

<!-- validasi apakah sudah aktifkan GPS -->
<script>
    function cekLokasi() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                // Dapatkan lokasi pengguna
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                // Lakukan apa yang diperlukan dengan lokasi (misalnya, simpan ke database)
                console.log('Latitude: ' + latitude);
                console.log('Longitude: ' + longitude);

                // Tampilkan pesan jika lokasi berhasil didapatkan
                alert('GPS Telah diaktifkan. Anda dapat melanjutkan.');
            }, function(error) {
                // Tangani kesalahan jika gagal mendapatkan lokasi
                console.error('Error: ' + error.message);
                alert('Gagal mendapatkan lokasi. Silakan aktifkan GPS Anda.');
                window.location.href = '<?= base_url('user'); ?>';
            });
        } else {
            // Tangani jika browser tidak mendukung geolocation
            console.error('Error: Browser tidak mendukung geolocation');
            alert('Browser Anda tidak mendukung geolocation. Silakan gunakan browser lain.');
        }
    }
</script>

<!-- waktu tunggu button -->
<script>
    var tombol = document.getElementById("tombol");
    var waktuTunggu = 7000; // 10000ms = 10 detik

    function hitungMundur() {
        var sisaWaktu = waktuTunggu / 1000; // Konversi ke detik
        tombol.textContent = "Tunggu (" + sisaWaktu + " detik)";

        var hitungMundurInterval = setInterval(function() {
            sisaWaktu--;
            tombol.textContent = "Tunggu (" + sisaWaktu + " detik)";

            if (sisaWaktu <= 0) {
                clearInterval(hitungMundurInterval);
                tombol.textContent = "Mulai Kerja";
                tombol.disabled = false;
            }
        }, 1000); // Update setiap 1 detik
    }

    setTimeout(hitungMundur, waktuTunggu);
</script>

<script>
    function tidakkerja() {
        alert('Apakah Anda Sedang Berhalangan Hari ini?');
    }
</script>



<?= $this->endSection(); ?>
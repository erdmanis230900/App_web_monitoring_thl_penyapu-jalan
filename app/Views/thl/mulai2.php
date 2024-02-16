<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Tenaga Harian Lepas Penyapu Jalan laporan</h1>
    <div class="alert-danger" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="card" style="max-width : 540px;">
                <div class="card-header">Loaksi Pertama Saya</div>
                <iframe src='https://www.google.com/maps?q=<?= $latitude1; ?>,<?= $longitude1; ?>&hl=es;z=14&output=embed' frameborder="0" class="card-img-top" height="340"></iframe>
                <div class="card-body">
                    <button id="selesaiKerjaBtn" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#staticBackdrop">
                        Selesai Kerja
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Perhatian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda Sudah Selesai Berkerja?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Belum Selesai</button>
                                <a href="/thl/selesai_kerja/<?= user()->id; ?>" class="btn btn-primary">Selesai Kerja</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- bigger script -->
<script type="text/javascript">
    function getLocation() {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    }

    function showPosition(position) {
        document.querySelector('#latitude').value = position.coords.latitude;
        document.querySelector('#longitude').value = position.coords.longitude;
    }

    function showError() {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("You Most Allow The Request For GPS To fill Out Form");
                location.reload();
                break;
        }
    }
    getLocation();
</script>

<!-- Script cooldown dusrasi 
<script>
    // Durasi cooldown dalam detik (1 jam 20 menit 30 detik)
    const cooldownDuration = 60;

    // Mengatur waktu cooldown
    let cooldownTimer = cooldownDuration;

    // Mengakses elemen tombol
    const selesaiKerjaBtn = document.getElementById('selesaiKerjaBtn');

    // Fungsi untuk mengupdate teks tombol dan mengatur status disabled
    function updateButtonState() {
        if (cooldownTimer > 0) {
            const hours = Math.floor(cooldownTimer / 3600);
            const minutes = Math.floor((cooldownTimer % 3600) / 60);
            const seconds = cooldownTimer % 60;
            selesaiKerjaBtn.textContent = `Cooldown: ${hours} jam ${minutes} menit ${seconds} detik`;
            selesaiKerjaBtn.disabled = true;
        } else {
            selesaiKerjaBtn.textContent = 'Selesai Kerja';
            selesaiKerjaBtn.disabled = false;
        }
    }

    // Fungsi untuk memulai countdown
    function startCooldown() {
        setInterval(function() {
            cooldownTimer--;
            updateButtonState();
        }, 1000); // Update setiap detik
    }

    // Memanggil fungsi untuk memulai countdown saat halaman dimuat
    window.onload = startCooldown;
</script>
-->

<?= $this->endSection(); ?>
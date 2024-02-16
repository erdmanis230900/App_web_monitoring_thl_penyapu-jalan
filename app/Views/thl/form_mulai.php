<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Kerja <?= $users->fullname; ?> </h1>
    <div class="row">
        <div class="col-sm">
            <div class="alert-danger" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <form action="/thl/save_mulai/<?= user()->id; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="latitude1" id="latitude">
                <input type="hidden" name="longitude1" id="longitude">
                <input type="hidden" name="id" value="<?= $users->id; ?>">
                <input type="hidden" name="keterangan1" value="Hari Ini Saya Bekerja">
                <input type="hidden" name="alasan1" value="Hari Ini Saya Bekerja">
                <div class="card" style="max-width : 800px;">
                    <div class="card-header">
                        <h3> Selamat bekerja </h3>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d763.4073244613296!2d124.91030131572937!3d1.3177270569629598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sdinas%20lingkungan%20hidup%20minahasa!5e0!3m2!1sid!2sid!4v1684946733828!5m2!1sid!2sid" width="200" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="card-img-top"></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Masukan Foto Sebelum Bekerja</h5>
                        <input type="file" class="form-control" name="foto_bef" required>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="is-valid">Masukan jalur Lokasi Pertama</label>
                            <div class="valid-feedback">
                                Perhatian!! Untuk <strong>Jalur lokasi Kedua</strong> Akan Di Isi Setelah Selesai Kerja
                            </div>
                            <textarea class="form-control" name="jalur_bef" rows="3" placeholder="Jalur Lokasi Pertama Anda, Misalnya : ''Pertigaan Unima Block B'' " required></textarea>
                        </div>
                        <br>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#staticBackdrop">
                            Mulai
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Perhatian!!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Pastikan data yang dimasukan sesuai dengan yang diminta!!!!</strong>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        <button class="btn btn-primary" id="submit" name="submit">Mulai</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- /.container-fluid -->

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

<!--- disable form input 
<script>
    // Mendeteksi ukuran layar
    function isDesktop() {
        return window.innerWidth > 768; // Anda dapat menyesuaikan nilai 768 sesuai kebutuhan
    }

    // Mengecek apakah layar adalah desktop
    function updateFileInput() {
        const fileInput = document.getElementById("foto_bef");

        if (isDesktop()) {
            // Jika layar adalah desktop, menonaktifkan elemen input file
            fileInput.setAttribute("disabled", "disabled");
        } else {
            // Jika layar adalah bukan desktop, menghapus atribut "disabled" pada elemen input file
            fileInput.removeAttribute("disabled");
        }
    }

    // Memanggil fungsi ketika halaman dimuat dan ketika ukuran jendela berubah
    window.onload = updateFileInput;
    window.addEventListener("resize", updateFileInput);
</script>


<script>
    // Mendeteksi apakah pengguna menggunakan perangkat mobile atau desktop
    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }

    // Mendapatkan elemen input file
    var fileInput = document.querySelector('input[type="file"]');

    // Menonaktifkan input file jika pengguna mengakses dari desktop
    if (!isMobile()) {
        fileInput.setAttribute("disabled", "disabled");
    }
</script>
---->
<?= $this->endSection(); ?>
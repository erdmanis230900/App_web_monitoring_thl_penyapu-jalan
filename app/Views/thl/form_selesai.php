<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Laporan dari <?= $users->username; ?></h1>
    <div class="row">
        <div class="col-sm">
            <div class="alert-danger" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <div class="card" style="max-width : 540px;">
                <div class="card-header">Loaksi Pertama Saya</div>
                <iframe src='https://www.google.com/maps?q=<?= $users->latitude1; ?>,<?= $users->longitude1; ?>&hl=es;z=14&output=embed' frameborder="0" class="card-img-top" height="340"></iframe>
                <div class="card-body">
                    <h5 class="card-title">Isi Data Setelah Selesai Bekerja</h5>
                    <form action="/thl/selesai/<?= $users->id; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="latitude2" id="latitude">
                        <input type="hidden" name="longitude2" id="longitude">
                        <input type="hidden" name="id" value="<?= $users->id; ?>">
                        <input type="hidden" name="username" value="<?= $users->username; ?>">
                        <input type="hidden" name="waktu_sel" value="<?= $users->updated_at; ?>">
                        <input type="hidden" name="lokasi" value="<?= $users->lokasi; ?>">
                        <input type="hidden" name="latitude1" value="<?= $users->latitude1; ?>">
                        <input type="hidden" name="longitude1" value="<?= $users->longitude1; ?>">
                        <input type="hidden" name="foto_bef" value="<?= $users->foto_bef; ?>">
                        <input type="hidden" name="jalur_bef" value="<?= $users->jalur_bef; ?>">
                        <input type="hidden" id="textinputtoggle" name="keterangan1" value="">
                        <input type="file" class="form-control" name="foto_af" required>
                        <br>
                        <strong>Validasi Keterangan</strong>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkbox1" onchange="handleCheckboxChange(1)">
                                <label class="form-check-label" for="invalidCheck2">
                                    Kiri dan Kanan Pada Jalur Lokasi Bersih
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkbox2" onchange="handleCheckboxChange(2)">
                                <label class="form-check-label" for="invalidCheck2">
                                    Jalur Lokasi Sering Kotor
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="is-valid"><strong> jalur Lokasi terakhir</strong></label>
                            <div class="valid-feedback">
                                Perhatian!! Untuk <strong>Jalur lokasi Kedua</strong> Akan Di Isi Setelah Selesai Kerja
                            </div>
                            <textarea class="form-control" name="jalur_af" rows="3" placeholder="Jalur Lokasi Terakhir Anda" required></textarea>
                        </div>

                        <br>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#staticBackdrop">
                            Selesai
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
                                        <strong>Progress Anda Akan Di simpan!!</strong>
                                        <br>
                                        Apakah Anda Telah Mengisi Data Dengan Benar?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        <button class="btn btn-primary" id="submit" name="submit" onclick="return validateForm()">Selesai</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>





        </div>

    </div>
</div>

<!-- /.container-fluid -->
<script>
    function handleCheckboxChange(checkboxNumber) {
        var checkbox1 = document.getElementById('checkbox1');
        var checkbox2 = document.getElementById('checkbox2');
        var textInput = document.getElementById('textinputtoggle');

        if (checkboxNumber === 1 && checkbox1.checked) {
            checkbox2.disabled = true;
            textInput.value = 'KIRI DAN KANAN PADA JALUR LOKASI BERSIH';
        } else if (checkboxNumber === 2 && checkbox2.checked) {
            checkbox1.disabled = true;
            textInput.value = 'LOKASI SERING KOTOR';
        } else {
            checkbox2.disabled = false;
            checkbox1.disabled = false;
            textInput.value = '';
        }
    }

    function validateForm() {
        var checkbox1 = document.getElementById('checkbox1');
        var checkbox2 = document.getElementById('checkbox2');

        if (!checkbox1.checked && !checkbox2.checked) {
            alert('Harap Centangentang Minimal Satu Opsi Validasi.');
            return false;
        }



        return true;
    }

    function simpanKeDatabase() {
        var textInput = document.getElementById('textinputtoggle').value;


    }
</script>


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

<?= $this->endSection(); ?>
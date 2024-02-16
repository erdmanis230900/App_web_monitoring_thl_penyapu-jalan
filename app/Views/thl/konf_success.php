<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Tenaga Harian Lepas</h1>
    <div class="row">
        <div class="col-sm">

            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
                <br>
                <form id="myForm" action="/thl/unacc_kinerja/<?= $detail['id']; ?>" method="POST" onsubmit="return validateForm()">
                    <input type="hidden" name="id" value="<?= $detail['id']; ?>">
                    <div class="card">
                        <h5 class="card-header">Perhatian!!</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" id="textinputtoggle" name="status" value="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkbox1" onchange="handleCheckboxChange(1)">
                                    <label class="form-check-label" for="checkbox1">
                                        Jalur Lokasi Salah/Tidak Valid
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkbox2" onchange="handleCheckboxChange(2)">
                                    <label class="form-check-label" for="checkbox2">
                                        Foto Buram/Tidak Valid
                                    </label>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                                Konfirmasi
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Perhatian!!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda Yakin?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                            <button class="btn btn-danger" type="submit">Tidak Disetujui</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <form action="<?= base_url('thl/laporan'); ?>" method="post">
                    <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                    <button class="btn btn-primary" type="submit" name="submit">Kembali</button>
                </form>
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

        if (checkbox1.checked || checkbox2.checked) {
            textInput.value = 'Setidaknya satu opsi dicentang';
        } else {
            textInput.value = '';
        }
    }

    function validateForm() {
        var checkbox1 = document.getElementById('checkbox1');
        var checkbox2 = document.getElementById('checkbox2');

        if (!checkbox1.checked && !checkbox2.checked) {
            alert("Pilih setidaknya satu pilihan!");
            return false; // Form tidak akan dikirim
        }

        // Form akan dikirim jika setidaknya satu kotak centang telah dicentang
        return true;
    }
</script>

<?= $this->endSection(); ?>
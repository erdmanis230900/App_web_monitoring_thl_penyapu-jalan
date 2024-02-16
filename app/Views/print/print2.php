<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        .transparent-border {
            border-color: transparent;
        }

        /* Media query untuk mode cetak */
        @media print {
            #print {
                display: none;
                /* Menyembunyikan tombol cetak saat mode cetak */
            }

            /* Mencegah elemen ini terputus pada halaman baru saat mencetak */
            .dont-break {
                page-break-inside: avoid;
            }
        }
    </style>

    <title>Laporan Print</title>
</head>

<body>
    <br>
    <br>
    <div class="container">
        <h3 class="text-center">LAPORAN BERHALANGAN/TIDAK BEKERJA<br> TENAGA HARIAN LEPAS PENYAPU JALAN</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control transparent-border text-center" placeholder="Masukan bulan dan tahun contoh ''Bulan Januari 2023''" required id="inputText">
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="container">
        <?php if (!empty($data)) : ?>
            <?php $i = 1 ?>
            <table class="table table-bordered text-center transparent-border">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Foto Bukti</th>
                </tr>
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <td scope="row"><?= $item['username']; ?></td>
                        <td><?= $item['created_at']; ?> </td>
                        <td><?= $item['komentar']; ?> </td>
                        <td><img src="/img/<?= $item['foto_bukti']; ?>" style="max-width: 250px;"></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <div class="container dont-break">
            <div class="row">
                <p class="text-center"><b>Keterangan :</b></p>
                <div class="container">
                    <div class="row">
                        <textarea name="paragraph" rows="5" cols="80"></textarea><br>
                    </div>
                </div>
            </div>
        </div>
        <br>


        <div class="card text-center float-right transparent-border dont-break" style="width: 18rem;">
            <div class="card-body">
                <table class="table table-bordered dont-break">
                    <b>Petugas Pengawas</b>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b><?= user()->fullname; ?></b>
                </table>
            </div>
        </div>

    </div>

    <br>
    <br><br><br><br><br><br><br>
    <div class="container">

        <button type="button" class="btn btn-success" id="print" onclick="validateAndPrint()">Print
            laporan</button>

    </div>


    <!-- Optional JavaScript -->
    <script>
        function validateAndPrint() {
            var inputText = document.getElementById('inputText').value;
            if (inputText.trim() === '') {
                alert('Masukan Bulan Dan Tahun');
            } else {
                window.print();
            }
        }
    </script>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>
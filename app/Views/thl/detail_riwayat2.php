<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h5 class="h3 mb-4 text-gray-800">Riwayat</h5>
    <div class="row">
        <div class="col-sm">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card mb-3" style="max-width: 940px;">
                        <h2 class="card-header">Laporan Kinerja dari <?= $detail['username']; ?></h2>
                        <div class="row no-gutters">

                            <div class="col-md-7">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Username</th>
                                                <th scope="col"><?= $detail['username']; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>Wilayah Kerja</td>
                                                <td><?= $detail['lokasi']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="table-primary">Tanggal/Jam <br> Mulai Bekerja Pada</td>
                                                <td class="table-primary"><?= $detail['waktu_sel']; ?></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2" class="table-primary">Lokasi Mulai Kerja
                                                    <br> Dan Foto Bukti Mulai Kerja
                                                </td>
                                                <td class="table-primary"><?= $detail['jalur_bef']; ?></td>
                                            </tr>
                                            <tr>
                                                <!-- Button trigger modal picture -->
                                                <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                                                        <img src="/img/<?= $detail['foto_bef']; ?>" class="img-thumbnail" style="max-width: 150px;">
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td class="table-success">Tanggal/Jam <br> Selesai Bekerja Pada</td>
                                                <td class="table-success"><?= $detail['waktu_af']; ?></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2" class="table-success">Lokasi Selesai Kerja
                                                    <br> Dan Foto Bukti Selesai Kerja
                                                </td>
                                                <td class="table-success"><?= $detail['jalur_af']; ?></td>
                                            </tr>
                                            <tr>
                                                <!-- Button trigger modal picture -->
                                                <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal2">
                                                        <img src="/img/<?= $detail['foto_af']; ?>" class="img-thumbnail" style="max-width: 150px;">
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td>Durasi Kerja</td>
                                                <td><?= formatDurasi($detail['waktu_sel'], $detail['waktu_af']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan Lokasi</td>
                                                <td><?= $detail['keterangan1']; ?></td>
                                            </tr>
                                            <tr class="table-primary">
                                                <td> <strong>Keterangan Laporan</strong></td>
                                                <td><strong><?= $detail['status']; ?></strong></td>
                                            </tr>
                                            <tr class="table-success">
                                                <td> <strong>Keterangan dari <?= $detail['username']; ?></strong></td>
                                                <td><strong><?= $detail['status1']; ?></strong></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <?php if (in_groups('user_thl')) : ?>
                                        <form action="<?= base_url('thl/laporan_disetujui'); ?>" method="post">
                                            <input type="hidden" id="cari" name="cari" value="<?= user()->username; ?>">
                                            <button class="btn btn-primary" type="submit" name="submit">Kembali</button>
                                        </form>
                                    <?php endif; ?>
                                    <?php if (in_groups('user')) : ?>
                                        <form action="<?= base_url('thl/laporan_disetujui'); ?>" method="post">
                                            <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                                            <button class="btn btn-primary" type="submit" name="submit">Kembali</button>
                                        </form>
                                    <?php endif; ?>
                                    <?php if (in_groups('admin')) : ?>

                                        <a href="<?= base_url('thl/laporan_disetujui'); ?>" class="btn btn-primary">Kembali</a>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div id="map" style="width: 400px; height: 300px;" class="img-thumbnail"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal 1 -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto Mulai Kerja</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="/img/<?= $detail['foto_bef']; ?>" class="img-thumbnail">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2 -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto Selesai Kerja</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="/img/<?= $detail['foto_af']; ?>" class="img-thumbnail">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<!-- /.container-fluid -->


<!-- tampilkan map nya leatfel -->
<script>
    // Ambil latitude dan longitude lokasi pertama
    const lat1 = <?= $detail['latitude1'] ?>;
    const lon1 = <?= $detail['longitude1'] ?>;

    // Ambil latitude dan longitude lokasi kedua
    const lat2 = <?= $detail['latitude2'] ?>;
    const lon2 = <?= $detail['longitude2'] ?>;
    const map = L.map('map');

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    L.Routing.control({
        waypoints: [
            L.latLng(lat1, lon1),
            L.latLng(lat2, lon2),
        ]
    }).addTo(map);

    const marker = L.marker([lat1, lon1]).addTo(map)
        .bindPopup('<b>lokasi pertama</b><br><?= $detail['jalur_bef']; ?>').openPopup();

    const marker2 = L.marker([lat2, lon2]).addTo(map)
        .bindPopup('<b>lokasi kedua</b><br><?= $detail['jalur_af']; ?>').openPopup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent(`You clicked the map at ${e.latlng.toString()}`)
            .openOn(map);
    }

    map.on('click', onMapClick);
</script>

<!--- tampilkan durasi --->
<?php
function formatDurasi($waktuMulai, $waktuSelesai)
{
    // Konversi string datetime ke objek DateTime
    $mulai = new DateTime($waktuMulai);
    $selesai = new DateTime($waktuSelesai);

    // Hitung selisih waktu
    $durasi = $mulai->diff($selesai);

    // Tampilkan durasi dalam format yang diinginkan (jam:menit:detik)
    return sprintf('%02d jam %02d menit %02d detik', $durasi->h, $durasi->i, $durasi->s);
}
?>


<?= $this->endSection(); ?>
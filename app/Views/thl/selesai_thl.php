<?= $this->extend('templates/index'); ?>

<?= $this->section('user'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h5 class="h3 mb-4 text-gray-800">Riwayat</h5>
    <div class="alert-danger" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>

    <div class="row">
        <div class="col-sm">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card mb-3" style="max-width: 940px;">
                        <h2 class="card-header">Laporan Kinerja </h2>
                        <div class="row no-gutters">

                            <div class="col-md-7">
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td rowspan="2" class="table-primary">Lokasi Mulai Kerja
                                                    <br> Dan Foto Bukti Mulai Kerja
                                                </td>
                                                <td class="table-primary"><?= $jalur_bef; ?></td>
                                            </tr>
                                            <tr>
                                                <!-- Button trigger modal picture -->
                                                <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                                                        <img src="/img/<?= $foto_bef; ?>" class="img-thumbnail" style="max-width: 150px;">
                                                    </button></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2" class="table-success">Lokasi Selesai Kerja
                                                    <br> Dan Foto Bukti Selesai Kerja
                                                </td>
                                                <td class="table-success"><?= $jalur_af; ?></td>
                                            </tr>
                                            <tr>
                                                <!-- Button trigger modal picture -->
                                                <td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal2">
                                                        <img src="/img/<?= $foto_af; ?>" class="img-thumbnail" style="max-width: 150px;">
                                                    </button></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <?php if (in_groups('user_thl')) : ?>
                                        <form action="<?= base_url('thl/laporan'); ?>" method="post">
                                            <input type="hidden" id="cari" name="cari" value="<?= user()->username; ?>">
                                            <button class="btn btn-primary" type="submit" name="submit">Kembali</button>
                                        </form>
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
                        <img src="/img/<?= $foto_bef; ?>" class="img-thumbnail">
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
                        <img src="/img/<?= $foto_af; ?>" class="img-thumbnail">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- tampilkan map nya leatfel -->
<script>
    // Ambil latitude dan longitude lokasi pertama
    const lat1 = <?= $latitude1; ?>;
    const lon1 = <?= $longitude1; ?>;

    // Ambil latitude dan longitude lokasi kedua
    const lat2 = <?= $latitude2; ?>;
    const lon2 = <?= $longitude2; ?>;
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
        .bindPopup('<b>lokasi pertama</b><br><?= $jalur_bef; ?>').openPopup();

    const marker2 = L.marker([lat2, lon2]).addTo(map)
        .bindPopup('<b>lokasi kedua</b><br><?= $jalur_af; ?>').openPopup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent(`You clicked the map at ${e.latlng.toString()}`)
            .openOn(map);
    }

    map.on('click', onMapClick);
</script>




<?= $this->endSection(); ?>
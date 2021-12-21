<?= $this->extend('/user_template'); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h4>Daftar Buku Tersedia</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($buku as $b) : ?>
                    <?php
                    switch ($b['stok_buku']) {
                        case $b['stok_buku'] > 5 && $b['stok_buku'] <= 10:
                            $c = 'badge-warning';
                            break;
                        case $b['stok_buku'] <= 5:
                            $c = 'badge-danger';
                            break;
                        default:
                            $c = 'badge-success';
                            break;
                    }
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><button type="button" class="btn btn-sm btn-light rounded" id="<?= $b['kode_buku'] ?>"><?= $b['judul_buku'] ?></button></td>
                        <td><?= $b['penulis_buku'] ?></td>
                        <td><?= $b['penerbit_buku'] ?></td>
                        <td><?= $b['tahun_terbit'] ?></td>
                        <td class="text-center">
                            <div class="badge badge-pill <?= $c ?>"><?= $b['stok_buku'] ?></div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?php foreach ($buku as $buk) : ?>
            <!-- ----------------------------------------- -->
            <!-- Modal <?= $buk['judul_buku'] ?> -->
            <?php $img = $buk['cover_buku'] ?>
            <div class="modal-part" id="<?= md5(md5(md5(md5($buk['kode_buku'])))) ?>">
                <div class="row">
                    <div class="col-md-5 mb-3 d-flex justify-content-center align-items-center">
                        <img src="/assets/imgs/cover/<?= $buk['cover_buku'] ?>" alt="" class="img-fluid w-75">
                    </div>
                    <div class="col-md-7 mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <td><?= $buk['judul_buku'] ?></td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td><?= $buk['kategori'] ?></td>
                                </tr>
                                <tr>
                                    <th>Penulis</th>
                                    <td><?= $buk['penulis_buku'] ?></td>
                                </tr>
                                <tr>
                                    <th>Penerbit</th>
                                    <td><?= $buk['penerbit_buku'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tahun Terbit</th>
                                    <td><?= $buk['tahun_terbit'] ?></td>
                                </tr>
                                <tr>
                                    <th>Stok Buku</th>
                                    <td><?= $buk['stok_buku'] ?></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <blockquote><strong>Sinopsis</strong> ~ <?= $buk['sinopsis'] ?></blockquote>
                <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary"><i class="far fa-bookmark mr-2"></i>Pinjam Buku</button></div>
            </div>
            <script>
                $(document).ready(function() {
                    $("#<?= $buk['kode_buku'] ?>").fireModal({
                        size: 'modal-lg',
                        title: "<?= $buk['judul_buku'] ?>",
                        body: $("#<?= md5(md5(md5(md5($buk['kode_buku'])))) ?>"),
                        center: true
                    })
                });
            </script>
            <!-- End Modal <?= $buk['judul_buku'] ?> -->
        <?php endforeach ?>

    </div>
</div>
<?= $this->endSection(); ?>
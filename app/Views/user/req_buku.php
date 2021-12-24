<?php $this->extend('/user_template'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Peminjam Buku</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="buku" class="control-label">Buku</label>
                        <select required name="buku" id="buku" class="select2 custom-select">
                            <option>Pilih Buku</option>
                            <?php foreach ($buku as $b) : ?>
                                <option value="<?= $b['kode_buku'] ?>">(<?= $b['kode_buku'] ?>) ~ <?= $b['judul_buku'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Pinjamkan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Pinjaman dalam proses</h4>
            </div>
            <div class="card-body">
                <div class="card-responsive">
                    <div class="table-responsive">
                        <table class="table" id="table-pinjaman">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th class="text-center">Status</th>
                                    <th>Judul Buku</th>
                                    <th>Waktu peminjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($proses_pinjaman as $p) : ?>
                                    <?php
                                    $tglkmbl = explode('-', $p['tanggal_kembali']);
                                    $tglpnjm = explode('-', $p['tanggal_pinjam']);
                                    $hari = end($tglkmbl) - end($tglpnjm);
                                    ?>
                                    <?php
                                    if ($p['peminjaman_status'] == 1) {
                                        $stts = '<b class="text-success" data-toggle="tooltip" title="dikembalikan"><i class="fa fa-check-circle"></i></b>';
                                        $m = "dikembalikan";
                                        $c = 'success';
                                    } elseif ($p['peminjaman_status'] == 2) {
                                        $stts = '<b class="text-primary" data-toggle="tooltip" title="dipinjamkan"><i class="fa fa-reply"></i></b>';
                                        $m = "dipinjamkan";
                                        $c = 'primary';
                                    } elseif ($p['peminjaman_status'] == 3) {
                                        $stts = '<b class="text-dark" data-toggle="tooltip" title="proses"><i class="fa fa-history"></i></b>';
                                        $m = "proses";
                                        $c = 'dark';
                                    } else {
                                        $stts = '<b class="text-danger" data-toggle="tooltip" title="ditolak"><i class="fa fa-times-circle"></i></b>';
                                        $m = "ditolak";
                                        $c = 'danger';
                                    }
                                    ?>
                                    <tr>
                                        <td class="align-middle"><?= $no++ ?></td>
                                        <td class="align-middle text-center">
                                            <?= $stts ?> <span class="ml-1 d-none"><?= $m ?></span>
                                        </td>
                                        <td class="align-middle"><?= $p['judul_buku'] ?></td>
                                        <td class="align-middle">
                                            <i class="text-dark" data-toggle="tooltip" title="Tanggal dipinjamkan"><i class="fa fa-sign-out-alt mr-2"></i><?= $p['tanggal_pinjam'] ?></i><br>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="card card-warning">
            <div class="card-header">
                <h4>Perhatian</h4>
            </div>
            <div class="card-body">
                <blockquote><b>Pengembalian Buku</b> Maksimal <u>1 minggu</u> terhitung saat awal peminjaman di berikan</blockquote>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>
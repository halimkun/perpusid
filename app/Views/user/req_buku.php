<?php $this->extend('/user_template'); ?>
<?php $this->section('content'); ?>
<?php
$check_data = [
    "id"        => user_id(),
    "email"     => user()->email,
    "username"  => user()->username,
    "firstname" => user()->firstname,
    "lastname"  => user()->lastname,
    "tgl_lahir" => user()->tgl_lahir,
    "phone"     => user()->phone,
    "gender"    => user()->gender,
    "profile"   => user()->profile,
    "address"   => user()->address,
];
?>
<div class="row">
    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Peminjam Buku</h4>
            </div>
            <div class="card-body">
                <?php if (in_array(null, $check_data)) : ?>
                    <div class="alert alert-warning">
                        Lengkapi data terlebih dahulu <a href="/u/profile" class="btn btn-sm btn-light text-dark px-3 ml-3" >Profile</a>
                    </div>
                    <form action="/peminjaman/new" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="from" value="user">
                        <input type="hidden" name="diu" value="<?= user()->id ?>">
                        <div class="form-group">
                            <label for="buku" class="control-label">Buku</label>
                            <select disabled required name="buku" id="buku" class="select2 custom-select">
                                <option>Pilih Buku</option>
                                <?php foreach ($buku as $b) : ?>
                                    <option value="<?= $b['kode_buku'] ?>">(<?= $b['kode_buku'] ?>) ~ <?= $b['judul_buku'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary disabled" disabled>Pinjamkan</button>
                        </div>
                    </form>
                <?php else : ?>
                    <form action="/peminjaman/new" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="from" value="user">
                        <input type="hidden" name="diu" value="<?= user()->id ?>">
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
                <?php endif ?>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Pinjaman dalam proses</h4>
            </div>
            <div class="card-body">
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
<?php $this->extend('/user_template'); ?>
<?php $this->section('content'); ?>
<?php
$date = new DateTime(user()->created_at->toDateString());
$now = new DateTime($now->toDateString());

$age = $date->diff($now);
?>

<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Keanggotaan</h4>
                </div>
                <div class="card-body">
                    <?= $age->d ?> Hari
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Buku Terpinjam</h4>
                </div>
                <div class="card-body">
                    <?= count($pinjaman) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="far fa-check-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Selesai Pinjam</h4>
                </div>
                <div class="card-body">
                    <?= count($dikembalikan) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-3">
    <div class="table-responsive">
        <table class="table" id="table-pinjaman">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Status</th>
                    <th>Judul Buku</th>
                    <th>Waktu peminjaman</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pinjaman as $p) : ?>
                    <?php
                    $tglkmbl = explode('-', $p['tanggal_kembali']);
                    $tglpnjm = explode('-', $p['tanggal_pinjam']);
                    $hari = end($tglkmbl) - end($tglpnjm);
                    ?>
                    <?php
                    if ($p['peminjaman_status'] == 1) {
                        $stts = '<b class="text-white" data-toggle="tooltip" title="dikembalikan"><i class="fa fa-check-circle"></i></b>';
                        $m = "dikembalikan";
                        $c = 'success';
                    } elseif ($p['peminjaman_status'] == 2) {
                        $stts = '<b class="text-white" data-toggle="tooltip" title="dipinjamkan"><i class="fa fa-reply"></i></b>';
                        $m = "dipinjamkan";
                        $c = 'primary';
                    } elseif ($p['peminjaman_status'] == 3) {
                        $stts = '<b class="text-white" data-toggle="tooltip" title="proses"><i class="fa fa-history"></i></b>';
                        $m = "proses";
                        $c = 'secondary';
                    } else {
                        $stts = '<b class="text-white" data-toggle="tooltip" title="ditolak"><i class="fa fa-times-circle"></i></b>';
                        $m = "ditolak";
                        $c = 'danger';
                    }
                    ?>
                    <tr>
                        <td class="align-middle"><?= $no++ ?></td>
                        <td class="align-middle">
                            <div class="badge badge-<?= $c ?>"><?= $stts ?> <span class="ml-1"><?= $m ?></span></div>
                        </td>
                        <td class="align-middle"><?= $p['judul_buku'] ?></td>
                        <td class="align-middle">
                            <i class="text-dark" data-toggle="tooltip" title="Tanggal dipinjamkan"><i class="fa fa-sign-out-alt mr-2"></i><?= $p['tanggal_pinjam'] ?></i><br>
                            <b class="text-warning" data-toggle="tooltip" title="tanggal pengembalian"><i class="fa fa-sign-in-alt mr-2"></i><?= $p['tanggal_kembali'] ?></b> <br> <code>(<?= $hari ?>) Hari</code>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection(); ?>
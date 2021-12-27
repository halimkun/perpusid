<?php $this->extend('/admin_template'); ?>
<?php $this->section('content'); ?>
<div class="card card-body">
    <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="section-title">Daftar Peminjam</h2>
                <p class="section-lead">
                    Datfar transaksi peminjaman buku.
                </p>
            </div>
            <a href="/admin/peminjaman/new" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
        </div>
        <hr>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="mb-3">
            <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                <div class="alert-icon">
                    <i class="fa fa-check-circle mr-3"></i>
                </div>
                <div class="alert-body">
                    <div class="alert-title">Sukses</div>
                    <?= session()->getFlashdata('success') ?>
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                </div>
            </div>
        </div>
    <?php elseif (session()->getFlashdata('error')) : ?>
        <div class="mb-3">
            <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                <div class="alert-icon">
                    <i class="fa fa-times-circle mr-3"></i>
                </div>
                <div class="alert-body">
                    <div class="alert-title">Woops . . .</div>
                    <?= session()->getFlashdata('error') ?>
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table" id="table-pinjaman">
            <thead>
                <tr>
                    <th>No.</th>
                    <th></th>
                    <th>Nama User</th>
                    <th>Judul Buku</th>
                    <th>Waktu peminjaman</th>
                    <th><i class="fa fa-cogs"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($peminjam as $p) : ?>
                    <?php
                    $tglkmbl = explode('-', $p->tanggal_kembali);
                    $tglpnjm = explode('-', $p->tanggal_pinjam);
                    $hari = end($tglkmbl) - end($tglpnjm);
                    ?>
                    <?php
                    if ($p->peminjaman_status == 1) {
                        $stts = '<b class="text-success" data-toggle="tooltip" title="dikembalikan"><i class="fa fa-check-circle"></i></b>';
                        $m = "dikembalikan";
                    } elseif ($p->peminjaman_status == 2) {
                        $stts = '<b class="text-primary" data-toggle="tooltip" title="dipinjamkan"><i class="fa fa-reply"></i></b>';
                        $m = "dipinjamkan";
                    } elseif ($p->peminjaman_status == 3) {
                        $stts = '<b class="text-dark" data-toggle="tooltip" title="proses"><i class="fa fa-history"></i></b>';
                        $m = "proses";
                    } else {
                        $stts = '<b class="text-danger" data-toggle="tooltip" title="ditolak"><i class="fa fa-times-circle"></i></b>';
                        $m = "ditolak";
                    }
                    ?>
                    <tr>
                        <td class="align-middle"><?= $no++ ?></td>
                        <td class="align-middle"><?= $stts ?><div class="d-none"><?= $m ?></div>
                        </td>
                        <td class="align-middle"><?= ucfirst($p->firstname . " " . $p->lastname) ?></td>
                        <td class="align-middle"><?= $p->judul_buku ?></td>
                        <td class="align-middle">
                            <i class="text-dark" data-toggle="tooltip" title="Tanggal dipinjamkan"><i class="fa fa-sign-out-alt mr-2"></i><?= $p->tanggal_pinjam ?></i><br>
                            <b class="text-warning" data-toggle="tooltip" title="tanggal pengembalian"><i class="fa fa-sign-in-alt mr-2"></i><?= $p->tanggal_kembali ?></b> <br> <code>(<?= $hari ?>) Hari</code>
                        </td>
                        <td class="align-middle">
                            <a href="/admin/peminjaman/<?= $p->kode_peminjaman ?>" class="btn btn-primary btn-sm">detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection(); ?>
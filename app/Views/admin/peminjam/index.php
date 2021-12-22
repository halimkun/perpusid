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
                            <button class="btn btn-sm btn-light esli<?= $p->kode_peminjaman ?>"><i class="fa fa-pen"></i></button>
                            <button class="btn btn-sm btn-danger" data-confirm="Woops . . !|Apakah anda yakin akan menghapus jurusan <hr> <h5><?= $p->kode_peminjaman ?></h5>"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?php foreach ($peminjam as $pem) : ?>
            <form action="/peminjaman/update_stts" class="modal-part" id="eslif<?= $pem->kode_peminjaman ?>" method="post">
                <blockquote>
                    Nama Peminjam : <?= ucfirst($pem->firstname . " " . $pem->lastname) ?> <br>
                    Judul Buku : <?= $pem->judul_buku ?> <br>
                </blockquote>
                <input type="hidden" name="_method" value="patch">
                <input type="hidden" name="kode" value="<?= $pem->kode_peminjaman ?>">
                <div class="form-group">
                    <label for="status" class="control-label">Status Peminjam</label>
                    <select name="status" id="status" class="form-control">
                        <option <?= ($pem->peminjaman_status == '0') ? 'selected' : '' ?> value="0">ditolak</option>
                        <option <?= ($pem->peminjaman_status == '1') ? 'selected' : '' ?> value="1">dikembalikan</option>
                        <option <?= ($pem->peminjaman_status == '2') ? 'selected' : '' ?> value="2">dipinjamkan</option>
                        <option <?= ($pem->peminjaman_status == '3') ? 'selected' : '' ?> value="3">proses</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </form>
            <script>
                $(document).ready(function() {
                    $(".esli<?= $pem->kode_peminjaman ?>").fireModal({
                        title: "Update Status Peminjaman",
                        body: $("#eslif<?= $pem->kode_peminjaman ?>"),
                        center: true
                    })
                });
            </script>
        <?php endforeach ?>

    </div>
</div>
<?php $this->endSection(); ?>
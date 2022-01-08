<?php $this->extend('/admin_template'); ?>
<?php $this->section('content'); ?>
<div class="card card-body">
    <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="section-title">List Buku</h2>
                <p class="section-lead">
                    Daftar semua buku yang tersimpan.
                </p>
            </div>
            <a href="/admin/buku/new" class="btn btn-sm btn-primary"><i class="fa fa-plus mr-1"></i> Tambah Buku</a>
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
        <table class="table" id="table-buku">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Kategori</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th><i class="fa fa-cogs"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($buku as $b) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><a href="<?= base_url("admin/buku/detail/".$b['kode_buku']) ?>"><?= $b['judul_buku'] ?></a></td>
                        <td><?= $b['penulis_buku'] ?></td>
                        <td><?= $b['penerbit_buku'] ?></td>
                        <td><?= $b['kategori'] ?></td>
                        <td><?= $b['tahun_terbit'] ?></td>
                        <td><?= $b['stok_buku'] ?></td>
                        <td>
                            <a href="<?= base_url("admin/buku/detail/".$b['kode_buku']) ?>" title="detail" class="btn btn-sm btn-secondary text-dark"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection(); ?>
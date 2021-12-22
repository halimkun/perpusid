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
            <a href="/admin/buku/new" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
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
                    <th>Kode</th>
                    <th>Nama User</th>
                    <th>Judul Buku</th>
                    <th>Tanggal peminjaman</th>
                    <th>Status Pinjaman</th>
                    <th>Stok</th>
                    <th><i class="fa fa-cogs"></i></th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection(); ?>
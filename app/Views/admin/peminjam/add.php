<?php $this->extend('/admin_template'); ?>
<?php $this->section('content'); ?>

<div class="row">
    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Peminjam Buku</h4>
            </div>
            <div class="card-body">
                <form action="/peminjaman/new" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user" class="control-label">User</label>
                                <select required name="user" id="user" class="select2 custom-select">
                                    <option>Pilih User</option>
                                    <?php foreach ($users as $u) : ?>
                                        <option value="<?= $u->id ?>"><?= $u->firstname . " " . $u->lastname ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_kembali" class="control-label">Tanggal Kembali</label>
                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control">
                            </div>
                        </div>
                    </div>
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
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="card card-warning">
            <div class="card-header">
                <h4>Perhatian</h4>
            </div>
            <div class="card-body">
                <blockquote>
                    Pastikan pilih user dan buku dengan benar.
                    <hr><b>Pengembalian <u>Default</u></b> adalah <u>1 minggu</u> terhitung saat awal peminjaman
                </blockquote>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>
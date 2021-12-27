<?php $this->extend('/admin_template'); ?>
<?php $this->section('content'); ?>
<div class="row">
    <div class="col-md-7">
        <div class="card card-primary">
            <div class="card-header">
                <h4 style="font-family: monospace;">Detail Buku</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Judul Buku</th>
                            <td><?= $peminjam->judul_buku ?></td>
                        </tr>
                        <tr>
                            <th>Penulis Buku</th>
                            <td><?= $peminjam->penulis_buku ?></td>
                        </tr>
                        <tr>
                            <th>Penerbit Buku</th>
                            <td><?= $peminjam->penerbit_buku ?></td>
                        </tr>
                        <tr>
                            <th>Tahun Buku</th>
                            <td><?= $peminjam->tahun_terbit ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4 style="font-family: monospace;">Detail Peminjam</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Nama Peminjam</th>
                            <td><?= $peminjam->firstname . " " . $peminjam->lastname ?></td>
                        </tr>
                        <tr>
                            <th>Username Peminjam</th>
                            <td><?= $peminjam->username ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card card-primary">
            <div class="card-header">
                <h4 style="font-family: monospace;">Detail</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label">Tanggal Pinjam</label>
                    <input type="text" class="form-control" readonly disabled value="<?= $peminjam->tanggal_pinjam ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Tanggal Kembali</label>
                    <input type="text" class="form-control" readonly disabled value="<?= $peminjam->tanggal_kembali ?>">
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4 style="font-family: monospace;">Update Status</h4>
            </div>
            <div class="card-body">
                <form action="/peminjaman/update_stts" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="patch">
                    <input type="hidden" name="kode" value="<?= $peminjam->kode_peminjaman ?>">
                    <input type="hidden" name="kode_buku" value="<?= $peminjam->kode_buku ?>">
                    <div class="form-group">
                        <label class="control-label">Peminjaman Status</label>
                        <select name="status" class="custom-select" id="ps">
                            <option></option>
                            <option <?= ($peminjam->peminjaman_status == "1") ? 'selected' : '' ?> value="1">Dikembalikan</option>
                            <option <?= ($peminjam->peminjaman_status == "2") ? 'selected' : '' ?> value="2">Dipinjamkan</option>
                            <option <?= ($peminjam->peminjaman_status == "3") ? 'selected' : '' ?> value="3">Proses</option>
                            <option <?= ($peminjam->peminjaman_status == "0") ? 'selected' : '' ?> value="0">Ditolak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4 style="font-family: monospace;">Update Peminjaman Buku</h4>
            </div>
            <div class="card-body">
                <form action="/peminjaman/update" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="peminjaman" value="<?= $peminjam->id_peminjaman ?>">
                    <input type="hidden" name="kode" value="<?= $peminjam->kode_peminjaman ?>">
                    <div class="form-group">
                        <label class="control-label">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" class="form-control" value="<?= $peminjam->tanggal_pinjam ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" class="form-control" value="<?= $peminjam->tanggal_kembali ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>
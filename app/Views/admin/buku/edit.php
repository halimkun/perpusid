<?php $this->extend('/admin_template'); ?>
<?php $this->section('content'); ?>
<div class="card card-body">
    <h2 class="section-title">Edit Buku</h2>
    <div class="pt-2">
        <form action="/buku/update" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="old_img" value="<?= $buku['cover_buku'] ?>">
            <div class="mb-3">
                <label for="kode" class="form-label"><b>Kode buku</b></label>
                <input type="text" name="kode" id="kode" readonly class="form-control <?= $validation->hasError('kode') ? 'is-invalid' : '' ?>" value="<?= $buku['kode_buku'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kode'); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label"><b>Judul buku</b></label>
                <input type="text" name="judul" id="judul" placeholder="masukan judul buku" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" value="<?= $buku['judul_buku'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('judul'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kategori" class="form-label"><b>Kategori</b></label><br>
                        <select name="kategori" id="kategori" class="form-control select2 <?= $validation->hasError('kategori') ? 'is-invalid' : '' ?>">
                            <?php foreach ($kategori as $k) : ?>
                                <option <?= ($buku['kategori'] == $k['k']) ? 'selected' : '' ?> value="<?= $k['k'] ?>"><?= strtolower($k['k']) ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kategori'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tahun" class="form-label"><b>Tahun Terbit</b></label>
                        <input type="month" name="tahun" id="tahun" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : '' ?>" value="<?= $buku['tahun_terbit'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tahun'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label"><b>Penulis buku</b></label>
                <input type="text" name="penulis" id="penulis" placeholder="Penulis / Pengarang" class="form-control <?= $validation->hasError('penulis') ? 'is-invalid' : '' ?>" value="<?= $buku['penulis_buku'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('penulis'); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label"><b>Penerbit buku</b></label>
                <input type="text" name="penerbit" id="penerbit" placeholder="masukan penerbit buku" class="form-control <?= $validation->hasError('penerbit') ? 'is-invalid' : '' ?>" value="<?= $buku['penerbit_buku'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('penerbit'); ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <textarea name="sinopsis" id="sinopsis" class="summernote-simple <?= $validation->hasError('sinopsis') ? 'is-invalid' : '' ?>"><?= $buku['sinopsis'] ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('sinopsis'); ?>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="p-3">
                    <img src="<?= base_url('assets/imgs/cover/' . $buku['cover_buku']) ?>" alt="<?= $buku['judul_buku'] ?>" id="imgPreview" class="img-fluid img-thumbnail" width="200">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= $validation->hasError('cover') ? 'is-invalid' : '' ?>" name="cover" id="cover">
                    <div class="invalid-feedback">
                        <?= $validation->getError('cover'); ?>
                    </div>
                    <label class="custom-file-label" id="cover-label" for="cover">Pilih Cover Buku</label>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php $this->endSection(); ?>
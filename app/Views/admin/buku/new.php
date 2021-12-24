<?php $this->extend('/admin_template'); ?>
<?php $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <h1>Tambah Buku</h1>
        <hr>
        <div class="mt-4">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-3">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item mb-4">
                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="Tambah" aria-selected="true">Tambah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="Banyak Sekaligus" aria-selected="false">Banyak Sekaligus</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-9">
                    <div class="tab-content no-padding" id="myTab2Content">
                        <div class="tab-pane fade active show" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                            <form action="/buku/add" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="mb-3">
                                            <label for="kode" class="form-label"><b>Kode buku</b></label>
                                            <input type="text" name="kode" id="kode" readonly class="form-control <?= $validation->hasError('kode') ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kode'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="stok" class="form-label"><b>Stok Buku</b></label>
                                            <input required type="number" name="stok" id="stok" min="0" class="form-control <?= $validation->hasError('stok') ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('stok'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="judul" class="form-label"><b>Judul buku</b></label>
                                    <input type="text" name="judul" id="judul" placeholder="masukan judul buku" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>">
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
                                                    <option value="<?= $k['k'] ?>"><?= strtolower($k['k']) ?></option>
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
                                            <input type="month" name="tahun" id="tahun" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tahun'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="penulis" class="form-label"><b>Penulis buku</b></label>
                                    <input type="text" name="penulis" id="penulis" placeholder="Penulis / Pengarang" class="form-control <?= $validation->hasError('penulis') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('penulis'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="penerbit" class="form-label"><b>Penerbit buku</b></label>
                                    <input type="text" name="penerbit" id="penerbit" placeholder="masukan penerbit buku" class="form-control <?= $validation->hasError('penerbit') ? 'is-invalid' : '' ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('penerbit'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="sinopsis" class="form-label">Sinopsis</label>
                                    <textarea name="sinopsis" id="sinopsis" class="summernote-simple <?= $validation->hasError('sinopsis') ? 'is-invalid' : '' ?>"></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('sinopsis'); ?>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="p-3">
                                        <img src="" alt="" id="imgPreview" class="img-fluid img-thumbnail" width="200">
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
                        <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                            <code>under maintain</code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#judul").keyup(function() {
            var kode = $(this).val().match(/\b(\w)/g);
            var kode_fix = kode.join('');

            $("#kode").val(kode_fix);
        });

        $("#cover").change(function() {
            const file = this.files[0];
            $("#cover-label").text(file.name);
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#imgPreview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        })
    });
</script>
<?php $this->endSection(); ?>
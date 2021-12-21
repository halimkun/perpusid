<?php $this->extend('/admin_template'); ?>

<?php $this->section('content'); ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h1>Daftar Kategori</h1>
                <hr>
                <div class="mt-4 table-responsive">
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th width=120> <i class="fa fa-cog"></i> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($kategori as $k) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= ucfirst($k['k']) ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary text-dark" id="mdl<?= $k['idk'] ?>"><i class="fa fa-pen"></i></button>
                                        <button class="btn btn-sm btn-danger" data-confirm="Woops . . !|Apakah anda yakin akan menghapus jurusan <hr> <h5><?= $k['k'] ?></h5>" data-confirm-yes="var _0x3c6632=_0x2ff3;function _0x4d28(){var _0x4be5df=['344183QoOzAV','395343yqwNrx','1654344mTYKKR','4jPzHDk','/admin/buku/kategori','4904490JJpZeC','2WnrHco','ajax','2041735AshAEn','done','2695BXnxvD','/kategori/action/','489687OUuPTX','href','1854vcBWqv','DELETE'];_0x4d28=function(){return _0x4be5df;};return _0x4d28();}function _0x2ff3(_0x5de694,_0x7c3f86){var _0x4d28fd=_0x4d28();return _0x2ff3=function(_0x2ff3b5,_0x13dba0){_0x2ff3b5=_0x2ff3b5-0x132;var _0xa9fa65=_0x4d28fd[_0x2ff3b5];return _0xa9fa65;},_0x2ff3(_0x5de694,_0x7c3f86);}(function(_0x4fab8d,_0x5c3ac3){var _0x1968e2=_0x2ff3,_0x2159b3=_0x4fab8d();while(!![]){try{var _0x349ba5=parseInt(_0x1968e2(0x136))/0x1+parseInt(_0x1968e2(0x13c))/0x2*(parseInt(_0x1968e2(0x132))/0x3)+parseInt(_0x1968e2(0x139))/0x4*(-parseInt(_0x1968e2(0x13e))/0x5)+-parseInt(_0x1968e2(0x134))/0x6*(parseInt(_0x1968e2(0x140))/0x7)+-parseInt(_0x1968e2(0x138))/0x8+-parseInt(_0x1968e2(0x137))/0x9+parseInt(_0x1968e2(0x13b))/0xa;if(_0x349ba5===_0x5c3ac3)break;else _0x2159b3['push'](_0x2159b3['shift']());}catch(_0x243906){_0x2159b3['push'](_0x2159b3['shift']());}}}(_0x4d28,0x35ab5),$[_0x3c6632(0x13d)]({'url':_0x3c6632(0x141)+'<?= $k['idk'] ?>','type':_0x3c6632(0x135)})[_0x3c6632(0x13f)](function(){var _0x333700=_0x3c6632;location[_0x333700(0x133)]=_0x333700(0x13a);}));"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Data -->
    <?php foreach ($kategori as $kat) : ?>
        <form action="/kategori/action" method="post" class="modal-part" id="mp<?= $k['idk'] ?>">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="idk" value="<?= $kat['idk'] ?>">
            <div class="mb-3">
                <label for="k" class="form-label">Nama Kategori</label>
                <input type="text" name="k" id="l" class="form-control" value="<?= $kat['k'] ?>">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                $("#mdl<?= $kat['idk'] ?>").fireModal({
                    title: "Update Kategori <?= $kat['k'] ?>",
                    body: $("#mp<?= $k['idk'] ?>"),
                    center: true
                })
            });
        </script>
    <?php endforeach ?>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4>Tambah Kategori Baru</h4>
                <hr>
                <form action="/kategori/add" method="post" class="mt-4">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="k" class="form-label">Nama Kategori</label>
                        <input type="text" name="k" id="l" class="form-control <?= ($validation->hasError('k')) ? 'is-invalid' : '' ?>" value="<?= ($validation->hasError('k')) ? old('k') : '' ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('k') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>
<?php $this->extend('/admin_template'); ?>

<?php $this->section('content'); ?>
<div class="row">
    <div class="col-md-8">
        <div class="card card-danger">
            <div class="card-header">
                <h4>Tambah Group User</h4>
            </div>
            <div class="card-body">
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
                                <th>Deskripsi</th>
                                <th width=120> <i class="fa fa-cog"></i> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($groups as $g) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= ucfirst($g->name) ?></td>
                                    <td><?= ucfirst($g->description) ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary text-dark" id="mdl<?= $g->id ?>"><i class="fa fa-pen"></i></button>
                                        <button class="btn btn-sm btn-danger" data-confirm="Woops . . !|Apakah anda yakin akan menghapus jurusan <hr> <h5><?= $g->name ?></h5>" data-confirm-yes='$(document).ready(function () {$("#il<?= $g->id ?>").submit();})'><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <form action="/groups/delete" method="post" id="il<?= $g->id ?>">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?= $g->id ?>">
                                </form>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Data -->
    <?php foreach ($groups as $gr) : ?>
        <form action="/groups/update" method="post" class="modal-part" id="mp<?= $gr->id ?>">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $gr->id ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Group</label>
                <input type="text" name="name" id="" class="form-control" value="<?= $gr->name ?>">
            </div>
            <div class="mb-3">
                <label for="k" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"><?= $gr->description ?></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
            </div>
        </form>

        <script>
            $(document).ready(function() {
                $("#mdl<?= $gr->id ?>").fireModal({
                    title: "Update Kategori <?= $gr->name ?>",
                    body: $("#mp<?= $gr->id ?>"),
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
                <form action="/groups/create" method="post" class="mt-4">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="name" class="control-label">Nama Groups</label>
                        <input type="text" name="name" id="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" value="<?= ($validation->hasError('name')) ? old('name') : '' ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="control-label">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : '' ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('description') ?>
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
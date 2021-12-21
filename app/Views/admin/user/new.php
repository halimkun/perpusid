<?= $this->extend('/admin_template'); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="section-title">Tambah User Baru</div>
        <hr>
        <div class="mt-4">
            <?= view('Myth\Auth\Views\_message_block') ?>
            <form action="/user/register" method="post">
                <div class="row">
                    <?= csrf_field() ?>
                    <div class="form-group col-md-5 col-xs-12 mb-3">
                        <label for="firstname" class="control-label">First Name</label>
                        <input required type="text" name="firstname" id="firstname" class="form-control <?php if (session('errors.firstname')) : ?>is-invalid<?php endif ?>">
                    </div>
                    <div class="form-group col-md-4 col-xs-12 mb-3">
                        <label for="lastname" class="control-label">last Name</label>
                        <input required type="text" name="lastname" id="lastname" class="form-control <?php if (session('errors.lastname')) : ?>is-invalid<?php endif ?>">
                    </div>
                    <div class="form-group col-md-3 col-xs-12 mb-3">
                        <label for="tgl_lahir" class="control-label">Tanggal Lahir</label>
                        <input required type="date" name="tgl_lahir" id="tgl_lahir" class="form-control <?php if (session('errors.tgl_lahir')) : ?>is-invalid<?php endif ?>">
                    </div>
                    <div class="form-group col-md-5 col-xs-12 mb-3">
                        <label for="email" class="control-label">Email</label>
                        <input required type="email" name="email" id="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>">
                    </div>
                    <div class="form-group col-md-4 col-xs-12 mb-3">
                        <label for="phone" class="control-label">Phone</label>
                        <input required type="tel" name="phone" id="phone" class="form-control <?php if (session('errors.phone')) : ?>is-invalid<?php endif ?>">
                    </div>
                    <div class="form-group col-md-3 col-xs-12 mb-3">
                        <label for="gender" class="control-label">Gender</label>
                        <select required name="gender" id="gender" class="custom-select <?php if (session('errors.gender')) : ?>is-invalid<?php endif ?>">
                            <option>Pilih Gender</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-md-12 col-xs-12">
                        <label for="address" class="control-label">Address</label>
                        <textarea required name="address" id="address" class="form-control summernote-simple <?php if (session('errors.address')) : ?>is-invalid<?php endif ?>"></textarea>
                    </div>

                    <div class="form-group mx-3">
                        <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
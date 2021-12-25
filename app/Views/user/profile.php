<?= $this->extend('/user_template'); ?>
<?= $this->section('content'); ?>

<?php
$date = new DateTime(user()->created_at->toDateString());
$now = new DateTime($now->toDateString());

$age = $date->diff($now);
?>

<?php if (user()->phone[0] == 0) {
    $tel = str_replace(user()->phone[0], '62', user()->phone);
} ?>

<div class="card shadow">
    <div class="card-body p-5">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <img src="/assets/imgs/avatar/<?= user()->profile ?>" alt="<?= user()->username ?>" id="imgPreview" class="img-fluid rounded-circle w-50" style="object-fit: cover; object-position: center; <?= ($uagent->isMobile()) ? '' : 'height: 150px; width: 150px;' ?>">
                    <div class="mt-3">
                        <h4 style="font-weight: 400;">
                            <?= ucfirst(user()->firstname . " " . user()->lastname) ?>
                            <small><?= (user()->gender == 'L') ? '<i class="fa fa-mars"></i>' : '<i class="fa fa-venus"></i>' ?></small>
                        </h4>
                        <code><?= user()->username ?></code>
                    </div>
                </div>
                <div class="mb-3 mt-4 text-muted"><strong>Profile</strong></div>
                <div class="mb-3"><i class="fas fa-calendar mr-2"></i> <i><?= $age->d ?> Day</i> </div>

                <div class="mb-3 mt-4 text-muted"><strong>User Details</strong></div>
                <div class="mb-3"><i class="far fa-envelope mr-2"></i><a href="mailto:<?= user()->email ?>"><?= user()->email ?></a></div>
                <div class="mb-3"><i class="fa fa-phone mr-2"></i><a href="tel:+<?= $tel ?>"><?= user()->phone ?></a></div>
                <div class="mb-3"><i class="fa fa-birthday-cake mr-2"></i><?= user()->tgl_lahir ?></div>
                <div class="mb-3"><i class="fa fa-map-marker-alt mr-2"></i><?= user()->address ?></div>
            </div>
            <div class="col-md-8">
                <h3 style="font-weight: 400;">Profile Setting</h3>
                <hr class="mb-5">
                <form action="/user/edit" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="from" value="user">
                    <input type="hidden" name="id" value="<?= user()->id ?>">
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-inpu" name="profile" id="profile">
                                <div class="invalid-feedback">
                                </div>
                                <label class="custom-file-label" id="profile-label" for="profile">Profile Pict</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="firstname" class="control-label">First Name</label>
                                <input type="text" name="firstname" value="<?= user()->firstname ?>" id="firstname" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="lastname" class="control-label">Last Name</label>
                                <input type="text" name="lastname" value="<?= user()->lastname ?>" id="lastname" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="tgl_lahir" class="control-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" value="<?= user()->tgl_lahir ?>" id="tgl_lahir" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="gender" class="control-label">Gender</label>
                                <select name="gender" id="gender" class="custom-select">
                                    <option></option>
                                    <option <?= (user()->gender == "L") ? 'selected' : '' ?> value="L">Laki-laki</option>
                                    <option <?= (user()->gender == "P") ? 'selected' : '' ?> value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address" class="control-label">Alamat</label>
                                <textarea name="address" id="address" class="form-control"><?= user()->address ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="username" class="control-label">Username</label>
                                <input type="text" name="username" id="username" value="<?= user()->username ?>" placeholder="enter good username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="mail" name="email" id="email" value="<?= user()->email ?>" placeholder="enter valida email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="phone" class="control-label">Phone</label>
                                <input type="tel" name="phone" id="phone" value="<?= user()->phone ?>" placeholder="enter valida phone" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#profile").change(function() {
            const file = this.files[0];
            $("#profile-label").text(file.name);
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
<?= $this->endSection(); ?>
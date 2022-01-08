<?= $this->extend('/admin_template'); ?>
<?= $this->section('content'); ?>

<div class="row mt-sm-4 mt-4">
    <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
            <div class="profile-widget-header">
                <div class="bg-img rounded-circle profile-widget-picture p-image" style="background-image: url(/assets/imgs/avatar/<?= $user->profile ?>); background-position: center; background-size: cover; background-clip: border-box; background-repeat: no-repeat; width: 100px; height: 100px; border-radius: 50%;"></div>
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Pinjam</div>
                        <div class="profile-widget-item-value">187 X</div>
                    </div>
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Keanggotaan</div>
                        <div class="profile-widget-item-value">145 Hari</div>
                    </div>
                </div>
            </div>
            <div class="profile-widget-description">
                <div class="profile-widget-name">
                    <?= $user->firstname . " " . $user->lastname ?>
                    <div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div> <?= $user->username ?> <div class="badge badge-pill badge-success ml-2"><?= $user->role ?></div>
                    </div>
                </div>
                <a href="mailto:<?= $user->email ?>"><?= $user->email ?></a>
                <hr>
                <i><?= $user->address ?></i>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
            <div class="card-header">
                <h4>Edit Profile</h4>
                <div class="card-header-action">
                    <button class="btn btn-sm btn-warning sr<?= md5(md5($user->id)) ?>">change role</button>
                    <a href="/user/delete/<?= $user->id ?>" class="btn btn-sm btn-danger ml-2">hapus</a>
                </div>
            </div>
            <form method="post" action="/user/edit" enctype="multipart/form-data" class="needs-validation">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $user->id ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('profile')) ? 'is-invalid' : '' ?>" name="profile" id="profile">
                            <div class="invalid-feedback">
                                <?= $validation->getError('profile'); ?>
                            </div>
                            <label class="custom-file-label" id="profile-label" for="profile">Pilih Profile</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            <label>First Name</label>
                            <input required type="text" class="form-control <?= ($validation->hasError('firstname')) ? 'is-invalid' : '' ?>" name="firstname" value="<?= $user->firstname ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('firstname'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label>Last Name</label>
                            <input required type="text" class="form-control <?= ($validation->hasError('lastname')) ? 'is-invalid' : '' ?>" name="lastname" value="<?= $user->lastname ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('lastname'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tgl Lahir</label>
                        <input required type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : '' ?>" name="tgl_lahir" value="<?= $user->tgl_lahir ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_lahir'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select required name="gender" id="gender" class="form-control <?= ($validation->hasError('gender')) ? 'is-invalid' : '' ?>">
                            <option>Gender</option>
                            <option <?= ($user->gender == 'L') ? 'selected' : '' ?> value="L">laki-laki</option>
                            <option <?= ($user->gender == 'P') ? 'selected' : '' ?> value="P">perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('gender'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Alamat</label>
                            <textarea required class="form-control summernote-simple <?= ($validation->hasError('address')) ? 'is-invalid' : '' ?>" name="address"><?= $user->address ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('address'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="p-3" style="background-color: rgb(220 53 69 / 23%);border-radius: 5px;border: #ff000057 2px solid;">
                        <div class="form-group">
                            <label>Phone</label>
                            <input required type="tel" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : '' ?>" name="phone" value="<?= $user->phone ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('phone'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input required type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" name="email" value="<?= $user->email ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input required type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>" name="username" value="<?= $user->username ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" name="password" value="">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal Set Role -->
<div class="modal-part" id="ha<?= md5(md5(md5(md5($user->id)))) ?>">
    <form action="/user/changeGroup" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="user_id" value="<?= $user->id ?>">
        <div class="form-group">
            <div class="control-center">Pilih Role</div>
            <select name="group_id" id="role" class="custom-select">
                <option>Pilih Role Baru</option>
                <?php foreach ($groups as $g) : ?>
                    <option value="<?= $g->id ?>"><?= $g->name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $(".sr<?= md5(md5($user->id)) ?>").fireModal({
            title: "Update Role <?= $user->username ?>",
            body: $("#ha<?= md5(md5(md5(md5($user->id)))) ?>"),
            center: true
        })
    })
</script>

<script>
    $(document).ready(function() {
        $("#profile").change(function() {
            const file = this.files[0];
            $("#profile-label").text(file.name);
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    // $('.p-image').attr('src', event.target.result);
                    $('.p-image').css('background-image', 'url(' + event.target.result + ')');
                }
                reader.readAsDataURL(file);
            }
        })
    });
</script>
<?= $this->endSection(); ?>
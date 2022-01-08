<?= $this->extend('/admin_template'); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h4>Daftar Anggota</h4>
        <div class="card-header-action">
            <a href="/admin/user/new/" class="btn btn-sm btn-primary"><i class="fa fa-plus mr-1"></i> Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <?= view('Myth\Auth\Views\_message_block') ?>
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
            <table class="table" id="table-user">
                <thead>
                    <tr>
                        <th width=50>No.</td>
                        <th>Role</td>
                        <th>Nama</td>
                        <th>Username</td>
                        <th>Email</td>
                        <th>No Telepon</td>
                        <th><i class="fa fa-cogs"></i></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($users as $u) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <div class="badge badge-sm shadow-sm badge-pill <?= ($u['name'] == 'admin') ? 'badge-secondary' : 'badge-light' ?>"><?= $u['name'] ?></div>
                            </td>
                            <td><a href="/user/detail/<?= $u['username'] ?>"><?= $u['firstname'] ?></a></td>
                            <td><a href="/user/detail/<?= $u['username'] ?>"><?= $u['username'] ?></a></td>
                            <td><?= $u['email'] ?></td>
                            <td><?= $u['phone'] ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Menu
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <button onclick="location.href='/user/edit/<?= $u['username'] ?>';" class="dropdown-item">Edit</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
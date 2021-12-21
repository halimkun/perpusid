<?= $this->extend('/user_template'); ?>
<?= $this->section('content'); ?>

<div class="card shadow">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="mb-4">
                    <div class="bg-img rounded-circle profile-widget-picture p-image" style="background-image: url(/assets/imgs/avatar/<?= $user['profile'] ?>); background-position: center; background-size: cover; background-clip: border-box; background-repeat: no-repeat; width: 250px; height: 250px; border-radius: 50%;"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <td><?= $user['nama'] ?></td>
                            </tr>
                            <tr>
                                <th>Tgl Lahir</th>
                                <td><?= $user['tgl_lahir'] ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= $user['jk'] ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?= $user['username'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $user['email'] ?></td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <td><?= $user['no_tlp'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $user['alamat'] ?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
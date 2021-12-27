<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= ($title != null) ? $title : "Home" ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/select2/dist/css/select2.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/self.css">

    <!-- JavaScript -->
    <script src="/assets/modules/jquery.min.js"></script>

    <style>
        .sep::before {
            content: ' ';
            border-radius: 5px;
            height: 5px;
            width: 80px;
            background-color: #6777ef;
            display: inline-block;
        }
    </style>

</head>

<body class="layout-3">
    <div style="height: 100vh">
        <nav class="navbar fixed-top navbar-light navbar-expand-lg main-navbar">
            <a href="/" class="navbar-brand sidebar-gone-hide text-dark">Stisla</a>
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars bg-primary" style="margin-top: 10px; padding: 10px; border-radius: 5px;"></i></a>
            <div class="nav-collapse d-none d-md-block d-lg-block">
                <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                    <i class="fas fa-ellipsis-v"></i>
                </a>

                <ul class="navbar-nav">
                    <li class="nav-item active"><a href="#" class="nav-link">Application</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Report Something</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Server Status</a></li>
                </ul>
            </div>
            <ul class="navbar-nav navbar-right ml-auto">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <?php if (logged_in()) : ?>
                            <img alt="image" src="/assets/imgs/avatar/<?= user()->profile ?>" class="rounded-circle mr-1" style="object-fit: cover;object-position: center;height: 30px;">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= user()->username ?></div>
                        <?php else : ?>
                            Account
                        <?php endif ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php if (logged_in()) : ?>
                            <a href="/user" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                        <?php else : ?>
                            <a href="/register" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Register
                            </a>
                        <?php endif ?>
                        <div class="dropdown-divider"></div>
                        <?php if (logged_in()) : ?>
                            <a href="<?= base_url('logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        <?php else : ?>
                            <a href="<?= base_url('login') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Login
                            </a>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </nav>

        <nav class="navbar navbar-secondary navbar-expand-lg d-none d-sm-block d-md-none">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                            <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                            <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="d-sm-flex align-items-center justify-content-between w-100 h-100" <?= ($uagent->isMobile()) ? 'style="margin-top: 100px;"' : '' ?>>
            <div class="col-md-4 mx-auto mb-4 mb-sm-0 headline">
                <h1 class="display-4 my-4 font-weight-bold"><span class="text-primary">Welcome To</span> PERPUS<span class="text-primary">ID</span></h1>
                <a href="#" class="btn px-5 py-3 text-white mt-3 mt-sm-0 btn-primary" style="border-radius: 30px;">Get Started</a>
            </div>
            <!-- in mobile remove the clippath -->
            <div class="col-md-8 h-100 clipped" style="min-height: 350px; background-image: url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80); background-position: center; background-size: cover;">

            </div>
        </div>
    </div>

    <section class="section-body p-5 bg-light">
        <div class="row py-5">
            <div class="col-md-4 col-sm-12 col-xs 12 text-center">
                <div class="display-4 counternya"><?= count($cbuku) ?></div>
                <h5 class="font-weight-light">Buku</h5>
            </div>
            <div class="col-md-4 col-sm-12 col-xs 12 text-center">
                <div class="display-4 counternya"><?= count($cuser) ?></div>
                <h5 class="font-weight-light">User</h5>
            </div>
            <div class="col-md-4 col-sm-12 col-xs 12 text-center">
                <div class="display-4 counternya"><?= count($cpeminjaman) ?></div>
                <h5 class="font-weight-light">Pinjaman</h5>
            </div>
        </div>
    </section>

    <section class="p-5 section-body">
        <div class="text-center mb-4">
            <h1 class="font-weight-light">Our Collection</h1>
            <div class="sep"></div>
        </div>
        <div class="row p-5">
            <?php foreach ($buku as $buku) : ?>
                <div class="col-md-6 col-sm-12 col-xs-12 ">
                    <div class="card rounded bg-light shadow-sm card-large-icons">
                        <div class="card-icon bg-primary text-white " data-image="/assets/imgs/cover/<?= $buku['cover_buku'] ?>" data-title="<?= $buku['judul_buku'] ?>" style="background-image: url('/assets/imgs/cover/<?= $buku['cover_buku'] ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; background-clip: border-box; align-items: flex-start !important; justify-content: flex-end!important">
                            <kbd class="bg-danger shadow" style="border-radius: 0px 0px 0px 10px;"><?= $buku['kategori'] ?></kbd>
                        </div>
                        <div class="card-body">
                            <h4><?= $buku['judul_buku'] ?></h4>
                            <p>
                                <strong>Penulis : </strong><?= $buku['penulis_buku'] ?> <br>
                                <strong>Penerbit : </strong><?= $buku['penerbit_buku'] ?> <br>
                                <strong>Tahun Terbit : </strong><?= $buku['tahun_terbit'] ?>
                            </p>
                            <button class="btn btn-sm btn-primary" id="<?= $buku['kode_buku'] ?>">Detail<i class="fas fa-chevron-right pl-2 card-cta"></i></button>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------- -->
                <!-- Modal <?= $buku['judul_buku'] ?> -->
                <?php $img = $buku['cover_buku'] ?>
                <div class="modal-part" id="<?= md5(md5(md5(md5($buku['kode_buku'])))) ?>">
                    <div class="row">
                        <div class="col-md-5 mb-3 d-flex justify-content-center align-items-center">
                            <img src="/assets/imgs/cover/<?= $buku['cover_buku'] ?>" alt="" class="img-fluid w-75">
                        </div>
                        <div class="col-md-7 mb-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <td><?= $buku['judul_buku'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td><?= $buku['kategori'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Penulis</th>
                                        <td><?= $buku['penulis_buku'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Penerbit</th>
                                        <td><?= $buku['penerbit_buku'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Terbit</th>
                                        <td><?= $buku['tahun_terbit'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Stok Buku</th>
                                        <td><?= $buku['stok_buku'] ?></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <blockquote><strong>Sinopsis</strong> ~ <?= $buku['sinopsis'] ?></blockquote>
                    <div class="d-flex justify-content-end">
                        <a href="/u/books/req" class="btn btn-primary"><i class="far fa-bookmark mr-2"></i>Pinjam Buku</a>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#<?= $buku['kode_buku'] ?>").fireModal({
                            size: 'modal-lg',
                            title: "<?= $buku['judul_buku'] ?>",
                            body: $("#<?= md5(md5(md5(md5($buku['kode_buku'])))) ?>"),
                            center: true
                        })
                    });
                </script>
                <!-- End Modal <?= $buku['judul_buku'] ?> -->
            <?php endforeach ?>
        </div>
    </section>

    <script>
        $('.counternya').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 5000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>

    <!-- General JS Scripts -->
    <!-- <script src="/assets/modules/popper.js"></script> -->
    <!-- <script src="/assets/modules/tooltip.js"></script> -->
    <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- <script src="/assets/modules/moment.min.js"></script> -->
    <script src="/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="/assets/modules/datatables/datatables.min.js"></script>
    <script src="/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="/assets/modules/select2/dist/js/select2.full.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="/assets/js/page/modules-datatables.js"></script>

    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <!-- <script src="/assets/js/custom.js"></script> -->
</body>

</html>
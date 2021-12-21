<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Blank Page &mdash; Stisla</title>

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

</head>

<body class="layout-3">
    <div style="height: 100vh">
        <nav class="navbar fixed-top navbar-light navbar-expand-lg main-navbar">
            <a href="/" class="navbar-brand sidebar-gone-hide text-dark">Stisla</a>
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars" style="margin-top: 21px;"></i></a>
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
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="/assets/imgs/avatar/avatar-1.png" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">Logged in 5 min ago</div>
                        <a href="features-profile.html" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <a href="features-activities.html" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> Activities
                        </a>
                        <a href="features-settings.html" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('logout') ?>" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
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
                <h1 class="display-4 my-4 font-weight-bold">Enter Your <span style="color: #9B5DE5;">Headline Here</span></h1>
                <a href="#" class="btn px-5 py-3 text-white mt-3 mt-sm-0" style="border-radius: 30px; background-color: #9B5DE5;">Get Started</a>
            </div>
            <!-- in mobile remove the clippath -->
            <div class="col-md-8 h-100 clipped" style="min-height: 350px; background-image: url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80); background-position: center; background-size: cover;">

            </div>
        </div>
    </div>

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
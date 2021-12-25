<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title><?= (!empty($title)) ? $title : "" ?></title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
	<link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
	<link rel="stylesheet" href="/assets/modules/select2/dist/css/select2.min.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="/assets/css/components.css">
	<link rel="stylesheet" href="/assets/css/style.css">


	<!-- JavaScript -->
	<script src="/assets/modules/jquery.min.js"></script>

</head>

<body>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<div class="mr-auto"></div>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="/assets/imgs/avatar/<?= user()->profile ?>" class="rounded-circle mr-1" style="object-fit: cover; object-position: center; height: 30px;" >
							<div class="d-sm-none d-lg-inline-block">Hi, <?= user()->username ?></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="/u/profile" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<div class="dropdown-divider"></div>
							<a href="/logout" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>

			<div class="main-sidebar sidebar-style-2">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="/">PERPUS<span class="text-primary">ID</span></a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="" class="text-primary">PID</a>
					</div>
					<ul class="sidebar-menu">
						<li class="menu-header">Dahboard</li>
						<li class="<?= (end($segment) == 'dashboard') ? 'active' : "" ?>"><a class="nav-link" href="<?= base_url('/u/dashboard') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

						<li class="menu-header">Aktivitas</li>
						<li class="dropdown <?= (end($segment) == 'books' || end($segment) == 'req') ? 'active' : "" ?>">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> <span>Aktivitas Saya</span></a>
							<ul class="dropdown-menu">
								<li class="<?= (end($segment) == 'books') ? 'active' : "" ?>"><a class="nav-link" href="<?= base_url('/u/books') ?>">Buku Tersedia</a></li>
								<li class="<?= (end($segment) == 'req') ? 'active' : "" ?>"><a class="nav-link" href="<?= base_url('/u/books/req') ?>">Pinjam Baru</a></li>
							</ul>
						</li>

						<li class="menu-header">Profile</li>
						<li class="<?= (end($segment) == 'profile') ? 'active' : "" ?>"><a class="nav-link" href="<?= base_url('/u/profile') ?>"><i class="fas fa-user-check"></i> <span>My Profile</span></a></li>
					</ul>
				</aside>
			</div>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-body">
						<?= $this->renderSection('content') ?>
					</div>
				</section>
			</div>
			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; 2018 <div class="bullet"></div>
				</div>
				<div class="footer-right">

				</div>
			</footer>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="/assets/modules/popper.js"></script>
	<script src="/assets/modules/tooltip.js"></script>
	<script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
	<script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
	<script src="/assets/modules/moment.min.js"></script>
	<script src="/assets/js/stisla.js"></script>

	<!-- JS Libraies -->
	<script src="/assets/modules/cleave-js/dist/cleave.min.js"></script>
	<script src="/assets/modules/cleave-js/dist/addons/cleave-phone.id.js"></script>
	<script src="/assets/modules/summernote/summernote-bs4.min.js"></script>
	<script src="/assets/modules/datatables/datatables.min.js"></script>
	<script src="/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
	<script src="/assets/modules/select2/dist/js/select2.full.min.js"></script>

	<!-- Page Specific JS File -->
	<script src="/assets/js/page/modules-datatables.js"></script>

	<!-- Template JS File -->
	<script src="/assets/js/scripts.js"></script>
	<script src="/assets/js/custom.js"></script>
</body>

</html>
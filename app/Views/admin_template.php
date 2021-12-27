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
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
					</ul>
					<div class="search-element">
						<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
						<button class="btn" type="submit"><i class="fas fa-search"></i></button>
						<div class="search-backdrop"></div>
					</div>
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="/assets/imgs/avatar/<?= user()->profile ?>" class="rounded-circle mr-1" style="width: 30px; height: 30px; object-fit: cover; object-position: center;">
							<div class="d-sm-none d-lg-inline-block">Hi, <?= user()->username ?></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="/user/detail/<?= user()->username ?>" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url('logout') ?>" class="dropdown-item has-icon text-danger">
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
						<li class="<?= (end($segment) == 'dashboard') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

						<li class="menu-header">Perputakaan</li>
						<li class="dropdown <?= (in_array('peminjaman', $segment)) ? 'active' : '' ?>">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-address-book"></i> <span>Peminjaman</span></a>
							<ul class="dropdown-menu">
								<li class=" <?= (in_array('peminjaman', $segment) && end($segment) == 'peminjaman') ? 'active' : '' ?>"><a class="nav-link" href="/admin/peminjaman">Semua Peminjam</a></li>
								<li class=" <?= (in_array('peminjaman', $segment) && end($segment) == 'new') ? 'active' : '' ?>"><a class="nav-link" href="/admin/peminjaman/new">Tambah Peminjam</a></li>
							</ul>
						</li>
						<li class="dropdown <?= (in_array('buku', $segment)) ? 'active' : '' ?>">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i> <span>Buku</span></a>
							<ul class="dropdown-menu">
								<li class=" <?= (in_array('buku', $segment) && end($segment) == 'buku') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('/admin/buku') ?>">Semua Data</a></li>
								<li class=" <?= (in_array('buku', $segment) && end($segment) == 'new') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('/admin/buku/new') ?>">Tambah baru</a></li>
								<li class=" <?= (in_array('buku', $segment) && end($segment) == 'kategori') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('/admin/buku/kategori') ?>">Kategori Buku</a></li>
							</ul>
						</li>
						<li class="dropdown <?= (in_array('user', $segment) || in_array('users', $segment)) ? 'active' : '' ?>">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
							<ul class="dropdown-menu">
								<li class="<?= (end($segment) == 'users') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/users') ?>">Semua Data</a></li>
								<li class="<?= (in_array('user', $segment) && end($segment) == 'new') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/user/new') ?>">Tambah baru</a></li>
								<li class="<?= (in_array('user', $segment) && end($segment) == 'group') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('admin/user/group') ?>">Group User</a></li>
							</ul>
						</li>
						<!-- <li class="menu-header">Settings</li>
						<li class=""><a class="nav-link" href="<?= base_url('setting') ?>"><i class="fas fa-cog"></i> <span>General</span></a></li> -->
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
					Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> Kelompok 2
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
	<script src="/assets/modules/chart.min.js"></script>
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
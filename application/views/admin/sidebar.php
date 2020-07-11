<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fa fa-university" aria-hidden="true"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Statistik</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Administratior
	</div>

	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Master Data
	</div>

	<!-- Nav Item - Master Data-->
	<!-- Master Data User -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/data_tunggal') ?>">
			<i class="fas fa-fw fa-key"></i>
			<span>Data Tunggal</span></a>
	</li>
	<!-- Master Data Lokasi -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/data_bergolong') ?>">
			<i class="fas fa-fw fa-key"></i>
			<span>Data Bergolong</span></a>
	</li>
	<!-- Master Data User Prodi -->



	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		User
	</div>

	<!-- Nav Item - User -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/profile') ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>My Profile</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - User Logout -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/logout') ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Logout</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">


	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->

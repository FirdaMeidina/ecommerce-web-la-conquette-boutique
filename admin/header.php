<?php 
session_start();
include '../koneksi/koneksi.php';
if(!isset($_SESSION['admin'])){
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.navbar-custom {
			background-color: #f15f7f;
			border-color: #4B3621;
		}
		.navbar-custom .navbar-brand,
		.navbar-custom .navbar-nav > li > a {
			color: #ffffff;
		}
		.navbar-custom .navbar-nav > .dropdown > a:hover,
		.navbar-custom .navbar-nav > .dropdown > a:focus {
			background-color: #4B3621;
			color: #ffffff;
		}
		.dropdown-menu > li > a:hover {
			background-color: #f15f7f;
			color: #ffffff;
		}
		.container {
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-custom">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">--Dashboard Admin La Conquette--</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-folder"></i> Data Master <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="m_produk.php">Master Produk</a></li>
							<li><a href="m_customer.php">Master Customer</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-exchange"></i> Data Transaksi <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="produksi.php">Daftar Pesanan</a></li>
						</ul>
					</li>
					
					</li>
					<li><a href="halaman_utama.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-cog"></i> Pemeliharaan <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="../DATABASE/backup.php">Backup Database</a></li>
							<li><a href="../DATABASE/retrieve.php">Retrieve Database</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user"></i> Admin <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="proses/logout.php">Log Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="jumbotron">
			<h1>Selamat Datang, Admin!</h1>
			<p>Gunakan panel ini untuk mengelola Butik La Conquette.</p>
			<p><a class="btn btn-primary btn-lg" href="halaman_utama.php" role="button">Dashboard</a></p>
		</div>
	</div>
	
 
	
</body>
</html>

<?php 
session_start();
include 'koneksi/koneksi.php';
if(isset($_SESSION['kd_cs'])){
    $kode_cs = $_SESSION['kd_cs'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Conquette</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row top" style="background-color:rgb(255, 221, 229); color: #333;">
            <div class="col-md-4 text-center" style="padding: 3px;">
                <span><i class="glyphicon glyphicon-earphone"></i> +6287806780915</span>
            </div>
            <div class="col-md-4 text-center" style="padding: 3px;">
                <span><i class="glyphicon glyphicon-envelope"></i> la_conquette@gmail.com</span>
            </div>
            <div class="col-md-4 text-center" style="padding: 3px;">
                <span>SKIRT. TOP. DRESS. SHOES. SANDALS</span>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-default" style="background-color: #f15f7f; border-color: #f15f7f;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color: #333;"><strong>LA CONQUETTE</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php" style="color: #333;">Home</a></li>
                    <li><a href="produk.php" style="color: #333;">Produk</a></li>
                    <li><a href="about.php" style="color: #333;">Tentang Kami</a></li>
                    <li><a href="manual.php" style="color: #333;">Manual Aplikasi</a></li>
                    <?php 
                    if(isset($_SESSION['kd_cs'])){
                        $kode_cs = $_SESSION['kd_cs'];
                        $cek = mysqli_query($conn, "SELECT kode_produk from keranjang where kode_customer = '$kode_cs' ");
                        $value = mysqli_num_rows($cek);
                        ?>
                        <li><a href="keranjang.php" style="color: #333;"><i class="glyphicon glyphicon-shopping-cart"></i> <b>[ <?= $value ?> ]</b></a></li>
                        <?php 
                    }else{
                        echo "<li><a href='keranjang.php' style='color: #333;'><i class='glyphicon glyphicon-shopping-cart'></i> [0]</a></li>";
                    }
                    if(!isset($_SESSION['user'])){
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #333;"><i class="glyphicon glyphicon-user"></i> Akun <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="user_login.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                                <li><a href="admin">Login Admin</a></li>
                            </ul>
                        </li>
                        <?php 
                    }else{
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #333;"><i class="glyphicon glyphicon-user"></i> <?= $_SESSION['user']; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="proses/logout.php">Log Out</a></li>
                            </ul>
                        </li>
                        <?php 
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>

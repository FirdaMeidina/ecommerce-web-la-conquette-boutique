<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La_Conquette</title>
    <style>
        .container-fluid {
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .slider {
            width: 100%;
            overflow: hidden;
        }

        .slides {
            display: flex;
            width: 200%; /* Two slides, so 200% */
            animation: slide 10s infinite;
        }

        .slide {
            width: 50%; /* Each slide takes up half of the container (100% / 2) */
        }

        @keyframes slide {
            0% { transform: translateX(0); }
            20% { transform: translateX(0); }
            30% { transform: translateX(-50%); }
            50% { transform: translateX(-50%); }
            60% { transform: translateX(0); }
            100% { transform: translateX(0); }
        }

        .text-center {
            text-align: center;
        }

        .thumbnail {
            border: 1px solid #ddd;
            padding: 8px;
            border-radius: 4px;
            text-align: center;
        }

        .thumbnail img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .caption {
            padding: 9px;
            color: #333;
        }

        .btn-block {
            display: block;
            width: 100%;
        }

        .moving-text {
            animation: moveUpDown 3s infinite alternate;
        }

        @keyframes moveUpDown {
            0% { transform: translateY(0); }
            100% { transform: translateY(20px); }
        }
    </style>
</head>
<body>

<?php 
include 'header.php';
?>

<div class="container-fluid" style="margin: 0;padding: 0;">
    <div class="slider">
        <div class="slides">
            <div class="slide"><img src="image/home/2.jpg" style="width: 100%; height: 785px;"></div>
            <div class="slide"><img src="image/home/3.jpeg" style="width: 100%; height: 785px;"></div>
        </div>
    </div>
</div>

<!-- PRODUK TERBARU -->
<div class="container">
    <h4 class="text-center " style="font-family: Lucida Sans Unicode; padding-top: 10px; padding-bottom: 10px; font-style: italic; line-height: 29px; border-top: 5px solid #f15f7f; border-bottom: 5px solid #f15f7f;">
    " Welcome to La Conquette! Discover Elegance and Style with Every Touch "
    </h4>

    <h2 style="width: 100%; border-bottom: 5px solid #f15f7f; margin-top: 50sspx;"><b>Conquette Products</b></h2>

    <div class="row">
        <?php 
        $result = mysqli_query($conn, "SELECT * FROM produk");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="image/produk/<?= $row['image']; ?>">
                    <div class="caption">
                        <h3><?= $row['nama']; ?></h3>
                        <h4>Rp.<?= number_format($row['harga']); ?></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn btn-warning btn-block">Detail</a>
                            </div>
                            <?php if(isset($_SESSION['kd_cs'])) { ?>
                                <div class="col-md-6">
                                    <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-6">
                                    <a href="keranjang.php" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>
    </div>
</div>

<br>
<br>
<br>
<br>

<?php 
include 'footer.php';
?>

</body>
</html>

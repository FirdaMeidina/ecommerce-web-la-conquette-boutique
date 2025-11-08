<?php 

include 'header.php';
// pesanan baru 
$result1 = mysqli_query($conn, "SELECT distinct invoice FROM produksi WHERE terima = 0 and tolak = 0");
$jml1 = mysqli_num_rows($result1);

// pesanan dibatalkan/ditolak
$result2 = mysqli_query($conn, "SELECT distinct invoice FROM produksi WHERE  tolak = 1");
$jml2 = mysqli_num_rows($result2);

// pesanan diterima
$result3 = mysqli_query($conn, "SELECT distinct invoice FROM produksi WHERE  terima = 1");
$jml3 = mysqli_num_rows($result3);

?>
<style>
    .stats-box {
        padding-bottom: 60px;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 10px;
        border-radius: 10px;
        text-align: center;
        color: #fff;
        transition: all 0.3s ease-in-out;
    }

    .stats-box:hover {
        transform: translateY(-5px);
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div style="background-color:rgb(255, 100, 152);" class="stats-box">
                <h4>PESANAN BARU</h4>
                <h4 style="font-size: 56pt;"><b><?= $jml1; ?></b></h4>
            </div>
        </div>

        <div class="col-md-4">
            <div style="background-color:rgb(255, 81, 81);" class="stats-box">
                <h4>PESANAN DIBATALKAN</h4>
                <h4 style="font-size: 56pt;"><b><?= $jml2; ?></b></h4>
            </div>
        </div>

        <div class="col-md-4">
            <div style="background-color:rgb(81, 162, 255);" class="stats-box">
                <h4>PESANAN DITERIMA</h4>
                <h4 style="font-size: 56pt;"><b><?= $jml3; ?></b></h4>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>

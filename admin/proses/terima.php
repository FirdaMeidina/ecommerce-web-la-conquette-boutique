<?php 
include '../../koneksi/koneksi.php';
$inv = $_GET['inv'];

$result = mysqli_query($conn, "SELECT * FROM produksi WHERE invoice = '$inv'");

// Periksa apakah invoice yang diterima adalah pesanan yang valid
if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $kodep = $row['kode_produk'];

    // Perbarui status pesanan menjadi 'terima' dan 'status' menjadi '0'
    mysqli_query($conn, "UPDATE produksi SET terima = '1', status = '0' WHERE invoice = '$inv'");

    // Kembalikan pesan sukses
    echo "
    <script>
    alert('PESANAN BERHASIL DITERIMA');
    window.location = '../produksi.php';
    </script>
    ";
} else {
    // Jika tidak ada pesanan yang sesuai dengan invoice yang diberikan, berikan pesan kesalahan
    echo "
    <script>
    alert('Tidak ada pesanan yang sesuai dengan invoice tersebut');
    window.location = '../produksi.php';
    </script>
    ";
}
?>

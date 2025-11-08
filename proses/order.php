<?php 
include '../koneksi/koneksi.php';

$kd_cs = $_POST['kode_cs'];
$nama = $_POST['nama'];
$prov = $_POST['prov'];
$kota = $_POST['kota'];
$alamat = $_POST['almt'];
$kopos = $_POST['kopos'];
$tanggal = date('Y-m-d');
$catatan = $_POST['catatan']; // Ambil catatan dari form

// Generate new invoice number
$kode = mysqli_query($conn, "SELECT invoice FROM produksi ORDER BY invoice DESC");
$data = mysqli_fetch_assoc($kode);
$num = substr($data['invoice'], 3, 4);
$add = (int) $num + 1;
if(strlen($add) == 1){
    $format = "INV000".$add;
} else if(strlen($add) == 2){
    $format = "INV00".$add;
} else if(strlen($add) == 3){
    $format = "INV0".$add;
} else {
    $format = "INV".$add;
}

// Get items from cart
$keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kd_cs'");

while($row = mysqli_fetch_assoc($keranjang)){
    $kd_produk = $row['kode_produk'];
    $nama_produk = $row['nama_produk'];
    $qty = $row['qty'];
    $harga = $row['harga'];
    $size = $row['size'];  // Ambil size dari keranjang
    $status = "Pesanan Baru";

    // Insert order into produksi table
    $order = mysqli_query($conn, "INSERT INTO produksi (invoice, kode_customer, kode_produk, nama_produk, qty, harga, size, status, tanggal, provinsi, kota, alamat, kode_pos, terima, tolak, cek, catatan) VALUES ('$format', '$kd_cs', '$kd_produk', '$nama_produk', '$qty', '$harga', '$size', '$status', '$tanggal', '$prov', '$kota', '$alamat', '$kopos', '0', '0', '0', '$catatan')");
}

// Clear cart
$del_keranjang = mysqli_query($conn,"DELETE FROM keranjang WHERE kode_customer = '$kd_cs'");

if($del_keranjang){
    header("location:../selesai.php");
}
?>

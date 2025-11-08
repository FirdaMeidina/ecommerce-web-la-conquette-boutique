<?php
include '../../koneksi/koneksi.php';

// Mengamankan input untuk mencegah injeksi SQL
$kode = mysqli_real_escape_string($conn, $_GET['kode']);

// Menghapus gambar terkait jika ada
$produk = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk ='$kode'");
if(mysqli_num_rows($produk) > 0) {
    $row = mysqli_fetch_assoc($produk);
    if(!empty($row['image'])) {
        $gambarPath = "../../image/produk/".$row['image'];
        if(file_exists($gambarPath)) {
            unlink($gambarPath);
        }
    }

    // Menghapus produk dari database
    $del = mysqli_query($conn, "DELETE FROM produk WHERE kode_produk = '$kode'");
    
    if($del) {
        // Jika produk berhasil dihapus, alihkan ke halaman m_produk.php
        header("Location: ../m_produk.php");
        exit();
    } else {
        // Jika terjadi kesalahan saat menghapus produk, tampilkan pesan kesalahan
        echo "<script>alert('Gagal menghapus data.');</script>";
        header("Location: ../m_produk.php");
        exit();
    }
} else {
    // Jika produk tidak ditemukan, tampilkan pesan kesalahan
    echo "<script>alert('Produk tidak ditemukan.');</script>";
    header("Location: ../m_produk.php");
    exit();
}
?>

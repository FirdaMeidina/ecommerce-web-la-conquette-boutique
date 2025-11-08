<?php 
session_start();
include '../../koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Persiapkan dan bind
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah user ada
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            $_SESSION["admin"] = true;
            header('Location: ../halaman_utama.php');
            exit();
        } else {
            echo "
            <script>
            alert('USERNAME/PASSWORD SALAH');
            window.location = '../index.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('USERNAME/PASSWORD SALAH');
        window.location = '../index.php';
        </script>
        ";
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>

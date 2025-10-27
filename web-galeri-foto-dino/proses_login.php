<?php
session_start();
include("koneksi.php");

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $_SESSION['username'] = $username;

    // Arahkan user berdasarkan username
    if ($username === 'admin') {
        header("Location: admin/admin.php");
    } elseif ($username === 'operator') {
        header("Location: operator/operator.php");
    } elseif ($username === 'guest') {
        header("Location: guest/guest.php");
    } else {
        header("Location: welcome.php");
    } 
    exit();
} else {
    echo "Login gagal. <a href='index.php'>Coba lagi</a>";
}

$conn->close();
?>

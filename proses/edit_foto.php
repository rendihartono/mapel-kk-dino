<?php
session_start();
include '../koneksi.php';

if (isset($_POST['update'])) {
    // Ambil data dari form
    $id_foto        = intval($_POST['id_foto']);
    $judul_foto     = mysqli_real_escape_string($conn, $_POST['judul_foto']);
    $lokasi_foto    = mysqli_real_escape_string($conn, $_POST['lokasi_foto']);
    $deskripsi_foto = mysqli_real_escape_string($conn, $_POST['deskripsi_foto']);
    $tanggal_update = date('Y-m-d');

    // Ambil data lama dari database
    $query_lama = mysqli_query($conn, "SELECT lokasi_file FROM foto WHERE id_foto = $id_foto");
    $data_lama  = mysqli_fetch_assoc($query_lama);
    $file_lama  = $data_lama['lokasi_file'];

    // Jika user mengganti foto baru
    if (!empty($_FILES['lokasi_file']['name'])) {
        $nama_file = $_FILES['lokasi_file']['name'];
        $tmp_file  = $_FILES['lokasi_file']['tmp_name'];
        $ukuran    = $_FILES['lokasi_file']['size'];
        $ext       = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

        // Validasi format dan ukuran
        $allowed_ext = ['jpg', 'jpeg', 'png'];
        $max_size = 10 * 1024 * 1024; // 10 MB

        if (!in_array($ext, $allowed_ext)) {
            echo "<script>alert('Format file tidak didukung! Gunakan JPG, JPEG, atau PNG.'); history.back();</script>";
            exit;
        }

        if ($ukuran > $max_size) {
            echo "<script>alert('Ukuran file terlalu besar! Maksimal 10MB.'); history.back();</script>";
            exit;
        }

        // Buat nama unik dan simpan file baru
        $nama_baru = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '', $nama_file);
        $path_baru = "../img/" . $nama_baru;

        if (move_uploaded_file($tmp_file, $path_baru)) {
            // Hapus foto lama
            $path_lama = "../img/" . $file_lama;
            if (file_exists($path_lama)) {
                unlink($path_lama);
            }

            // Update semua data termasuk foto baru
            $update = mysqli_query($conn, "UPDATE foto SET
                lokasi_file    = '$nama_baru',
                judul_foto     = '$judul_foto',
                lokasi_foto    = '$lokasi_foto',
                deskripsi_foto = '$deskripsi_foto',
                tanggal_update = '$tanggal_update'
                WHERE id_foto = '$id_foto'");

            if ($update) {
                echo "<script>alert('Foto berhasil diperbarui dengan foto baru!'); window.location='../admin/d-admin.php';</script>";
            } else {
                echo "<script>alert('Gagal memperbarui data di database.'); history.back();</script>";
            }
        } else {
            echo "<script>alert('Gagal mengunggah file baru!'); history.back();</script>";
        }
    } else {
        // Tidak mengganti foto, hanya update data teks
        $update = mysqli_query($conn, "UPDATE foto SET
            judul_foto     = '$judul_foto',
            lokasi_foto    = '$lokasi_foto',
            deskripsi_foto = '$deskripsi_foto',
            tanggal_update = '$tanggal_update'
            WHERE id_foto = '$id_foto'");

        if ($update) {
            echo "<script>alert('Data foto berhasil diperbarui tanpa mengganti foto.'); window.location='../admin/d-admin.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data.'); history.back();</script>";
        }
    }
} else {
    header("Location: ../admin/d-admin.php");
    exit;
}
?>

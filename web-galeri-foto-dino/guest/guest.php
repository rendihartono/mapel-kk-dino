<?php
session_start();

// PROSES LOGOUT
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// PROSES LOGIN
$login_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy login: hanya admin/admin123 yang bisa masuk
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $login_error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Galeri Foto Pesona Kalimantan Utara</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .dashboard-container {
      padding: 20px;
    }
    .navbar-brand {
      font-weight: 700;
    }
    .gallery-container {
      padding: 20px 0;
    }
    .gallery-title {
      text-align: center;
      margin: 30px 0;
      color: #343a40;
    }
    .gallery-item {
      margin-bottom: 30px;
      overflow: hidden;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    .gallery-item:hover {
      transform: scale(1.03);
    }
    .gallery-item img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: opacity 0.3s ease;
    }
    .gallery-item:hover img {
      opacity: 0.9;
    }
    .image-caption {
      padding: 15px;
      background-color: white;
      text-align: center;
    }
    footer {
      background-color: #343a40;
      color: white;
      padding: 20px 0;
      margin-top: 40px;
    }
  </style>
</head>
<body>
  <!-- Dashboard Content (ditampilkan langsung, tanpa login) -->
  <div id="dashboardPage">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Galeri Foto</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Menu kiri -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
      </ul>

      <!-- Menu kanan -->
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-3 text-white">
          Selamat datang, guest
        </li>
        <li class="nav-item">
          <button class="btn btn-outline-light" id="logoutBtn">Logout</button>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <!-- Gallery Content -->
    <div class="container gallery-container">
      <h1 class="gallery-title">Galeri Pesona Kalimantan Utara</h1>
      <div class="row">
        <!-- Foto 1 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <!-- Catatan: ganti src dengan path gambar valid (URL atau path relatif) -->
            <img src="AirTerjunSianak.webp" class="img-fluid" alt="Pemandangan">
            <div class="image-caption">
              <h5>Air AirTerjunSianak</h5>
              <p class="text-muted">Pantai dengan pemandangan matahari terbenam</p>
             <button class="btn btn-primary text-white" id="lihatBtn">Lihat</button>
           </li>
            </div>
          </div>
        </div>
        <!-- Foto 2 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="pantai amal.jpg" class="img-fluid" alt="Gunung">
            <div class="image-caption">
              <h5>pantai amal</h5>
              <p class="text-muted">Pemandangan kawah aktif di pagi hari</p>
             <button class="btn btn-primary text-white" id="lihatBtn">Lihat</button>
           </li>
            </div>
          </div>
        </div>
        <!-- Foto 3 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="gunung rian.jpg" class="img-fluid" alt="Candi Borobudur">
            <div class="image-caption">
              <h5>Gunung Rian</h5>
              <p class="text-muted">Warisan budaya dunia dari Indonesia</p>              
             <button class="btn btn-primary text-white" id="lihatBtn">Lihat</button>
           </li>
            </div>
          </div>
        </div>
        <!-- Foto 4 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="mangkupadi.jpg" class="img-fluid" alt="Danau Toba">
            <div class="image-caption">
              <h5>mangkupadi</h5>
              <p class="text-muted">Danau vulkanik terbesar di dunia</p>
             <button class="btn btn-primary text-white" id="lihatBtn">Lihat</button>
           </li>
            </div>
          </div>
        </div>
        <!-- Foto 5 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="hutan pinus.jpg" class="img-fluid" alt="Pulau Komodo">
            <div class="image-caption">
              <h5>Hutan pinus</h5>
              <p class="text-muted">Habitat asli hewan komodo</p>
             <button class="btn btn-primary text-white" id="lihatBtn">Lihat</button>
           </li>
            </div>
          </div>
        </div>
        <!-- Foto 6 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="Tarakan.jpg" class="img-fluid" alt="Pura Lempuyang">
            <div class="image-caption">
              <h5>hutan mangrove</h5>
              <p class="text-muted">Tempat suci dengan pemandangan memukau</p>           
             <button class="btn btn-primary text-white" id="lihatBtn">Lihat</button>
           </li>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <p>© 2025 Rendi hartono. All Rights Reserved.</p>
      </div>
    </footer>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Logout: reload halaman (sebagai simulasi logout)
    document.getElementById('logoutBtn').addEventListener('click', function() {
      if (confirm('Apakah Anda yakin ingin logout?')) {
        window.location.reload();
      }
    });
  </script>
</body>
</html>
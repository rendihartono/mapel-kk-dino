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
          Selamat datang, admin
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
             <button class="btn btn-primary text-white" onclick="lihatGambar('AirTerjunSianak.webp')">Lihat</button>
             <button class="btn btn-success btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
             <button class="btn btn-warning text-white btn-edit">Edit</button>
             <button class="btn btn-dark text-white" id="lihatBtn">Hapus</button>
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
             <button class="btn btn-primary text-white" onclick="lihatGambar('pantai amal.jpg')">Lihat</button>
             <button class="btn btn-success btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
             <button class="btn btn-warning text-white btn-edit">Edit</button>
             <button class="btn btn-dark text-white" id="lihatBtn">Hapus</button>
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
             <button class="btn btn-primary text-white" onclick="lihatGambar('gunung rian.jpg')">Lihat</button>
             <button class="btn btn-success btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
             <button class="btn btn-warning text-white btn-edit">Edit</button>
             <button class="btn btn-dark text-white" id="lihatBtn">Hapus</button>
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
             <button class="btn btn-primary text-white" onclick="lihatGambar('mangkupadi.jpg')">Lihat</button>
             <button class="btn btn-success btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
            <button class="btn btn-warning text-white btn-edit">Edit</button>
             <button class="btn btn-dark text-white" id="lihatBtn">Hapus</button>
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
             <button class="btn btn-primary text-white" onclick="lihatGambar('hutan pinus.jpg')">Lihat</button>
             <button class="btn btn-success btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
             <button class="btn btn-warning text-white btn-edit">Edit</button>
             <button class="btn btn-dark text-white" id="lihatBtn">Hapus</button>
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
              <button class="btn btn-primary text-white" onclick="lihatGambar('Tarakan.jpg')">Lihat</button>          
             <button class="btn btn-success btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
             <button class="btn btn-warning text-white btn-edit">Edit</button>
              <button class="btn btn-dark text-white btn-hapus">Hapus</button>
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

<!-- MODAL TAMBAH / EDIT FOTO -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="formTambahFoto">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahLabel">Tambahkan Foto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="editMode" value="false">
          <input type="hidden" id="editTargetIndex" value="">

          <div class="mb-3">
            <label class="form-label">Judul Foto:</label>
            <input type="text" name="judul_foto" id="judul_foto" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi Foto:</label>
            <textarea name="deskripsi_foto" id="deskripsi_foto" class="form-control" rows="2" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Upload Foto:</label>
            <input type="file" name="lokasi_file" id="lokasi_file" class="form-control" accept=".png, .jpg, .jpeg">
            <small class="text-muted">Ukuran gambar maksimal 10MB (.png, .jpg, .jpeg)</small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="submitBtn">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  let editingCard = null; // elemen yang sedang diedit

  // Fungsi untuk menampilkan gambar di popup
  function lihatGambar(src) {
    let popup = window.open("", "Foto", "width=800,height=600");
    popup.document.write(`<title>Foto</title><img src='${src}' style='width:100%; height:auto;'>`);
  }

  // Tambah / Edit foto
  document.getElementById('formTambahFoto').addEventListener('submit', function(e) {
    e.preventDefault();

    const judul = document.getElementById('judul_foto').value;
    const deskripsi = document.getElementById('deskripsi_foto').value;
    const fileInput = document.getElementById('lokasi_file');
    const editMode = document.getElementById('editMode').value === 'true';

    // Kalau sedang edit
    if (editMode && editingCard) {
      const imgElement = editingCard.querySelector('img');
      const judulEl = editingCard.querySelector('h5');
      const descEl = editingCard.querySelector('p');

      judulEl.textContent = judul;
      descEl.textContent = deskripsi;

      if (fileInput.files.length > 0) {
        const reader = new FileReader();
        reader.onload = function(ev) {
          imgElement.src = ev.target.result;
        };
        reader.readAsDataURL(fileInput.files[0]);
      }

      // reset mode edit
      editingCard = null;
      document.getElementById('editMode').value = 'false';
      document.getElementById('modalTambahLabel').textContent = 'Tambahkan Foto';
      document.getElementById('submitBtn').textContent = 'Tambah';
    } 
    else {
      // Mode tambah baru
      if (!fileInput.files[0]) {
        alert("Silakan pilih file gambar.");
        return;
      }

      const reader = new FileReader();
      reader.onload = function(ev) {
        const fileURL = ev.target.result;

        const galleryRow = document.querySelector('.gallery-container .row');
        const col = document.createElement('div');
        col.className = 'col-md-4 col-sm-6 col-12';
        col.innerHTML = `
          <div class="gallery-item">
            <img src="${fileURL}" class="img-fluid" alt="${judul}">
            <div class="image-caption">
              <h5>${judul}</h5>
              <p class="text-muted">${deskripsi}</p>
              <button class="btn btn-primary text-white" onclick="lihatGambar('${fileURL}')">Lihat</button>
              <button class="btn btn-success btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
              <button class="btn btn-warning text-white btn-edit">Edit</button>
              <button class="btn btn-dark text-white btn-hapus">Hapus</button>
            </div>
          </div>
        `;
        galleryRow.appendChild(col);
      };
      reader.readAsDataURL(fileInput.files[0]);
    }

    // Tutup modal & reset form
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalTambah'));
    modal.hide();
    this.reset();
  });

  // Event delegation untuk tombol Edit / Hapus
  document.querySelector('.gallery-container .row').addEventListener('click', function(e) {
    if (e.target.classList.contains('btn-hapus')) {
      if (confirm('Yakin ingin menghapus gambar ini?')) {
        e.target.closest('.col-md-4').remove();
      }
    }

    if (e.target.classList.contains('btn-edit')) {
      const card = e.target.closest('.gallery-item');
      const imgSrc = card.querySelector('img').src;
      const judul = card.querySelector('h5').textContent;
      const deskripsi = card.querySelector('p').textContent;

      editingCard = card;
      document.getElementById('judul_foto').value = judul;
      document.getElementById('deskripsi_foto').value = deskripsi;

      // ubah mode modal jadi edit
      document.getElementById('editMode').value = 'true';
      document.getElementById('modalTambahLabel').textContent = 'Edit Foto';
      document.getElementById('submitBtn').textContent = 'Simpan Perubahan';

      // tampilkan modal
      const modal = new bootstrap.Modal(document.getElementById('modalTambah'));
      modal.show();
    }
  });

  // Tombol Logout
  document.getElementById('logoutBtn').addEventListener('click', function() {
    if (confirm('Apakah Anda yakin ingin logout?')) {
      window.location.reload();
    }
  });
</script>

    <!-- Script tombol Lihat -->
  <script>
  function lihatGambar(src) {
    let popup = window.open("", "Foto", "width=800,height=600");
    popup.document.write(`<title>Foto</title><img src='${src}' style='width:100%; height:auto;'>`);
  }
// Tombol Hapus
    document.querySelectorAll('.btn-dark').forEach(button => {
      button.onclick = function() {
        if (confirm("Yakin ingin menghapus gambar ini?")) {
          this.closest('.col-md-4').remove();
        }
      };
    });

// Logout: reload halaman (simulasi logout)
  document.getElementById('logoutBtn').addEventListener('click', function() {
    if (confirm('Apakah Anda yakin ingin logout?')) {
      window.location.reload();
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
include 'config.php';
if (!isset($_SESSION['login_user'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Kalibrasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-dark text-light">
<div class="container mt-5">
  <h3 class="mb-4 text-success">Tambah Data Kalibrasi</h3>
  <form action="" method="POST">
    <div class="mb-3">
      <label class="text-light">Nama Alat</label>
      <input type="text" name="nama_alat" class="form-control bg-dark text-light border-success" required>
    </div>
    <div class="mb-3">
      <label class="text-light">No Seri</label>
      <input type="text" name="no_seri" class="form-control bg-dark text-light border-success" required>
    </div>
    <div class="mb-3">
      <label class="text-light">Tanggal Kalibrasi</label>
      <input type="date" name="tanggal_kalibrasi" class="form-control bg-dark text-light border-success" required>
    </div>
    <div class="mb-3">
      <label class="text-light">Teknisi</label>
      <input type="text" name="teknisi" class="form-control bg-dark text-light border-success" required>
    </div>
    <div class="mb-3">
      <label class="text-light">Status</label>
      <select name="status" class="form-select bg-dark text-light border-success">
        <option value="Terkalibrasi">Terkalibrasi</option>
        <option value="Proses">Proses</option>
        <option value="Belum">Belum</option>
      </select>
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
  </form>

  <?php
  if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_alat'];
    $seri = $_POST['no_seri'];
    $tgl = $_POST['tanggal_kalibrasi'];
    $teknisi = $_POST['teknisi'];
    $status = $_POST['status'];

    $sql = "INSERT INTO alat (nama_alat, no_seri, tanggal_kalibrasi, teknisi, status)
            VALUES ('$nama', '$seri', '$tgl', '$teknisi', '$status')";

    if ($conn->query($sql)) {
      echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
      echo "Error: " . $conn->error;
    }
  }
  ?>
</div>
</body>
</html>
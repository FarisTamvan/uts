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
  <title>Data Kalibrasi Alat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-dark text-light">
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-success">📏 Data Kalibrasi Alat</h2>
    <div>
      <span class="me-3 text-light">👤 <?= $_SESSION['login_user']; ?></span>
      <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>
  </div>

  <a href="add.php" class="btn btn-success mb-3">+ Tambah Data</a>

  <table class="table table-dark table-striped table-hover">
    <thead class="table-success">
      <tr>
        <th class="bg-success text-dark">ID</th>
        <th class="bg-success text-dark">Nama Alat</th>
        <th class="bg-success text-dark">No Seri</th>
        <th class="bg-success text-dark">Tanggal Kalibrasi</th>
        <th class="bg-success text-dark">Teknisi</th>
        <th class="bg-success text-dark">Status</th>
        <th class="bg-success text-dark">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM alat ORDER BY id DESC");
      while ($row = $result->fetch_assoc()):
      ?>
      <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama_alat']; ?></td>
        <td><?= $row['no_seri']; ?></td>
        <td><?= $row['tanggal_kalibrasi']; ?></td>
        <td><?= $row['teknisi']; ?></td>
        <td>
          <?php
          $badge_class = '';
          if ($row['status'] == 'Terkalibrasi') {
            $badge_class = 'bg-success';
          } elseif ($row['status'] == 'Proses') {
            $badge_class = 'bg-warning text-dark';
          } else {
            $badge_class = 'bg-danger';
          }
          ?>
          <span class="badge <?= $badge_class; ?>"><?= $row['status']; ?></span>
        </td>
        <td>
          <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-outline-warning btn-sm">Edit</a>
          <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
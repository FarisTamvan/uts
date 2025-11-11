<<<<<<< HEAD
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
=======
<?php
require 'config.php';
$result = $mysqli->query("SELECT * FROM devices ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Calibration Management</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-4">
  <h2 class="mb-4">📋 Device Management</h2>
  <a href="add_device.php" class="btn btn-primary mb-3">+ Add Device</a>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th><th>Name</th><th>Serial</th><th>Model</th><th>Manufacturer</th><th>Status</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= h($row['name']) ?></td>
        <td><?= h($row['serial']) ?></td>
        <td><?= h($row['model']) ?></td>
        <td><?= h($row['manufacturer']) ?></td>
        <td><?= h($row['status']) ?></td>
        <td>
          <a href="edit_device.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="delete_device.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this device?')">Delete</a>
          <a href="view_calibration.php?device_id=<?= $row['id'] ?>" class="btn btn-sm btn-info">Calibration</a>
>>>>>>> 78e431e (uts)
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 78e431e (uts)

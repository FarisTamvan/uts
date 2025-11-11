<?php 
include 'config.php';
if (!isset($_SESSION['login_user'])) {
  header("Location: login.php");
  exit;
}
?>

<?php
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM alat WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Kalibrasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-dark text-light">
<div class="container mt-5">
  <h3 class="mb-4 text-success">Edit Data Kalibrasi</h3>
  <form action="" method="POST">
    <div class="mb-3">
      <label class="text-light">Nama Alat</label>
      <input type="text" name="nama_alat" value="<?= $data['nama_alat']; ?>" class="form-control bg-dark text-light border-success" required>
    </div>
    <div class="mb-3">
      <label class="text-light">No Seri</label>
      <input type="text" name="no_seri" value="<?= $data['no_seri']; ?>" class="form-control bg-dark text-light border-success" required>
    </div>
    <div class="mb-3">
      <label class="text-light">Tanggal Kalibrasi</label>
      <input type="date" name="tanggal_kalibrasi" value="<?= $data['tanggal_kalibrasi']; ?>" class="form-control bg-dark text-light border-success" required>
    </div>
    <div class="mb-3">
      <label class="text-light">Teknisi</label>
      <input type="text" name="teknisi" value="<?= $data['teknisi']; ?>" class="form-control bg-dark text-light border-success" required>
    </div>
    <div class="mb-3">
      <label class="text-light">Status</label>
      <select name="status" class="form-select bg-dark text-light border-success">
        <option <?= $data['status']=='Terkalibrasi'?'selected':''; ?>>Terkalibrasi</option>
        <option <?= $data['status']=='Proses'?'selected':''; ?>>Proses</option>
        <option <?= $data['status']=='Belum'?'selected':''; ?>>Belum</option>
      </select>
    </div>
    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
  </form>

  <?php
  if (isset($_POST['update'])) {
    $nama = $_POST['nama_alat'];
    $seri = $_POST['no_seri'];
    $tgl = $_POST['tanggal_kalibrasi'];
    $teknisi = $_POST['teknisi'];
    $status = $_POST['status'];

    $sql = "UPDATE alat SET 
      nama_alat='$nama',
      no_seri='$seri',
      tanggal_kalibrasi='$tgl',
      teknisi='$teknisi',
      status='$status'
      WHERE id=$id";

    if ($conn->query($sql)) {
      echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
      echo "Error: " . $conn->error;
    }
  }
  ?>
</div>
</body>
</html>
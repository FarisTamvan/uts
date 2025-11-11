<?php
require 'config.php';
$device_id = $_GET['device_id'];
$device = $mysqli->query("SELECT * FROM devices WHERE id=$device_id")->fetch_assoc();
$result = $mysqli->query("SELECT * FROM calibrations WHERE device_id=$device_id ORDER BY calibrated_on DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Calibration Records</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-4">
  <h3>Calibration Records for <?= h($device['name']) ?></h3>
  <a href="add_calibration.php?device_id=<?= $device_id ?>" class="btn btn-success mb-3">+ Add Calibration</a>
  <a href="index.php" class="btn btn-secondary mb-3">Back</a>
  <table class="table table-striped">
    <thead class="table-dark">
      <tr>
        <th>Date</th><th>Next Due</th><th>Technician</th><th>Result</th><th>Notes</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= h($row['calibrated_on']) ?></td>
        <td><?= h($row['next_due']) ?></td>
        <td><?= h($row['technician']) ?></td>
        <td><?= h($row['result']) ?></td>
        <td><?= h($row['notes']) ?></td>
        <td>
          <a href="delete_calibration.php?id=<?= $row['id'] ?>&device_id=<?= $device_id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this calibration?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>

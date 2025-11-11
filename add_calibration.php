<?php
require 'config.php';
$device_id = $_GET['device_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $mysqli->prepare("INSERT INTO calibrations (device_id, calibrated_on, next_due, technician, result, notes)
    VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("isssss", $device_id, $_POST['calibrated_on'], $_POST['next_due'],
    $_POST['technician'], $_POST['result'], $_POST['notes']);
  $stmt->execute();
  header("Location: view_calibration.php?device_id=$device_id");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Calibration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-4">
  <h3>Add Calibration Record</h3>
  <form method="POST">
    <input type="date" name="calibrated_on" class="form-control mb-2" required>
    <input type="date" name="next_due" class="form-control mb-2">
    <input type="text" name="technician" class="form-control mb-2" placeholder="Technician Name">
    <input type="text" name="result" class="form-control mb-2" placeholder="Result (Pass/Fail)">
    <textarea name="notes" class="form-control mb-2" placeholder="Notes"></textarea>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="view_calibration.php?device_id=<?= $device_id ?>" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>

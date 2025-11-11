<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $mysqli->prepare("INSERT INTO devices (name, serial, model, manufacturer, location, purchase_date, status, notes)
    VALUES (?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssss", $_POST['name'], $_POST['serial'], $_POST['model'], $_POST['manufacturer'],
    $_POST['location'], $_POST['purchase_date'], $_POST['status'], $_POST['notes']);
  $stmt->execute();
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Device</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-4">
  <h3>Add Device</h3>
  <form method="POST">
    <input type="text" name="name" class="form-control mb-2" placeholder="Device Name" required>
    <input type="text" name="serial" class="form-control mb-2" placeholder="Serial Number" required>
    <input type="text" name="model" class="form-control mb-2" placeholder="Model">
    <input type="text" name="manufacturer" class="form-control mb-2" placeholder="Manufacturer">
    <input type="text" name="location" class="form-control mb-2" placeholder="Location">
    <input type="date" name="purchase_date" class="form-control mb-2">
    <select name="status" class="form-select mb-2">
      <option>Active</option>
      <option>Inactive</option>
      <option>Retired</option>
    </select>
    <textarea name="notes" class="form-control mb-2" placeholder="Notes"></textarea>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>

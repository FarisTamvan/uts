<?php
require 'config.php';
$id = $_GET['id'];
$device_id = $_GET['device_id'];
$mysqli->query("DELETE FROM calibrations WHERE id=$id");
header("Location: view_calibration.php?device_id=$device_id");
exit;
?>

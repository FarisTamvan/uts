<?php
require 'config.php';
$id = $_GET['id'];
$mysqli->query("DELETE FROM devices WHERE id=$id");
header("Location: index.php");
exit;
?>

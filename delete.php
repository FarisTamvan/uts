<?php
include 'config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM alat WHERE id=$id");
header("Location: index.php");
?>

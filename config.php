<?php
<<<<<<< HEAD
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_kalibrasi";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
session_start();
?>
=======
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'cal_db';


$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
die('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');


function h($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>
>>>>>>> 78e431e (uts)

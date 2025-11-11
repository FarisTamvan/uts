<?php
include 'config.php';
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

  if ($result->num_rows > 0) {
    $_SESSION['login_user'] = $username;
    header("Location: index.php");
  } else {
    echo "<script>alert('Username atau password salah!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Sistem Kalibrasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100">
  <div class="card bg-dark border-success shadow p-4" style="width: 350px;">
    <h3 class="text-center mb-4 text-success">Login Kalibrasi</h3>
    <form method="POST">
      <div class="mb-3">
        <label class="text-light">Username</label>
        <input type="text" name="username" class="form-control bg-dark text-light border-success" required>
      </div>
      <div class="mb-3">
        <label class="text-light">Password</label>
        <input type="password" name="password" class="form-control bg-dark text-light border-success" required>
      </div>
      <button type="submit" name="login" class="btn btn-success w-100">Masuk</button>
    </form>
  </div>
</body>
</html>
<?php 
include"config/koneksi.php";
session_start();

if (isset($_POST['login'])){

$username = $_POST['username'];
$password = md5($_POST['password']);

$q2 = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$r2 = mysqli_query($conn, $q2);
$d2 = mysqli_fetch_array($r2);

if (mysqli_num_rows($r2) > 0){
  $_SESSION['nama_admin'] = $d2['nama_admin'];
  $_SESSION['id_admin'] = $d2['id_admin'];
  echo "
  <script>
  alert('Anda Berhasil Login');
  window.location = 'karyawan/index.php';
  </script>
  ";
}else{
  echo "
  <script>
  alert('Anda Gagal Login');
  window.location = 'index.php';
  </script>
  ";
  }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      margin-top: 100px;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.2);
    }
    .card-header {
      background-color: #007bff;
      color: #fff;
      border-radius: 15px 15px 0 0;
    }
    .card-body {
      padding: 30px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-control {
      border-radius: 10px;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      border-radius: 10px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    img.logo {
      display: block;
      margin: auto;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 login-container">
        <div class="card">
          <div class="card-header text-center">
            <img src="logo.png" alt="Logo" width="100" class="logo">
            <h4>Selamat Datang!</h4>
          </div>
          <div class="card-body">
            <form action="#" method="POST">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
              </div>
              <button type="submit" name="login" value="login" class="btn btn-primary btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>



<?php
session_start();

include "../../assets/function.php";
$air = new air;
$db = $air->connect();

if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $qc = mysqli_query($db, "SELECT username,pass FROM user WHERE username = '$username'");
  $dc = mysqli_fetch_row($qc);
  if (!empty($dc[0])) $userCek = $dc[0];
  if (!empty($userCek)) {
    $passCheck = $dc[1];
    if (password_verify($password, $passCheck)) {

      $_SESSION["username"] = $username;
      $_SESSION["password"] = $password;
      echo "<script> window.location.replace('./login./index.php') </script>";
    }
    echo "<script> alert('login salah') </script>";
  }
  echo "<script> alert('username tidak ditemukan') </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="../../css/styles.css" rel="stylesheet" />
  <title>Login</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar w-100 navbar-expand-lg border-1 border-bottom ">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Air</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Container -->
  <div class="oContainer w-100  d-flex justify-content-center align-items-center">
    <div class="container d-flex justify-content-center align-items-center p-0 w-100 h-100">
      <!-- Login Container -->
      <div class="login-container  row align-items-center border bg-white shadow p-0 box-area mt-5 align-self-md-center">
        <!-- Left Container -->
        <div class="w-50 col-md-6 d-flex align-items-center left-box p-0 m-0">
          <div>
            <img src="../../images/dive.jpg" class="img-fluid" />
          </div>
        </div>
        <!-- Right Box -->
        <div class="col-md-6 right-box p-4 m-0">
          <div class="row align-items-center">
            <div class="header-text d-flex flex-column mb-4 justify-content-center">
              <hr class="align-self-center">
              <h2 class="fw-bold align-self-center">Login</h2>

            </div>
            <form method="post" class="needs-validation">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="input-group mb-5 d-flex justify-content-between">
                <div>
                  <input type="checkbox" class="rememberCheck" id="formCheck" />
                  <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                </div>
                <div class="forgot">
                  <small><a href="#">Forgot Password?</a></small>
                </div>
              </div>
              <div class="input-group mb-3">
                <button class="btn btn-lg btn-dark w-100 fs-6" type="submit" name="submit">Login</button>
              </div>
            </form>
            <div class="input-group mb-3"></div>
            <div class="row">
              <small>Don't have account? <a href="#">Sign Up</a></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
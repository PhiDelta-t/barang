<?php
session_start();
if (isset($_SESSION['nama_admin'])) {
  header("location:dashboard.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Toko Maju Mundur</title>
  <link rel="stylesheet" href="assets/css/main/app.css" />
  <link rel="stylesheet" href="assets/css/pages/auth.css" />

  <link rel="shortcut icon" href="bootstrap-icons/icons/archive.svg" type="image/x-icon" />
</head>

<body>
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
          </div>
          <h1 class="auth-title">Log in.</h1>

          <form action="login.php" method="POST">
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" class="form-control form-control-xl" name="username" placeholder="Username" />
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" />
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
              Log in
            </button>
          </form>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"></div>
      </div>
    </div>
  </div>
</body>

</html>
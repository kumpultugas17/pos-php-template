<?php
require 'config/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1><b>Log</b>in</h1>
      </div>
      <div class="card-body">
        <?= isset($_GET['email']) == 'gagal' ? "<div class='alert alert-danger'>E-Mail tidak sesuai!</div>" : ''; ?>
        <?= isset($_GET['password']) == 'gagal' ? "<div class='alert alert-danger'>Password tidak sesuai!</div>" : ''; ?>
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4 mt-2 mb-3">
              <button type="submit" name="btn_login" class="btn btn-primary btn-block btn-sm">Sign In</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['btn_login'])) {
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];

  $sql = $conn->query("SELECT email, password, name, role_code, avatar FROM users WHERE email='$email'");
  $result = mysqli_fetch_assoc($sql);

  $check = isset($_POST['remember']) ? $_POST['remember'] : '';

  if ($result) {
    if (password_verify($password, $result['password'])) {
      session_start();
      $_SESSION['name'] = $result['name'];
      $_SESSION['role_code'] = $result['role_code'];
      $_SESSION['avatar'] = $result['avatar'];
      if ($check) {
           setcookie("remember", password_hash($result['role_code'], PASSWORD_DEFAULT), time() + 3600);
      }
      header('Location:index.php');
    } else {
      header('Location:login.php?password=gagal');
    }
  } else {
    header('Location:login.php?email=gagal');
  }
}
?>
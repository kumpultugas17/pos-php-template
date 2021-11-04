<?php
session_start();
require 'config/function.php';
if (isset($_COOKIE['remember'])) {
  $sql = $conn->query("SELECT * FROM users");
  $result = mysqli_fetch_assoc($sql);
  $role_code = $result['role_code'];
  if (password_verify($role_code, $_COOKIE['remember'])) {
    $_SESSION['name'] = $result['name'];
    $_SESSION['role_code'] = $result['role_code'];
  }
}

if (!isset($_SESSION['name'])) {
  header('location:login.php');
}

require 'partials/_header.php';
require 'partials/_sidebar.php';
if (!empty($_GET['page'])) {
  require 'pages/' . $_GET['page'] . '/index.php';
} else {
  require 'pages/dashboard/index.php';
}
require 'partials/_footer.php';
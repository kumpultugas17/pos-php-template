<?php
// Category
if (isset($_POST['btn_category'])) {
  if (store_category($_POST) > 0) {
    $pesan = "<div class='alert alert-success'>Berhasil menambahkan data!</div>";
  } else {
    $pesan = "<div class='alert alert-danger'>Gagal menambahkan data!</div>";
  }
}

if (isset($_POST['btn_update_category'])) {
  if (update_category($_POST) > 0) {
    $pesan = "<div class='alert alert-success'>Berhasil merubah data!</div>";
  } else {
    $pesan = "<div class='alert alert-danger'>Gagal merubah data!</div>";
  }
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  if (destroy_category($id)) {
    $pesan = "<div class='alert alert-success'>Berhasil menghapus data!</div>";
    header('location:index.php?page=categories');
  } else {
    $pesan = "<div class='alert alert-danger'>Gagal menghapus data!</div>";
    header('location:index.php?page=categories');
  }
}

// Product
if (isset($_POST['btn_product'])) {
  if (store_product($_POST) > 0) {
    $pesan = "<div class='alert alert-success'>Berhasil menambahkan data!</div>";
  } else {
    $pesan = "<div class='alert alert-danger'>Gagal menambahkan data!</div>";
  }
}

// Register
if (isset($_POST['btn_register'])) {
  $password = $_REQUEST['password'];
  $confirm = $_REQUEST['confirm'];
  if ($password != $confirm) {
    header('location:index.php?page=register&confirm');
  } else {
    if (store_users($_POST) > 0) {
      $pesan = "<div class='alert alert-success'>Berhasil menambahkan akun baru!</div>";
    } else {
      $pesan = "<div class='alert alert-danger'>Gagal menambahkan akun!</div>";
    }
  }
}

if (isset($_POST['btn_update_user'])) {
  if (update_user($_POST) > 0) {
    $pesan = "<div class='alert alert-success'>Berhasil merubah akun!</div>";
  } else {
    $pesan = "<div class='alert alert-danger'>Gagal merubah akun!</div>";
  }
}
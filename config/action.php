<?php
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
    header('location:index.php?page=categories&');
  }
}

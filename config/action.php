<?php
if (isset($_POST['btn_category'])) {
  if (store_category($_POST) > 0) {
    $pesan = "<div class='alert alert-success'>Berhasil menambahkan data!</div>";
  } else {
    $pesan = "<div class='alert alert-danger'>Gagal menambahkan data!</div>";
  }
}
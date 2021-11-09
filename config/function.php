<?php
require 'connection.php';
require 'action.php';

// Query data
function query($query)
{
  global $conn;
  $result = $conn->query($query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// Category
function store_category($data)
{
  global $conn;
  $name = htmlspecialchars($data['category']);
  $date = date('Y-m-d H:i:s');

  $sql = $conn->query("INSERT INTO categories (name, created_at) VALUES ('$name','$date')");

  return mysqli_affected_rows($conn);
}

function update_category($data)
{
  global $conn;
  $id = $_REQUEST['id_category'];
  $name = htmlspecialchars($data['update_category']);
  $date = date('Y-m-d');

  $sql = $conn->query("UPDATE categories SET name='$name', updated_at = '$date' WHERE id='$id'");

  return mysqli_affected_rows($conn);
}

function destroy_category($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM categories WHERE id=$id");
  return mysqli_affected_rows($conn);
}

// Product
function store_product($data)
{
  global $conn;
  $name = htmlspecialchars($data['product_name']);
  $category = htmlspecialchars($data['category']);
  $merk = htmlspecialchars($data['merk']);
  $price = htmlspecialchars($data['price']);
  $stock = htmlspecialchars($data['stock']);
  $date = date('Y-m-d H:i:s');

  $sql = $conn->query("INSERT INTO products (product_name, id_category, merk, price, stock,created_at) VALUES ('$name','$category','$merk','$price','$stock','$date')");

  return mysqli_affected_rows($conn);
}

// Register
function store_users($data) {
  global $conn;
  $email = htmlspecialchars($data['email']);
  $name = htmlspecialchars($data['name']);
  $role_code = htmlspecialchars($data['role']);
  $password = password_hash(htmlspecialchars($data['password']), PASSWORD_DEFAULT);
  $date = date('Y-m-d H:i:s');

  // upload avatar
  $avatar = upload_avatar();

  $sql = $conn->query("INSERT INTO users (email, name, password, avatar, role_code, created_at) VALUES ('$email', '$name', '$password', '$avatar', '$role_code', '$date')");

  return mysqli_affected_rows($conn);
}

function upload_avatar() {
  $namaFile = $_FILES['avatar']['name'];
  $ukuranFile = $_FILES['avatar']['size'];
  $error = $_FILES['avatar']['error'];
  $tmpName = $_FILES['avatar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<script>
        alert('Pilih Avatar terlebih dahulu');
    </script>";
    return false;
  }

  // cek apakah yang diupload gambar
  $ekstensiAvatarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiAvatar = explode('.', $namaFile);
  $ekstensiAvatar = strtolower(end($ekstensiAvatar));
  if (!in_array($ekstensiAvatar, $ekstensiAvatarValid)) {
    echo "<script>
        alert('Yang dipilih bukan format gambar!');
    </script>";
    return false;
  }

  // cek jika ukuran terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>
        alert('Ukuran gambar terlalu besar!');
    </script>";
    return false;
  }

  // lolos pengecekan, avatar siap upload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiAvatar;

  move_uploaded_file($tmpName, 'assets/avatar/'. $namaFileBaru);

  return $namaFileBaru;
}

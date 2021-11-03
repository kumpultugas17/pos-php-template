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

function update_category($data) {
  global $conn;
  $id = $_REQUEST['id_category'];
  $name = htmlspecialchars($data['update_category']);
  $date = date('Y-m-d');

  $sql = $conn->query("UPDATE categories SET name='$name', updated_at = '$date' WHERE id='$id'");

  return mysqli_affected_rows($conn);
}

function destroy_category($id) {
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
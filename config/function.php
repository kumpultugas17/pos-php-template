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
<?php
require 'config/function.php';
require 'partials/_header.php';
require 'partials/_sidebar.php';
if (!empty($_GET['page'])) {
  require 'pages/' . $_GET['page'] . '/index.php';
} else {
  require 'pages/dashboard/index.php';
}
require 'partials/_footer.php';
<?php
require("../common/functions.php");

session_start();
$userId = $_SESSION['userId'];

if (is_null($userId)) {
  send_error_page();
}

if (is_null($_GET['id']) || !is_numeric($_GET['id'])) {
  send_error_page();
}

$id = $_GET['id'];
delete_article($id);

redirect('admin/index.php');

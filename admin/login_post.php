<?php
require("../common/functions.php");

if (is_null($_POST['userId']) || $_POST['userId'] == '' || mb_strlen($_POST['title'], DEFAULT_ENCODE) > 20) {
  send_error_page();
}
if (is_null($_POST['password']) || $_POST['password'] == '' || mb_strlen($_POST['title'], DEFAULT_ENCODE) > 20) {
  send_error_page();
}

$userId = $_POST['userId'];
$password = $_POST['password'];

$result = login($userId, $password);
if ($result){
  session_start();
  $_SESSION['userId'] = $userId;
  redirect('admin/index.php');
} else {
  redirect('admin/login_error.php');
}

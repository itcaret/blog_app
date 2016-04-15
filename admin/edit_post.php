<?php
require("../common/functions.php");

session_start();
$userId = $_SESSION['userId'];

if (is_null($userId)) {
  send_error_page();
}

if (is_null($_POST['id']) || !is_numeric($_POST['id'])) {
  send_error_page();
}

if (is_null($_POST['title']) || $_POST['title'] == '' || mb_strlen($_POST['title'], DEFAULT_ENCODE) > 20) {
  send_error_page();
}

if (is_null($_POST['body']) || $_POST['body'] == '' || mb_strlen($_POST['title'], DEFAULT_ENCODE) > 400) {
  send_error_page();
}

// $article = get_article($id);

$id = $_POST['id'];
$article = [];
$article['id'] = $id;
$article['title'] = $_POST['title'];
$article['body'] = $_POST['body'];
$article['date'] = date('Y-m-d h:i:s');
$article['author'] = $userId;
update_article($article);
redirect('admin/index.php');

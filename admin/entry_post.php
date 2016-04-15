<?php
require("../common/functions.php");

session_start();
$userId = $_SESSION['userId'];

if (is_null($userId)) {
  send_error_page();
}

if (is_null($_POST['title']) || $_POST['title'] == '' || mb_strlen($_POST['title'], DEFAULT_ENCODE) > 20) {
  send_error_page();
}

if (is_null($_POST['body']) || $_POST['body'] == '' || mb_strlen($_POST['title'], DEFAULT_ENCODE) > 400) {
  send_error_page();
}

$article = [];
$article['id'] = get_new_article_id();
$article['title'] = $_POST['title'];
$article['body'] = $_POST['body'];
$article['date'] = date('Y-m-d h:i:s');
$article['author'] = $userId;
save_article($article);
redirect('admin/index.php');

<?php
require('../common/functions.php');

session_start();

$userId = $_SESSION['userId'];

if (is_null($userId)) {
  send_error_page();
}

$title = $_POST['title'];
$body = $_POST['body'];

if (is_null($title) || $title == ''
    || mb_strlen($title, DEFAULT_ENCODE) > 40) {
  send_error_page();
}

if (is_null($body) || $body == ''
    || mb_strlen($body, DEFAULT_ENCODE) > 400) {
  send_error_page();
}

$article = [];
$article['title'] = $title;
$article['body'] = $body;
$article['date'] = date('Y-m-d h:i:s');
$article['author'] = $userId;
save_article($article);
redirect('admin/index.php');

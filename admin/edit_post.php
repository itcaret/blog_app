<?php
require('../common/functions.php');

session_start();

$userId = $_SESSION['userId'];

if (is_null($userId)) {
  send_error_page();
}

$id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];

if (is_null($id) || !preg_match('/^([0-9]{1,5})$/', $id)) {
  send_error_page();
}

if (is_null($title) || $title == ''
    || mb_strlen($title, DEFAULT_ENCODE) > 40) {
  send_error_page();
}

if (is_null($body) || $body == ''
    || mb_strlen($body, DEFAULT_ENCODE) > 400) {
  send_error_page();
}

// $article = get_article($id);
$article = [];
$article['id'] = $id;
$article['title'] = $title;
$article['body'] = $body;
$article['date'] = date('Y-m-d h:i:s');
$article['author'] = $userId;
update_article($article);
redirect('admin/index.php');

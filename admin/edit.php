<?php
require("../common/functions.php");

session_start();

$userId = $_SESSION['userId'];

if (is_null($userId)) {
  send_error_page();
}

$id = $_GET['id'];

if(is_null($id) || !is_numeric($id)) {
  send_error_page();
}

$article = get_article($id);
if(is_null($article)) {
  send_error_page();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= ADMIN_BLOG_TITLE ?></title>
</head>
<body>
  <h1><?= ADMIN_BLOG_TITLE ?></h1>
  <h5><?= htmlspecialchars($userId) ?></h5>
  <hr>
  <form action="edit_post.php" method="post">
    <input type="hidden" name="id" value="<?= $article['id']?>">
    <label>TITLE:</label><br>
    <input type="text" name="title" value="<?= $article['title']?>"><br>
    <label>BODY:</label><br>
    <textarea name="body" rows="10" cols="30"><?= $article['body']?></textarea><br>
    <input type="submit" name="name" value="post">
  </form>
  <hr>
  <a href="/admin/index.php">BACK</a>
</body>
</html>

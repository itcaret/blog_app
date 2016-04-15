<?php
require("../common/functions.php");

session_start();
$userId = $_SESSION['userId'];

if (is_null($userId)) {
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
  <h6><?= htmlspecialchars($userId) ?></h6>
  <hr>

  <form action="entry_post.php" method="post">
    <label>TITLE:</label><br>
    <input type="text" name="title"><br>
    <label>BODY:</label><br>
    <textarea name="body" rows="10" cols="30"></textarea><br>
    <input type="submit" name="name" value="post">
  </form>
  <hr>
  <a href="/admin/index.php">BACK</a>
</body>
</html>

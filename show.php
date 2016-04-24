<?php
require("common/functions.php");

$id = $_GET['id'];

if(is_null($id) || !is_numeric($id)) {
  send_error_page();
}

$article = get_article($id);
if (is_null($article)){
  send_error_page();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= BLOG_TITLE ?></title>
</head>
<body>
  <h1><?= BLOG_TITLE ?></h1>
  <hr>
  <h2><?= htmlspecialchars($article['title']) ?></h2>
  <h5>(<?= htmlspecialchars($article['date']) ?>)
    by <?= htmlspecialchars($article['author']) ?></h5>
  <div><?= nl2br(htmlspecialchars($article['body'])) ?></div>
  <hr>
  <a href="index.php">BACK</a>
</body>
</html>

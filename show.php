<?php
require("common/functions.php");

if(is_null($_GET['id']) || !is_numeric($_GET['id'])) {
  send_error_page();
}
$id = $_GET['id'];

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
  <h2><?php echo htmlspecialchars($article['title']) ?></h2>
  <h5>(<?php echo htmlspecialchars($article['date']) ?>)
    by <?php echo htmlspecialchars($article['author']) ?></h5>
  <div><?php echo nl2br(htmlspecialchars($article['body'])) ?></div>
  <hr>
  <a href="index.php">BACK</a>
</body>
</html>

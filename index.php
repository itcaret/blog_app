<?php
require("./common/functions.php");
$articles = get_articles();
$articles = array_reverse($articles);
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
  <h2>Article List</h2>
  <ul>
    <?php foreach ($articles as $article) { ?>
    <li>
      <?= htmlspecialchars($article['date']) ?>
      <a href="show.php?id=<?= $article['id']?>">
        <?= htmlspecialchars($article['title']) ?>
      </a>
    </li>
    <?php } ?>
  </ul>
</body>
</html>

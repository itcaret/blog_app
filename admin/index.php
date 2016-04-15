<?php
require("../common/functions.php");

session_start();
$userId = $_SESSION['userId'];

if (is_null($userId)) {
  send_error_page();
}

$articles = get_articles();
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
  <h2>Article List</h2>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>DATE</th>
      <th>TITLE</th>
      <th>AUTHOR</th>
      <th>EDIT</th>
      <th>DELETE</th>
    </tr>
  <?php foreach ($articles as $article) { ?>
    <tr>
      <td><?= htmlspecialchars($article['id']) ?></td>
      <td><?= htmlspecialchars($article['date']) ?></td>
      <td><?= htmlspecialchars($article['title']) ?></td>
      <td><?= htmlspecialchars($article['author']) ?></td>
      <td><a href="edit.php?id=<?= htmlspecialchars($article['id']) ?>">EDIT</a></td>
      <td><a href="delete.php?id=<?= htmlspecialchars($article['id']) ?>">DELETE</a></td>
    </tr>
  <?php } ?>
  </table>
  <hr>
  <a href="/admin/entry.php">NEW</a>
</body>
</html>

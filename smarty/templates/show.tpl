<!DOCTYPE html>
<html>
    <head>
        <meta charst="utf-8">
        <title>{$smarty.const.BLOG_TITLE}</title>
    </head>
    <body>
        <h1>{$smarty.const.BLOG_TITLE}</h1>
  <hr>
  <h2>{$article['title']|escape}</h2>
  <h5>{$article['date']|escape}
      by {$article['author']|escape}</h5>
  <div>{$article['body']|nl2br}</div>
  <hr>
  <a href="index.php">BACK</a>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <meta charst="utf-8">
  <title>{$smarty.const.BLOG_TITLE}</title>
</head>
<body>
  <h1>{$smarty.const.BLOG_TITLE}</h1>
  <hr>
  <h2>Article List</h2>
  <ul>
      {foreach from=$articles item='article'}
    <li>
      {$article['date']|escape}
      <a href="show.php?id={$article['id']}">
        {$article['title']|escape}
      </a>
    </li>
    {/foreach}
  </ul>
</body>
</html>

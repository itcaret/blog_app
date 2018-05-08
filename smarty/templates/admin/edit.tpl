<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{$smarty.const.ADMIN_BLOG_TITLE}</title>
    </head>
    <body>
        <h1>{$smarty.const.ADMIN_BLOG_TITLE}</h1><!DOCTYPE html><!DOCTYPE html>
        <h5>{$smarty.session.userId|escape}</h5>  
        <hr>
        <form action="edit_post.php" method="post">
            <input type="hidden" name="id" value="{$article['id']}">
            <label>TITLE:</label><br>
            <input type="text" name="title" value="{$article['title']}"><br>
            <label>BODY:</label><br>
            <textarea name="body" rows="10" cols="30">{$article['body']}</textarea><br>
            <input type="submit" name="name" value="post">
        </form>
        <hr>
        <a href="/admin/index.php">BACK</a>
    </body>
</html>

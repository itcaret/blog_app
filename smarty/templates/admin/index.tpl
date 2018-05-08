<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{$smarty.const.ADMIN_BLOG_TITLE}</title>
    </head>
    <body>
        <h1>{$smarty.const.ADMIN_BLOG_TITLE}</h1>
        <h5>{$smarty.session.userId|escape}</h5>
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
            {foreach from=$articles item="article"}
            <tr>
                <td>{$article['id']|escape}</td>
                <td>{$article['date']|escape}</td>
                <td>{$article['title']|escape}</td>
                <td>{$article['author']|escape}</td>
                <td><a href="edit.php?id={$article['id']}">EDIT</a></td>
                <td><a href="delete.php?id={$article['id']}">DELETE</a></td>
            </tr>
            {/foreach}
        </table>
        <hr>
        <a href="/admin/entry.php">NEW</a>
    </body>
</html>

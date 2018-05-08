<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/../libs/smarty/libs/Smarty.class.php");

define('DEFAULT_ENCODE', 'UTF-8');
define('BLOG_TITLE', 'Your Blog Title');
define('ADMIN_BLOG_TITLE', 'Admin Your Blog Title');
define('DOMAIN', 'http://localhost:8000/');

// DB情報
define('DB_DSN', 'mysql:host=localhost;dbname=myblog');
define('DB_USER', 'root');
define('DB_PASS', 'root');

/**
 * リダイレクトする。
 * （処理を終了する）
 * @param string $path リダイレクト先のパス
 */
function redirect($path){
    header('location: ' . DOMAIN . $path);
    exit();
}

/**
 * エラーページに転送する。
 * （処理を終了する）
 * @param string $path リダイレクト先のパス
 */
function send_error_page(){

    $smarty = new Smarty();
    $smarty->template_dir = $_SERVER['DOCUMENT_ROOT'] . "/../smarty/templates/error/";
    $smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'] . "/../smarty/templates_c/";

    $smarty->display("error.tpl");
    exit();
}

/**
 * ログインする。
 * @param string $userId ユーザID
 * @param string $password パスワード
 * @return bool ログイン成功の場合 true
 */
function login($userId, $password) { 
    try{
        // DBに接続
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = "select * from user where id = ?";
        $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->bindParam(1, $userId, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result){
            if ($result['password'] === $password) {
                return true;
            }
        } 
        return false;
    }finally {
        $dbh = null;
    }
}

/**
 * 記事一覧を取得する。
 * @return array 記事の一覧
 */
function get_articles(){
    try{
        // DBに接続
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
        $results = $dbh->query('select * from article');
        $articles = [];
        if ($results) {
            foreach($results as $result) {
                $articles[] = $result;
            }
        } 
        return $articles;
    } finally {
        $dbh = null;
    }
}

/**
 * 記事を取得する。
 * @param string $id 記事ID
 * @return array 記事 存在しない場合 null
 */
function get_article($id){
    try{
        // DBに接続
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = "select * from article where id = ?";
        $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->bindValue(1, $id, PDO::PARAM_INT);
        $sth->execute();
        $article = $sth->fetch(PDO::FETCH_ASSOC);
        if (empty($article)) {
            return null;
        }
        return $article;
    } finally {
        $dbh = null;
    }
}

/**
 * 記事を保存する。
 * @param array $new_article 新規記事
 */
function save_article($new_article){
    try{
        // DBに接続
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = "insert into article (title, body, date, author) value (?, ?, now(), ?)";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(1, $new_article['title'], PDO::PARAM_STR);
        $sth->bindParam(2, $new_article['body'], PDO::PARAM_STR);
        $sth->bindParam(3, $new_article['author'], PDO::PARAM_STR);
        $is_success = $sth->execute();
        if (!$is_success){
            send_error_page();
        }
    } finally {
        $dbh = null;
    }
}

/**
 * 記事を削除する。
 * @param string $id 削除対象の記事ID
 */
function delete_article($id){
    try{
        // DBに接続
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = "delete from article where id = ?";
        $sth = $dbh->prepare($sql);
        $sth->bindValue(1, $id, PDO::PARAM_INT);
        $is_success = $sth->execute();
        if (!$is_success){
            send_error_page();
        }
    } finally {
        $dbh = null;
    }
}

/**
 * 記事を更新する。
 * @param array $edit_article 更新対象の記事
 */
function update_article($edit_article){
    try{
        // DBに接続
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = "update article  set title = ?, body = ?, date = ?, author = ? where id = ?";
        $sth = $dbh->prepare($sql);
        $sth->bindParam(1, $edit_article['title'], PDO::PARAM_STR);
        $sth->bindParam(2, $edit_article['body'], PDO::PARAM_STR);
        $sth->bindParam(3, $edit_article['date'], PDO::PARAM_STR);
        $sth->bindParam(4, $edit_article['author'], PDO::PARAM_STR);
        $sth->bindValue(5, $edit_article['id'], PDO::PARAM_INT);

        $is_success = $sth->execute();
        if (!$is_success){
            send_error_page();
        }
    } finally {
        $dbh = null;
    }
}

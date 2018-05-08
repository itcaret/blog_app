<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../libs/smarty/libs/Smarty.class.php');
require($_SERVER['DOCUMENT_ROOT'] . '/../common/functions.php');
$smarty = new Smarty();

$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/../smarty/templates/';
$smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'] . '/../smarty/templates_c/';

try{
    $articles = get_articles();
} catch (PDOException $e) {
     send_error_page();
}
$articles = array_reverse($articles);
$smarty->assign("articles", $articles);
$smarty->display("index.tpl");
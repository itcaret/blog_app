<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../libs/smarty/libs/Smarty.class.php');
require($_SERVER['DOCUMENT_ROOT'] .'/../common/functions.php');
$smarty = new Smarty();
$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/../smarty/templates/admin/';
$smarty->compile_dir =  $_SERVER['DOCUMENT_ROOT'] . '/../smarty/templates_c/';

session_start();
$userId = $_SESSION['userId'];

if (is_null($userId)) {
  send_error_page();
}

$id = $_GET['id'];

if(is_null($id) || !preg_match('/^([0-9]{1,5})$/', $id)) {
  send_error_page();
}

$article = get_article($id);
if(is_null($article)) {
  send_error_page();
}

$smarty->assign("article", $article);
$smarty->display("edit.tpl");
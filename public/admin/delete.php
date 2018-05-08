<?php
require($_SERVER['DOCUMENT_ROOT'] .'/../common/functions.php');
$smarty = new Smarty();

session_start();
$userId = $_SESSION['userId'];

if (is_null($userId)) {
  send_error_page();
}

$id = $_GET['id'];

if (is_null($id) || !preg_match('/^([0-9]{1,5})$/', $id)) {
  send_error_page();
}

try{
    delete_article($id);
} catch (PDOException $e) {
    send_error_page();
}

redirect('admin/index.php');

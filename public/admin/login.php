<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/../libs/smarty/libs/Smarty.class.php");
require($_SERVER['DOCUMENT_ROOT'] .'/../common/functions.php');
$smarty = new Smarty();


$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'] . "/../smarty/templates/admin/";
$smarty->compile_dir =  $_SERVER['DOCUMENT_ROOT'] . "/../smarty/templates_c/";

$smarty->display("login.tpl");
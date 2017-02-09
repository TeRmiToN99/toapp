<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/function.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/models/category.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tamplates/toapp/index_html.php';
/*if (isset($_GET)){ 
	include '../models/login.php';
} elseif (isset($_POST)){*/
$pdo = db_connect();
$categories = category_all($pdo);
$pageTitle = ' Администрирование';
include 'views/index.php';
//}
?>
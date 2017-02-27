<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Products.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tamplates/toapp/index_html.php';
$pdo = db_connect();
/*if (isset($_GET)) 
{
	include 'models/login.php';
} elseif (isset($_POST)) 
{*/
    include 'categories.php';
    include 'views/index.php';
//}
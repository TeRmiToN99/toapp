<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/models/Product.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tamplates/toapp/index_html.php';
/*if (isset($_GET)){ 
	include '../models/login.php';
} elseif (isset($_POST)){*/
    $pdo = db_connect();
    //$category = get_title_category($pdo, '');

// Если выбрана категория, то вывести список товаров категории
if(isset($_GET['id'])){
    $products = products_get($pdo, $_GET['id']);
} else { 
    $products = product_all($pdo);
}
    include 'views/products.php';
//}
?>
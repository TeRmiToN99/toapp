<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/models/product.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/models/category.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tamplates/toapp/index_html.php';
/*if (isset($_GET)){ 
	include '../models/login.php';
} elseif (isset($_POST)){*/
    $pdo = db_connect();
    $categories = category_all($pdo);

if (isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "";

if ($action == "delete") {
    product_del($pdo, $_GET['id']);
    header("Location: product.php");
}

if ($action == "add") {
    if (!empty($_POST)) {
        product_add($pdo, $_POST['categoryid'], $_POST['title'],
                        $_POST['img_path'], $_POST['weigth'],
                        $_POST['description'], $_POST['content']) ;
        header("Location: products.php");
    }
    $pageTitle = "???????? ?????";
    include 'views/form.php';
} else if ($action == "edit") {
    if (!isset($_GET['id']))
        header("Location: product.php");
        $id = (int)$_GET['id'];
    if (!empty($_POST) && $id >= 0) {
        product_edit($pdo, $id, $_POST['title']);
        header("Location: product.php");
    }
    $product = product_get($pdo, $_GET['id']);
    $pageTitle = "???????? " . $product['title'];
    include("views/form.php");
} else {
    $product = product_all($pdo);
    include 'views/products.php';
}
    //$tehcart = tehcart_get($pdo, $_GET['id']);
    //include 'views/product.php';
//}
?>
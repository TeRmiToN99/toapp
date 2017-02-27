<?php
    require_once("includes/db.inc.php");
    require_once("models/product.php");
    require_once $_SERVER['DOCUMENT_ROOT'] . '/tamplates/toapp/index_html.php';

    $pdo = db_connect();
    $category = get_title_category($pdo, $_GET['id']);
    $products = products_get($pdo, $_GET['id']);

    include("views/products.php");
?>
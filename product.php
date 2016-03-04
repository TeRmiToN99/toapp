<?php
    require_once("includes/db.inc.php");
    require_once("models/product.php");
    
    $pdo = db_connect();
    $product = product_get($pdo, $_GET['id']);
    //$tehcart = tehcart_get($pdo, $_GET['id']);

    include("views/product.php");
    require_once $_SERVER['DOCUMENT_ROOT'] . '/tamplates/toapp/index_html.php';
?>
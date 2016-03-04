<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/models/category.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/function.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tamplates/toapp/index_html.php';

$pdo = db_connect();

if (isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "";


if ($action == "delete") {
    category_del($pdo, $_GET['id']);
    header("Location: category.php");
}

if ($action == "add") {
    if (!empty($_POST)) {
        category_add($pdo, $_POST['title']);
        header("Location: category.php");
    }
    $pageTitle = "Добавить категорию";
    include 'views/category_admin.php';
} else if ($action == "edit") {
    if (!isset($_GET['id']))
        header("Location: category.php");
    $id = (int)$_GET['id'];

    if (!empty($_POST) && $id > 0) {
        category_edit($pdo, $id, $_POST['title']);
        header("Location: category.php");
    }
    $category = category_get($pdo, $id);
    $pageTitle = "Изменить " . $category['title'];
    include("views/category_admin.php");
} else {
    $categories = category_all($pdo);
    include 'views/category.php';
}
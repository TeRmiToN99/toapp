<?php
require_once __DIR__ . '/autoload.php';
//$user = \App\Models\User::findById(1);
session_start();
if ($_SESSION['login'] == '')
{
    header("Location: /login.php");
}else {
    $controller = new \App\Controllers\Product();
    $action = $_GET['action'] ?: 'Index';
    $title = 'ToApp | Блюда категории';
    include __DIR__ . '/App/templates/index_top.php';
    include_once __DIR__ . '/App/templates/index_content.php';
    try {
        $controller->action($action);
    } catch (\App\Exceptions\Core $e) {
        echo 'Возникло исключение ' . $e->getMessage();
    } catch (\App\Exceptions\Db $e) {
        echo 'Проблемы с базой данных: ' . $e->getMessage();
    }
}
include  __DIR__ . '/App/templates/index_bottom.php';
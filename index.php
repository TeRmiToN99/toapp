<?php
require_once __DIR__ . '/autoload.php';
session_start();
if (($_SESSION['login'] && $_COOKIE['login']) == '')
{
    header("Location: login.php");
}else {
    $url = $_SERVER['REQUEST_URI'];
    $title = 'ToApp | ';
    include_once __DIR__ . '/App/templates/index_top.php';
    $controller = new \App\Controllers\News();
    $action = $_GET['action'] ?: 'Index';
    try {
        $controller->action($action);
    } catch (\App\Exceptions\Core $e) {
        echo 'Возникло исключение ' . $e->getMessage();
    } catch (\App\Exceptions\Db $e) {
        echo 'Проблемы с базой данных: ' . $e->getMessage();
    }

    $controller = new \App\Controllers\Product();
    $action = $_GET['action'] ?: 'Index';
    try {
        $controller->action($action);
    } catch (\App\Exceptions\Core $e) {
        echo 'Возникло исключение ' . $e->getMessage();
    } catch (\App\Exceptions\Db $e) {
        echo 'Проблемы с базой данных: ' . $e->getMessage();
    }
}
include  __DIR__ . '/App/templates/index_bottom.php';
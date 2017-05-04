<?php
require_once __DIR__ . '/../../autoload.php';
session_start();
if (($_SESSION['login'] && $_COOKIE['login']) == '')
{
    header("Location: /App/cpanel/login.php");
}else {
    include_once __DIR__ . '/templates/index_top.php';
    $controller = new \App\cpanel\Controllers\News();
    $action = $_GET['action'] ?: 'Index';
    $type = '';

    try {
        $controller->action($action);
    } catch (\App\Exceptions\Core $e) {
        echo 'Возникло исключение ' . $e->getMessage();
    } catch (\App\Exceptions\Db $e) {
        echo 'Проблемы с базой данных: ' . $e->getMessage();
    }

    $controller = new \App\cpanel\Controllers\Category();
    $action = $_GET['action'] ?: 'Index';
    try {
        $controller->action($action);
    } catch (\App\Exceptions\Core $e) {
        echo 'Возникло исключение ' . $e->getMessage();
    } catch (\App\Exceptions\Db $e) {
        echo 'Проблемы с базой данных: ' . $e->getMessage();
    }
}
include __DIR__ . '/templates/index_bottom.php';
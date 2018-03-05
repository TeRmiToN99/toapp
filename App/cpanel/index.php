<?php
require_once __DIR__ . '/../../autoload.php';
session_start();
include_once __DIR__ . '/templates/index_top.php';
if ( isset ($_SESSION['logged_user']) ){
    $controller = new \App\cpanel\Controllers\Article();
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
    //$action = $_GET['action'] ?: 'Index';
    try {
        $controller->action($action);
    } catch (\App\Exceptions\Core $e) {
        echo 'Возникло исключение ' . $e->getMessage();
    } catch (\App\Exceptions\Db $e) {
        echo 'Проблемы с базой данных: ' . $e->getMessage();
    }
}else {
   header("Location: login.php");
}
include __DIR__ . '/templates/index_bottom.php';
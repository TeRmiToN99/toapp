<?php
require_once __DIR__ . '/autoload.php';
session_start();
if ( isset ($_SESSION['logged_user']) ){
    include_once __DIR__ . '/App/templates/index_top.php';
    include_once __DIR__ . '/App/templates/index_content.php';
    $controller = new \App\Controllers\Article();
    $action = $_GET['action'] ?: 'Index';
    $type = '';
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
}else {
    header("Location: login.php");
}
include  __DIR__ . '/App/templates/index_bottom.php';
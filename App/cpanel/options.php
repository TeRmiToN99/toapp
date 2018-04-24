<?php
require_once __DIR__ . '/../../autoload.php';

session_start();
if ( isset ($_SESSION['logged_user']) ){
    $title = 'ToApp | Все модификаторы';
    include __DIR__ . '/templates/index_top.php';
    $controller = new \App\cpanel\Controllers\Option();
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
include __DIR__ . '/templates/index_bottom.php';
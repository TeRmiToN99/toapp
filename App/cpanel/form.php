<?php
require __DIR__ . '/../../autoload.php';
session_start();
if ($_SESSION['login'] == '')
{
    header("Location: /../../login.php");
}else {
//include __DIR__ . '/templates/index_content.php';
    include __DIR__ . '/templates/index_top.php';
    if (!empty($_POST)) {
        $controller = new \App\cpanel\Controllers\Post($data);
        $action = $_GET['action'] ?: 'Index';
    } else {
        $controller = new \App\cpanel\Controllers\Form();
        $action = $_GET['action'] ?: 'Index';
    }
    try {
        $controller->action($action);
    } catch (\App\Exceptions\Core $e) {
        echo 'Возникло исключение ' . $e->getMessage();
    } catch (\App\Exceptions\Db $e) {
        echo 'Проблемы с базой данных: ' . $e->getMessage();
    }
}
include __DIR__ . '/templates/index_bottom.php';
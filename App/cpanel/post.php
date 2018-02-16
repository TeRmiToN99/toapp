<?php

require __DIR__ . '/../../autoload.php';
session_start();
if ( isset ($_SESSION['logged_user']) ){
    include __DIR__ . '/templates/index_content.php';
    if (!empty($_POST)) {
        $controller = new \App\cpanel\Controllers\Post($_POST);
        $action = $_GET['action'] ?: 'Index';
        $post_type = $_GET['post_type'] ?: '';
    } else {
        $controller = new \App\cpanel\Controllers\Form();
        $action = $_GET['action'] ?: 'Index';
    }
    try {
        $controller->action($action, $post_type);

    } catch (\App\Exceptions\Core $e) {
        echo 'Возникло исключение ' . $e->getMessage();
    } catch (\App\Exceptions\Db $e) {
        echo 'Проблемы с базой данных: ' . $e->getMessage();
    }
    include __DIR__ . '/templates/index_bottom.php';
}
?>
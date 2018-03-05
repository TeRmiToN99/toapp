<?php
require __DIR__ . '/../../autoload.php';
session_start();
if ( isset ($_SESSION['logged_user']) ){
    $title = 'ToApp | ';
    include __DIR__ . '/templates/index_top.php';
    if (!empty($_POST)) {
        $controller = new \App\cpanel\Controllers\Post($_POST);
        $action = $_GET['action'] ?: 'Index';
        if($_GET['action'] === NULL){
            $action = 'Index';
        }
    } else {
        $controller = new \App\cpanel\Controllers\Form();
        $action = $_GET['action'] ?: 'Index';
    }
    try {
        $post_type = $_GET['post_type'] ?: '';
        $controller->action($action, $post_type);

    } catch (\App\Exceptions\Core $e) {
        echo 'Возникло исключение ' . $e->getMessage();
    } catch (\App\Exceptions\Db $e) {
        echo 'Проблемы с базой данных: ' . $e->getMessage();
    }
    include __DIR__ . '/templates/index_bottom.php';
}
?>
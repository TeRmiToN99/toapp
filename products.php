<?php
require_once __DIR__ . '/autoload.php';
//$user = \App\Models\User::findById(1);
$userName = 'admin';
$controller = new \App\Controllers\Product();
$action = $_GET['action'] ?: 'Index';
$title = 'ToApp | Блюда категории';
include __DIR__ . '/App/templates/index_top.php';
try {
    $controller->action($action);
} catch(\App\Exceptions\Core $e){
    echo 'Возникло исключение ' . $e->getMessage();
}catch (\App\Exceptions\Db $e) {
    echo 'Проблемы с базой данных: ' . $e->getMessage();
}
include  __DIR__ . '/App/templates/index_bottom.php';
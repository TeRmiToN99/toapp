<?php
require_once __DIR__ . '/../../autoload.php';
//$user = \App\Models\User::findById(1);
$userName = 'admin';
$controller = new \App\cpanel\Controllers\Product();
$action = $_GET['action'] ?: 'Index';
$title = 'ToApp | Блюда категории';
include __DIR__ . '/templates/top_index.php';
include __DIR__ . '/templates/content_index.php';
try {
    $controller->action($action);
} catch(\App\Exceptions\Core $e){
    echo 'Возникло исключение ' . $e->getMessage();
}catch (\App\Exceptions\Db $e) {
    echo 'Проблемы с базой данных: ' . $e->getMessage();
}
include  __DIR__ . '/templates/bottom_index.php';
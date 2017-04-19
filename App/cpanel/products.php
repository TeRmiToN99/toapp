<?php
require_once __DIR__ . '/../../autoload.php';
//$user = \App\Models\User::findById(1);
$userName = 'admin';
$title = 'ToApp | Блюда категории';
include __DIR__ . '/templates/index_top.php';

$controller = new \App\cpanel\Controllers\Product();
$action = $_GET['action'] ?: 'Index';

try {
    $controller->action($action);
} catch(\App\Exceptions\Core $e){
    echo 'Возникло исключение ' . $e->getMessage();
}catch (\App\Exceptions\Db $e) {
    echo 'Проблемы с базой данных: ' . $e->getMessage();
}
include __DIR__ . '/templates/index_bottom.php';
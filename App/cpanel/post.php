<?php

require __DIR__ . '/../../autoload.php';
include __DIR__ . '/templates/top_index.php';

//$user = \App\Models\User::findById(1);
$userName = 'admin';
//include __DIR__ . '/templates/content_index.php';

if(!empty($_POST)) {
    $controller = new \App\cpanel\Controllers\Category();
    $action = $_GET['action'] ?: 'Index';
}else{
    $controller = new \App\cpanel\Controllers\Form();
    $action = $_GET['action'] ?: 'Index';
}
try {
    $controller->action($action);
} catch(\App\Exceptions\Core $e){
    echo 'Возникло исключение ' . $e->getMessage();
}catch (\App\Exceptions\Db $e) {
    echo 'Проблемы с базой данных: ' . $e->getMessage();
}
include  __DIR__ . '/templates/bottom_index.php';
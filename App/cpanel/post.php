<?php

require __DIR__ . '/../../autoload.php';
include __DIR__ . '/templates/top_index.php';

//$user = \App\Models\User::findById(1);
$userName = 'admin';
//include __DIR__ . '/templates/content_index.php';

if(!empty($_POST)) {
    $controller = new \App\cpanel\Controllers\Post($_POST);
    $action = $_GET['action'] ?: 'Index';
    $post_type = $_GET['post_type'] ?: '';
}else{
    $controller = new \App\cpanel\Controllers\Form();
    $action = $_GET['action'] ?: 'Index';
}
try {
    $controller->action($action, $post_type);
} catch(\App\Exceptions\Core $e){
    echo 'Возникло исключение ' . $e->getMessage();
}catch (\App\Exceptions\Db $e) {
    echo 'Проблемы с базой данных: ' . $e->getMessage();
}
include  __DIR__ . '/templates/bottom_index.php';
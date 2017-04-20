<?php
require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];

$controller = new \App\Controllers\News();
$action = $_GET['action'] ?: 'Create';

try{
    $controller->action($action);
} catch (\App\Exceptions\Core $e){
    echo '�������� ���������� ' . $e->getMessage();
}catch (\App\Exceptions\Db $e){
    echo '�������� � ����� ������: ' . $e->getMessage();
}
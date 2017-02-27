<?php

require __DIR__ . '/autoload.php';
$url = $_SERVER['REQUEST_URI'];
require_once __DIR__ . '/App/templates/index_top.php';

$controller = new \App\Controllers\Category();
$action = $_Get['action'] ?: 'Index';

try {
    $controller->action($action);
} catch (\App\Exceptions\Core $e) {
    echo 'Возникло исключение ' . $e->getMessage();
} catch (\App\Exceptions\Db $e) {
    echo 'Проблемы с базой данных: ' . $e->getMessage();
}

$controller = new \App\Controllers\Product();
$action = $_Get['action'] ?: 'Index';

try {
    $controller->action($action);
} catch (\App\Exceptions\Core $e) {
    echo 'Возникло исключение ' . $e->getMessage();
} catch (\App\Exceptions\Db $e) {
    echo 'Проблемы с базой данных: ' . $e->getMessage();
}

$controller = new \App\Controllers\News();
$action = $_GET['action'] ?: 'Index';

try {
    $controller->action($action);
} catch (\App\Exceptions\Core $e) {
    echo 'Возникло исключение ' . $e->getMessage();
} catch (\App\Exceptions\Db $e) {
    echo 'Проблемы с базой данных: ' . $e->getMessage();
}

require_once __DIR__ . '/App/templates/index_bottom.php';


<?php

require  __DIR__ . '/autoload.php';



$view = new View();
$view->display(
    'article.php',
    ['data' => $dpx->data]
);
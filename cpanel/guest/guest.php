<?php
include_once __DIR__ . '/func.php';
$url = __DIR__ . '/guest.txt';
$m = 'r';
$guests = ReadFileToArray($url, $m);
foreach($guests as $name){
    echo $name . '<br>';
}
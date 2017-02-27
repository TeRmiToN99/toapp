<?php
/**
 * Created by PhpStorm.
 * User: TeRmiT
 * Date: 12.03.2016
 * Time: 15:18
 */
include_once __DIR__ . '/func.php';
$url = __DIR__ . '/guest.txt';
$val = WriteFileDate($url, $_POST['str']);
header('Location:'. __DIR__ . '/guest.php');
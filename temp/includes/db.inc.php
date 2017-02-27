<?php
function db_connect()
{
    $host = "localhost";
    $dbname = "toapp";
    $user = "toadm";
    $pass = "9911";
    try {
        $dsn = "mysql:host=$host; dbname=$dbname";
        $opt = array(
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES utf8'
        );
        $pdo = new PDO($dsn, $user, $pass, $opt);
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$pdo->exec('SET NAMES "utf8"');
        /*   Использованный вариант подключения, устанавливает параметры непосредственно после запуска.*/
    } catch (PDOException $e) {
        $output = 'Невозможно подключиться к серверу базы данных. ' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
        exit();
    }
    return $pdo;
}
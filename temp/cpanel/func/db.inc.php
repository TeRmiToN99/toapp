<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=toapp', 'toadm', '9911');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
} catch (PDOException $e)
{
	$output = 'Невозможно подключиться к серверу базы данных. ' . $e->getMessage();
	include '../../tamplates/toapp/index_html.php';
	exit();
}
$output = 'Соединение с базой данных установлено.';
//include '../../tamplates/toapp/index_html.php';
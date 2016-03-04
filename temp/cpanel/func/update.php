<?php
$tableName = '';
try {
	$sql = 'UPDATE $tableName SET name = "temp" WHERE text LIKE "%0123%';
	$affectedRows = $pdo->exec($sql);
	$output = "Обновлено столбцов: $affectedRows";
} catch (PDOException $e) {
	$output = 'Ошибка при выполнении обновления: ' . $e->getMessage();
	include '../../tamplates/toapp/index_html.php';
	exit();
}
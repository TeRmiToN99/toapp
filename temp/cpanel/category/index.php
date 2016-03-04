<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

try {
	$result = $pdo->query('SELECT id, title FROM category');
} catch (PDOException $e) {
	$error = 'Ошибка при извлечении категорий из базы данных.';
	include $_SERVER['DOCUMENT_ROOT'] . 'error.html.php';
	exit();
}

foreach ($result as $row) {
	$categories[] = array('id' => $row['id'], 'title' => $row['title']);
}
include 'category.html.php';

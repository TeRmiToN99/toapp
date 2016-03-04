<?php
try {
	$sql = "SELECT * FROM category";
	$result = $pdo->query($sql);
} catch (PDOException $e) {
	$error = 'Ошибка при извлечении категории: ' . $e->getMessage();
	include '/../error.html.php';
	exit
}
foreach ($result as $row) {
	$categories[] = array(
		'id' => $row['id'],
		'title' => $row['title']
	);
}
if (isset ($_GET['add'])){
	include '../tmpl/form.html.php';
	exit();
}
include 'category.html.php';
?>
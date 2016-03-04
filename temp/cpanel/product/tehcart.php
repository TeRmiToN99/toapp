<?php
include 'db.inc.php';
try {
	$sql = "SELECT product.title FROM product
		INNER JOIN categoryproduct
		ON product.id = productid
		INNER JOIN category
		ON categoryid = category.id
		WHERE category.title = 'Гарниры'";
	$result = $pdo->query($sql);
} catch (PDOException $e) {
	$error = 'Ошибка при извлечении категории: ' . $e->getMessage();
	include '/../error.html.php';
	exit();
}
foreach ($result as $row) {
	$products[] = array(
		'id' => $row['id'],
		'title' => $row['title'],
		'weigth' => $row['weigth'],
		'description' => $row['description']
	);
}
if (isset ($_GET['add_prod'])){
	include 'form.html.php';
	exit();
}
include 'product.html.php';
?>
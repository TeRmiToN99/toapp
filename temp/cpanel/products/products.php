<?
try {
	$sql = 'SELECT * FROM category';
	$result = $pdo->query($sql);
} catch (PDOException $e) {
	$error = 'Ошибка при извлечении категории: ' . $e->getMessage();
	include '../../error.html.php';
	exit();
}
while ($row = $result->fetch())
{
	$categories[] = array('id' => $row['id'], 'title' => $row['title'], 'date'=>$row['adddate']);
}
include 'func/product.php';
?>
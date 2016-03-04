<?
if (isset($_POST['action']) and $_POST['action'] == 'Удалить') {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
//
	try {
		$result = $pdo->query('SELECT id FROM tehcart WHERE productid = :id');
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (PDOException $e) {
		$error = 'Ошибка при извлечении категорий из базы данных.';
		include $_SERVER['DOCUMENT_ROOT'] . 'error.html.php';
		exit();
	}

	$result = $s->fetchAll();
	// Удаляем записи техкарты блюда
	try {
		$sql = $pdo->query('DELETE FROM tehcart WHERE productid = :id');
		$s = $pdo->prepare($sql);

		//
		foreach ($result as $row) {
			$
		}
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (PDOException $e) {
		$error = 'Ошибка при извлечении категорий из базы данных.';
		include $_SERVER['DOCUMENT_ROOT'] . 'error.html.php';
		exit();	
	}

foreach ($result as $row) {
	$products[] = array('id' => $row['id'], 'title' => $row['title']);
}
include 'product.html.php';
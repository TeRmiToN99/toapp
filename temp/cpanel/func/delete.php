<?
if (isset($_GET['deletecat']))
{
	try {
		$sql = 'DELETE FROM category WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id', $_POST['id']);
		$s->execute();
	} catch (PDOException $e) {
		$error = 'Ошибка при удалении категории: ' . $e->getMessage();
		include '../../error.html.php';
		exit();
	}
	header ('Location: . ');
	exit();
}
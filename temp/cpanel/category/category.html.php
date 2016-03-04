<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Управление категориями</title>
	<link rel="stylesheet" type="text/css" href="/tamplates.css">
</head>
<body>
	<h1>Управление категориями</h1>
	<p><a href="?add">Добавить категорию</a></p>
	<p>Весь список категорий:</p>
	<ul>
	<?php	foreach ($categories as $category): ?>
		<form action="" method="post">
			<li>
				<a href="<?= htmlout($category['id']);?>"><?= htmlout($category['title']);?></a>
				<input type="hidden" name="id" value="<?php echo $category['id']; ?>">
				<input type="submit" name="action" value="Редактировать">
				<input type="submit" name="action" value="Удалить">
			</li>
		</form>
	<?php endforeach; ?>
	</ul>
	<p><a href="..">Вернуться на главную страницу</a></p>
</body>
</html>
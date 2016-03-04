<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Категории</title>
	<link rel="stylesheet" type="text/css" href="/tamplates.css">
</head>
<body>
	<table>
	<?php	foreach ($tehcarts as $tehcart): ?>
		<form action="" method="post">
			<a href="<?=htmlout($tehcart['id']);?>"><?= htmlout(tehcart['title']);?></a>
			<input type="hidden" name="id" value="<?php echo $category['id']; ?>">
			<input type="submit" name="action" value="Редактировать">
			<input type="submit" name="action" value="Удалить">
		</form>
	<?php endforeach; ?>
	</table>
	<p><a href="..">Вернуться на главную страницу</a></p>
</body>
</html>
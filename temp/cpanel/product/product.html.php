<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Блюда</title>
	<link rel="stylesheet" type="text/css" href="../../tamplates/toapp/css/tamplates.css">
</head>
<body>
<p><a href="?add_prod">Добавить блюдо</a></p>
<ul>
	<? foreach ($products as $product): ?>
		<form action="" method="post">
			<li>
				<a href="<?= htmlout($product['id']);?>"><?= htmlout($product['title']);?></a>
				<input type="hidden" name="id" value="<?= $product['id']; ?>">
				<input type="submit" name="action" value="Редактировать">
				<input type="submit" name="action" value="Удалить">
			</li>
		</form>
	<? endforeach; ?>
	</ul>
</div>
</body>
</html>
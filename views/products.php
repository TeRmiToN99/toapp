<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Блюда категории: <?=$category['title']?></title>
</head>
<body>
     <div class="container">
        <h1>Блюда категории: <?=$category['title']?></h1>
	<?php	foreach ($products as $product): ?>
		<div class="products_cat">
		    <div class="product">
                <a href="product.php?id=<?=$product['id']?>">
                <?= htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8')?></a>
            </div>
		</div>
	<?php endforeach; ?>
	<div>
        <a href="javascript:history.go(-1)"style=" text-decoration:none " >Назад</a>
    </div>
	</div>
</body>
</html>
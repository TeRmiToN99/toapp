    <div class="frontcontainer">
	<?php	foreach ($categories as $category): ?>
		<div class="category">	
			<a href="products.php?id=<?=$category['id']?>"><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8');?></a>
		</div>
	<?php endforeach; ?>
	</div>
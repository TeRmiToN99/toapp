<?include 'func/select.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SELECT</title>
	<link rel="stylesheet" type="text/css" href="../../tamplates/toapp/css/tamplates.css">
</head>
<body>
<!--<?php//	foreach ($categories as $category): ?>
		<div><?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8')?></div> 
<?php //endforeach; ?> -->
<? foreach ($categories as $category){?>
<a href=""><div class="category"><p><?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8');?></p></div></a>
<?}?>
</body>
</html>
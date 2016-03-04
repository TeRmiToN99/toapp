<?
if(isset($_POST['add_cat'])){
try {
	$sql = 'INSERT INTO category SET
		title = :add_cat,
		add_date = CURDATE()';
	$s = $pdo->prepare($sql);
	$s->bindValue(':add_cat', $_POST['add_cat']);
	$s->execute();
} 
catch (PDOException $e) 
{
	$error = 'Ошибка при добавлении категории' . $e->getMessage();
	include '../../error.html.php';
	exit();
}
header('Location: product.php');
exit();	
}
if(isset($_POST['add_prod'])){
try {
	$sql = 'INSERT INTO product SET
		title = :add_prod,
		add_date = CURDATE()';
	$s = $pdo->prepare($sql);
	$s->bindValue(':add_prod', $_POST['add_prod']);
	$s->execute();
} 
catch (PDOException $e) 
{
	$error = 'Ошибка при добавлении категории' . $e->getMessage();
	include '../../error.html.php';
	exit();
}
header('Location: product.php');
exit();	
}
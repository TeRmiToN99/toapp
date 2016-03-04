<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';

if (isset($_GET['add_prod']) || isset($_GET['add_cat']))
{
	include 'form.html.php';
	exit();
}
/*Добавление категории */
if(isset($_POST['add_cat'])){
	include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
try {
	$sql = 'INSERT INTO category SET
		title = :add_cat';
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
header('Location: . ');
exit();	
}
/*Добавление продукта*/
if(isset($_POST['add_prod'])){
	include_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/includes/db.inc.php';
try {
	$sql = 'INSERT INTO product SET
		title = :add_prod,
		img_path = :add_prod,
		weigth = :add_prod,
		description = :add_prod,
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
header('Location: . ');
exit();	
}
/*Добавление технологической карты*/
if(isset($_POST['add_teh'])){
	include_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/includes/db.inc.php';
try {
	$sql = 'INSERT INTO tehcart SET
		productid = :add_teh,
		tehingid = :add_teh,
		gross = :add_teh,
		net = :add_teh';
	$s = $pdo->prepare($sql);
	$s->bindValue(':add_teh', $_POST['add_teh']);
	$s->execute();
} 
catch (PDOException $e) 
{
	$error = 'Ошибка при добавлении категории' . $e->getMessage();
	include '../../error.html.php';
	exit();
}
header('Location: . ');
exit();	
}
header('Location:' . $_SERVER['DOCUMENT_ROOT'] . '/cpanel/product/product.php');
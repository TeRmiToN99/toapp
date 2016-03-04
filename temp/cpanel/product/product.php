<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
if ((isset($_GET ['add']))||(isset ($_GET['add_prod']))){
	include $_SERVER['DOCUMENT_ROOT'] . 'tmpl/form.html.php';
	exit();
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
if(isset($_POST['add_prod']))
{
	include 'Location: . ';
}
	include 'product.html.php';
?>
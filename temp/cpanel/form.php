<?
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/cpanel/models/category.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/function.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/cpanel/models/ing.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/tamplates/toapp/index_html.php';

$pdo = db_connect();
if(isset($_GET['action'])){ 
	$action =$_GET['action'];
} else{
    $action = "";
}
$pageTitle = "Добавить ";
switch ($action) {
    case 'add_prod':
        $pageTitle = $pageTitle + 'блюдо';
        continue;
    case 'add_cat':
        $pageTitle = $pageTitle + 'категорию';
        continue;
    case 'add_news':
        $pageTitle = $pageTitle + 'новость';
        continue;
    default;
        $pageTitle = "Заголовок не определен. ошибка.";
        continue;
}
if($action == ("add_prod" || "add_cat" || "add_news") ){

    $categories = category_all($pdo);
    include 'views/form.php';
}
?>
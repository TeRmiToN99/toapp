<?
    require_once("includes/db.inc.php");
    require_once("models/category.php");
    require_once $_SERVER['DOCUMENT_ROOT'] . '/tamplates/toapp/index_html.php';
    $pdo = db_connect();
    $categories = category_all($pdo);

    include("views/categories.php");
    include("views/article.php");
?>
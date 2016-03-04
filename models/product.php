<?
//вывод всех блюд
function products_all($pdo){
    try {
        $query = "SELECT * FROM product";
		$result = $pdo->query($query);
	} catch (PDOException $e) {
		$error = 'Ошибка при извлечении категорий из базы данных.';
		include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
		exit();
	}
    foreach ($result as $row) {
	$products[] = array(
		'id' => $row['id'],
		'title' => $row['title'],
        'add_date' => $row['add_date'],
        'description' => $row['description']
	);
}
    return $products;
}
// вывод списка блюд категории
/* Изменить запрос на вывод заголовков категории*/
function products_get($pdo, $categoryid){   
    $select = "SELECT * FROM product";
    $from = ' INNER JOIN categoryproduct ON product.id = productid';
    $where = " AND categoryid = " .$categoryid ;
    try {
        $query = $select . $from . $where;
		$result = $pdo->query($query);
	} catch (PDOException $e) {
		$error = 'Ошибка при извлечении категорий из базы данных. '.$e;
		include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
		exit();
	}
    foreach ($result as $row) {
	$products[] = array(
		'id' => $row['id'],
		'title' => $row['title'],
        //'cat_title' => $row['title'],
        'img_path' => $row['img_path'],
        'add_date' => $row['add_date'],
        'description' => $row['description']
	);
}
    return $products;
}
//вывод карточки блюда по id
function product_get($pdo, $id){
    try {
		$query ="SELECT * FROM product WHERE id =" . $id;
		$result = $pdo->query($query);
	} catch (PDOException $e) {
		$error = 'Ошибка при извлечении блюда из базы данных. '.$e;
		include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
		exit();
	}
    //while ($row = $result->fetch()) {
    foreach ($result as $row) {
	$product = array(
		'id' => $row['id'],
		'title' => $row['title'],
        'img_path' => $row['img_path'],
        'weigth' => $row['weigth'],
        'add_date' => $row['add_date'],
        'description' => $row['description']
	);
}
    //print_r($product);
    return $product;
}

//получение технической карты блюда
function tehcart_get($pdo, $productid){
    $select = 'SELECT * FROM tehing';
    $from = ' INNER JOIN tehcart ON id = tehingid';
    $where = " AND productid = " . $productid;
try {
    $query = $select . $from . $where;
    $result = $pdo->query($query);
} catch (PDOExeption $e){
    $error = 'Ошибка при извлечении блюда из базы данных.';
    include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
    exit();
}
    foreach ($result as $row){
    $tehcart[] = array(
        'id' => $row['id'],
		'title' => $row['title'],
        'gross' => $row['gross'],
        'net' => $row['net']
	);
    }
     return $tehcart;
}

function get_title_category($pdo, $categoryid){
try {
    $query = "SELECT title FROM category WHERE id = " . $categoryid;
    $result = $pdo->query($query);
} catch (PDOException $e) {
    $error = 'Ошибка при извлечении категорий из базы данных. '.$e;
    include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
    exit();
}   
    foreach ($result as $row){
    $category = array(
		'title' => $row['title']
	);
    }
     return $category;
}
<?
function product_all($pdo){
     try {
         $query = "SELECT * FROM product";
		 $sth = $pdo->prepare($query);
         $sth->execute();
         $result = $sth->fetchAll();
	} catch (PDOException $e) {
		$error = 'Ошибка при извлечении категорий из базы данных.';
		include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
		exit();
	}
    foreach ($result as $row) {
	$products[] = array(
		'id' => $row['id'],
		'title' => $row['title'],
        'img_path' => $row['img_path'],
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
    $where = " AND categoryid = :categoryid";
    try {
        $query = $select . $from . $where;
		$sth = $pdo->prepare($query);
        $sth->execute([':categoryid'=> $categoryid]);
        $result = $sth->fetchAll();
	} catch (PDOException $e) {
		$error = 'Ошибка при извлечении товаров из базы данных. '.$e;
		include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
		exit();
	}
    foreach ($result as $row) {
	$products[] = array(
		'id' => $row['id'],
		'title' => $row['title'],
        'img_path' => $row['img_path'],
        'add_date' => $row['add_date'],
        'description' => $row['description']
	);
}
    return $products;
}
// Вывод полной карточки товара
function product_get($pdo, $id){
    try {
        $query = "SELECT * FROM product WHERE id = " .$id;
		$result = $pdo->query($query);
    } catch (PDOException $e) {
        $error = 'Ошибка при извлечении категорий из базы данных.';
		include __DIR__ . '/error.html.php';
		exit();
    }
    foreach ($result as $row) {
        $product = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'img_path' => $row['img_path'],
            'weigth' => $row['weigth'],
            'add_date' => $row['add_date'],
            'description' => $row['description'],
            'content' => $row['content']
        );
    }
    return $product;
} 

//получение технической карты товара
/*function tehcart_get($pdo, $productid){
    $select = 'SELECT * FROM tehing';
    $from = ' INNER JOIN tehcart ON id = tehingid';
    $where = ' AND productid = :id';
try {
    $query = $select . $from . $where;
    $sth = $pdo->prepare($query);
    $sth->execute([':id' => $productid]);
    $result = $sth->fetchAll();
} catch (PDOExeption $e){
    $error = 'Ошибка при извлечении блюда из базы данных.';
    include __DIR__ . '/error.html.php';
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
}*/
//Добавляем товар и техническую карту в базу данных
function product_add($pdo, $categoryid, $title, $weigth, $add_date, $description, $img_path){
    if ($title == "")
        return false;
    try{
        //$query = "INSERT INTO product (title, weigth, img_path, add_date, description ) VALUES ( $title, $weigth, $img_path, $add_date, $description)";
        $query = "INSERT INTO product VALUES
            title = :title,
            weigth = :weigth,
            img_path = :img_path,
            add_date = :add_date,
            description = :description
            ";
        $s = $pdo->prepare($query);
        //$s->bindValue(':id', $id, PDO::PARAM_INT);
        $s->bindValue(':title', $title, PDO::PARAM_STR);
        $s->bindValue(':weigth', $weigth, PDO::PARAM_STR);
        $s->bindValue(':img_path', $img_path, PDO::PARAM_STR);
        $s->bindValue(':add_date', $add_date, PDO::PARAM_STR);
        $s->bindValue(':description', $description, PDO::PARAM_STR);
        //$s->bindValue(':content', $content, PDO::PARAM_STR);
        $s->execute();
    }catch (PDOException $e){
        $error = "Ошибка при добавлении товара в базу данных" .$e->getMessage();
        include __DIR__ . '/error.html.php';
    }
    return $s;
}

// Изменяем товар в базе данных
function product_edit($pdo, $id, $title, $weigth, $add_date, $description, $img_path){
    $part1='UPDATE product SET ';
    $part2='';
    $part3='
        id = :id,
        title = :title,
        weigth = :weigth,
        img_path = :img_path,
        add_date = :add_date,
        description = :descrption
    ';
try{
    $query = $part1.$part2.$part3;
    $s = $pdo->prepare($query);
    $s->bindValue(':id', $id, PDO::PARAM_INT);
    $s->bindValue(':title', $title, PDO::PARAM_STR);
    $s->bindValue(':weigth', $weigth, PDO::PARAM_STR);
    $s->bindValue(':img_path', $img_path, PDO::PARAM_STR);
    $s->bindValue(':add_date', $add_date, PDO::PARAM_STR);
    $s->bindValue(':description', $description, PDO::PARAM_STR);
}catch (PDOException $e){
    $error = "Ошибка при добавлении товара в базу данных" .$e->getMessage();
    include __DIR__ . '/error.html.php';
    }
}

// Удаляем выделенный товар
function product_delete($pdo, $id){
        // Удаляем записи ингредиентов входящих в товар
    try{
        $query = "DELETE FROM tehcart WHERE productid = :id";
        $s = $pdo->prepare($query);
        $s->bindValue(':id',$id);
        $s->execute();
        $result = $s->rowCount();
    }catch(PDOException $e){
        $error = "Ошибка при удалении ингридиентов продукта" .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
        exit();
    }
    // Удаляем запись связки категория | товар
    try{
        $query = "DELETE FROM categoryproduct WHERE productid = :id";
        $s = $pdo->prepare($query);
        $s->bindValue('id', $id);
        $s->execute();
    }catch(PDOException $e){
        $error = "Ошибка при удалении категории продукта" .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
        exit();
    }
    // Удаляем запист о товаре
    try{
        $query = "DELETE FROM product WHERE id = :id";
        $s = $pdo->prepare($query);
        $s->bindValue(':id', $id);
        $s->execute();
    }catch(PDOException $e){
        $error = "Ошибка при удалении продукта" .$e;
        include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
        exit();
    }
    return $result;
}

function teh_add(){

}

// Выводит заголовки категории в списке ттоваров категории.
function get_title_category($pdo, $categoryid){
try {
    $query = "SELECT title, id FROM category WHERE id = :categoryid";
    $sth = $pdo->prepare($query);
    $sth-execute([':categoryid' => $categoryid]);
    $result = $sth->fetchAll();
} catch (PDOException $e) {
    $error = 'Ошибка при извлечении категорий из базы данных. '.$e;
    include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
    exit();
}
    foreach ($result as $row){
    $category = array(
		'title' => $row['title'],
        'id' => $row['id']
	);
    }
     return $category;
}
?>
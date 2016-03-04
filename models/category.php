<?
function category_all($pdo){
 try {
        $query = "SELECT * FROM category";
		$result = $pdo->query($query);
	} catch (PDOException $e) {
		$error = 'Ошибка при извлечении категорий из базы данных.';
		include $_SERVER['DOCUMENT_ROOT'] . 'error.html.php';
		exit();
	}
    foreach ($result as $row) {
	$categories[] = array(
		'id' => $row['id'],
		'title' => $row['title'],
	);
}
    return $categories;
}
?>
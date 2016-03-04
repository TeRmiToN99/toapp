<?
function category_all($pdo)
{
    try {
        $query = "SELECT * FROM category";
        $result = $pdo->query($query);
    } catch (PDOException $e) {
        $error = 'Ошибка при извлечении категорий из базы данных. ' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
        exit();
    }
    foreach ($result as $row) {
        $categories[] = array(
            'id' => $row['id'],
            'title' => $row['title']
        );
    }
    return $categories;
}

function category_get($pdo, $id)
{
    try {
        $query = "SELECT * FROM category WHERE id = :id";
        $sth = $pdo->prepare($query);
        $sth->execute([':id' => $id]);
        $result = $sth->fetchAll();
    } catch (PDOExсeption $e) {
        $error = "Ошибка при извлечении категории из базы данных. " . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
        exit();
    }
    foreach ($result as $row) {
        $category = array(
            'id' => $row['id'],
            'title' => $row['title']
        );
    }
    return $category;
}

function category_add($pdo, $title)
{
    //Убираем все лишнее
    $title = trim($title); // удаляем пробелы
    if ($title == "")
        return false;
    try {
        // Запрос вставки
        //$q = "INSERT INTO category (id, title, img_path) VALUES ( '', '%s', '')";
        // $query = sprintf($q, mysqli_real_escape_string($pdo, $title));
        //echo $query;
        $query = "INSERT INTO category (title, img_path) VALUES ( '" . $title . "', '')";
        $result = $pdo->query($query);
    } catch (PDOExeption $e) {
        $error = 'Ошибка при извлечении категорий из базы данных. ' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
        exit();
    }
    return true;
}

function category_del($pdo, $id)
{
    try {
        $query = "DELETE FROM category WHERE id = :id";
        $s = $pdo->prepare($query);
        $s->bindValue(':id', $id);
        $s->execute();
    } catch (PDOExeption $e) {
        $error = 'Ошибка при удалении из базы данных. ' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
        exit();
    }
    return true;
}

function category_edit($pdo, $id, $title)
{
    //Убираем все лишнее
    $title = trim($title); // удаляем пробелы
    $id = (int)$id;

    if ($title == "")
        return false;
    try {
        $query = "UPDATE category SET
            title = :title
            WHERE id = :id";
        $s = $pdo->prepare($query);
        $s->bindValue(':id', $id, PDO::PARAM_INT);
        $s->bindValue(':title', $title, PDO::PARAM_STR);
        $s->execute();
    } catch (PDOExeption $e) {
        $error = 'Ошибка при извлечении категорий из базы данных. ' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
        exit();
    }
    return true;
}
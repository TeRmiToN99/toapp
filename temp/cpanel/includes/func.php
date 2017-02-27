<?
/*Доработать*/
function getUser($pdo, $nameUser){
    try{
        $query = "SELECT * user WHERE login=" .$nameUser;
        $result = $pdo->$query($query);
    }catch(PDOExeption $e){
        $error = "Ошибка при извлечении пользователя" . $e;
        include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
        exit();
    }
    foreach($result as $row){
        $users[] = array(
            'userName' => $row['username'],
            'login' => $row['login']
        );
    }
    return $users;
}
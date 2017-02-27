<?
/*Вспомогательные функции*/

/*Функция обработки введенных пользователем данных*/
function html($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function htmlout($text)
{
    echo html($text);
}

//Обрезание строки на задданое количество
//символов заданное в переменной $len
function text_intro($text, $len = 100)
{
    return mb_substr($text, 0, $len);
}

function get_user(){
    try{
        //подготавливаем запрос к подключению к БД, шаблон
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=toapp', 'root', '',
            [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]);
        //
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //подготавливаем запрос к выполнению, шаблон
        $sth = $dbh->prepare('SELECT * FROM users WHERE id = :id');
        //Выполняет подготовленный запрос с передаными значениями в псевдопеременные
        $sth->execute([':id' =>$_GET['id']]);
        $res = $sth->fetchAll();

        //var_dump($res);

    }catch (PDOException $e){
        echo $e->getMessage();
    }

}
//get_user();


function search($text, $table, $pdo){
try{
    $select = 'SELECT * ';
    $from = 'FROM ' . $table;
    if ($text != ""){
        $where = ' WHERE title LIKE :title';
        $placeholder[':title'] = '%' . $text . '%';
    }else
        $where = ' WHERE TRUE ';

    $query = $select . $from . $where;

    $sth = $pdo->prepare($query);
    $sth->execute($placeholder);
    $result = $sth->fetchAll();
}catch (PDOException $e){
    $error = "Ошибка при извлечении категории из базы данных. " . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'] . '/error.html.php';
    exit();
}
    foreach ($result as $row) {
        $search = array(
            'id' => $row['id'],
            'title' => $row['title']
        );
    }
    return $search;
}
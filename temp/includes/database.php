<?
define('MYSQL_SERVER', 'localhost');
define('MYSQL_DB', 'toapp');
define('MYSQL_USER', 'toadm');
define('MYSQL_PASSWORD', '9911');

function db_connect(){
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
        or die('Error: '.mysqli_error($link));
    if(!mysqli_set_charset($link, "utf8")){
        printf("Error: ".mysqli_error($link))
    }
    return $link
}
?>
<?php
require_once __DIR__ . '/autoload.php';
$controller = new \App\Models\User();
$action = $_GET['action'] ?: 'Index';
include __DIR__ . '/App/templates/index_top.php';
try {
    $controller->action($action);
} catch(\App\Exceptions\Core $e){
    echo 'Возникло исключение ' . $e->getMessage();
}catch (\App\Exceptions\Db $e) {
    echo 'Проблемы с базой данных: ' . $e->getMessage();
}
include  __DIR__ . '/App/templates/index_bottom.php';

/*if (isset($_POST['submit'])) // Отлавливаем нажатие кнопки "Отправить"
{
    if (empty($_POST['login'])) // Если поле логин пустое
    {
        echo '<script>alert("Поле логин не заполненно");</script>'; // То выводим сообщение об ошибке
    }
    elseif (empty($_POST['password'])) // Если поле пароль пустое
    {
        echo '<script>alert("Поле пароль не заполненно");</script>'; // То выводим сообщение об ошибке
    }
    else  // Иначе если все поля заполненны


        if (empty($result['id'])) // Если запрос к бд не возвразяет id пользователя
        {
            echo '<script>alert("Неверные Логин или Пароль");</script>'; // Значит такой пользователь не существует или не верен пароль
        }
        else // Если возвращяем id пользователя, выполняем вход под ним
        {
            $_SESSION['password'] = $password; // Заносим в сессию  пароль
            $_SESSION['login'] = $login; // Заносим в сессию  логин
            $_SESSION['id'] = $result['id']; // Заносим в сессию  id
            echo '<div align="center">Вы успешно вощли в систему: '.$_SESSION['login'].'</div>'; // Выводим сообщение что пользователь авторизирован
        }
    }
}*/
<?php
require_once __DIR__ . '/../../autoload.php';
session_start();
$data = $_POST;
if ( isset($data['login']) ) {
    $user = \App\Models\User::findUser($data['login']);
    if ($user) {
        if (\App\Models\User::passVerify($data['password'], $user[0]->password)) {
            //если пароль совпадает, то нужно авторизовать пользователя
            $_SESSION['logged_user'] = $user;
            $_SESSION['login'] = $user[0]->login;
            header("Location: index.php"); exit;
        } else {
            $errors[] = 'Неверно введен пароль!';
        }

    } else {
        $errors[] = 'Пользователь с таким логином не найден!';
    }

    if (!empty($errors)) {
        //выводим ошибки авторизации
        echo '<div id="errors" style="color:red;">' . array_shift($errors) . '</div><hr>';
    }
}
$controller = new \App\cpanel\Controllers\User();
$action = $_GET['action'] ?: 'Login';
include_once __DIR__ . '/../templates/index_top.php';
if('Index' == $action) {
    try{
        $controller->action($action);
    } catch(\App\Exceptions\Core $e){
        echo 'Возникло исключение ' . $e->getMessage();
    } catch (\App\Exceptions\Db $e) {
        echo 'Проблемы с базой данных: ' . $e->getMessage();
    }
}else{
    include __DIR__ . '/templates/login.php';
}

include  __DIR__ . '/templates/index_bottom.php';


/*if (isset($_POST['submit'])) // ����������� ������� ������ "���������"
{
    if (empty($_POST['login'])) // ���� ���� ����� ������
    {
        echo '<script>alert("���� ����� �� ����������");</script>'; // �� ������� ��������� �� ������
    }
    elseif (empty($_POST['password'])) // ���� ���� ������ ������
    {
        echo '<script>alert("���� ������ �� ����������");</script>'; // �� ������� ��������� �� ������
    }
    else  // ����� ���� ��� ���� ����������


        if (empty($result['id'])) // ���� ������ � �� �� ���������� id ������������
        {
            echo '<script>alert("�������� ����� ��� ������");</script>'; // ������ ����� ������������ �� ���������� ��� �� ����� ������
        }
        else // ���� ���������� id ������������, ��������� ���� ��� ���
        {
            $_SESSION['password'] = $password; // ������� � ������  ������
            $_SESSION['login'] = $login; // ������� � ������  �����
            $_SESSION['id'] = $result['id']; // ������� � ������  id
            echo '<div align="center">�� ������� ����� � �������: '.$_SESSION['login'].'</div>'; // ������� ��������� ��� ������������ �������������
        }
    }
}*/
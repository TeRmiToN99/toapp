<?php


namespace App\Controllers;

use App\Model;
use App\View;



class User extends Model
{
    protected $view;
    
    function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        //$this->beforeAction();
        return $this->$methodName();
    }

    public function beforeAction()
    {
        //$ex = new Db('Сообщение об исключении');
        //throw $ex;
    }

    public function actionIndex()
    {
        $this->view->blocktitle = 'Авторизация.';
        $this->view->display(__DIR__ . '/../templates/login.php');
    }
/*
    public function DataCompare($login, $password)
    {
        $password = md5($password);
        setcookie('login', $login, time() + 3600 * 24 * 31);
        $_SESSION['login'] = $login; //создание сессии пользователя
        $user = \App\Models\User::findUser($login);
        return $user;
    }
*/
    public function actionLogin(){
        session_start();
        if (isset($_SESSION['logged_user'])) {
            //$login = $_POST['login'];
            //$password = $_POST['password'];
            //$this->DataCompare($login, $password);
            header("location: index.php");
        } else {
            require __DIR__ . '/../../error.php';
            //header("location: error.php"); //ошибка ввода
        }
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION['logged_user']);
        //header('Location: /');
        session_destroy();
        include_once(__DIR__ . '/../templates/index_location.php');
    }

   
}
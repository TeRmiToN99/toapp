<?php


namespace App\cpanel\Controllers;

use App\cpanel\Model;
use App\cpanel\View;



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
        $user = \App\cpanel\Models\User::findUser($login);
        if($user[0]->password == $password){
            return true;
        }else{
            return false;
        }
    }

    public function actionLogin(){
        session_start();
        if (isset($_POST['login'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $val= $this->DataCompare($login, $password);
            if($val){
                setcookie('login', $login, time() + 3600 * 24 * 31);
                $_SESSION['login'] = $login; //создание сессии пользователя
                $this->view->msg = 'Логин и пароль верны. ';
            }else{
                $this->view->msg = 'Авторизация не удалась. <br>Пара логин пароль не верны.';
            }
            //header("location: index.php");
            header('Location: /App/cpanel/index.php');
        } else {
            header("location: login.php?page=error"); //ошибка ввода
        }

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
            header("location: error.php"); //ошибка ввода
        }
    }
    public function actionLogout(){
        session_start();
        unset($_COOKIE);
        unset($_SESSION);
        session_destroy();
        include_once (__DIR__ . '/../templates/index_location.php');
    }
}
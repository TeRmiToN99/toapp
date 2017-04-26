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

    protected function actionDataCompare($login)
    {
        //$password = md5($password);
        $user = \App\Models\User::findUser($login);
        $_SESSION['login'] = $login; //создание сессии пользователя
        return $user;
    }

    public function actionLogin(){
        session_start();
        if (isset($_POST['login'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $this->view->user = $this->actionDataCompare($login);
            $_SESSION['login'] = $login; //создание сессии пользователя
            header("location: index.php");
        } else {
            header("location: login.php?page=error"); //ошибка ввода
        }
    }

    public function actionLogout(){

    }
}
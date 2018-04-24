<?php

namespace App\cpanel\Controllers;

use App\Exceptions\Core;
use App\Exceptions\Db;
use App\MultiException;
use App\View;

class Option
{
    protected $view;

    function __construct()
    {
        $this->view = new View();
    }

    public function action($action){
        $methodName = 'action' .$action;
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
        $this->view->blocktitle = 'Все модификаторы.';
        $this->view->options = \App\cpanel\Models\Option::findAll();
        $this->view->display(__DIR__ . '/../templates/options.php');
    }

    public function actionDeleteOption(){
        $option = \App\cpanel\Models\Option::findById($_GET['option_id']);
        $this->view = new View();
        if ($option != '' && isset($option)){
            try{
                $option->delete();
            }catch (\Exception $e){
                $this->view->errors = $e;
                $e->getMessage();
                $this->view->display(__DIR__ . '/../templates/error.php');
            }
        }else{
            echo 'Ошибка, удалять нечего';
        }
        $this->view->display(__DIR__ . '/../templates/index_location.php');
    }
}
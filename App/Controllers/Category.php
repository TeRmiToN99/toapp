<?php

namespace App\Controllers;

use App\Exceptions\Core;
use App\Exceptions\Db;
use App\MultiException;
use App\View;

class Category
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
        $this->view->blocktitle = 'Все категори.';
        $this->view->categories = \App\Models\Category::findAll();
        $this->view->display(__DIR__ . '/../templates/categories.php');
    }
}
<?php
namespace App\Controllers;

use App\Exceptions\Core;
use App\Exceptions\Db;
use App\MultiException;
use App\View;

class Product
{
    protected $view;

    public function __construct()
    {
        $this->view = new View;
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
        $this->view->blocktitle = 'Все блюда.';
        $this->view->products = \App\Models\Product::findAll();
        $this->view->display(__DIR__ . '/../templates/products.php');
    }
}
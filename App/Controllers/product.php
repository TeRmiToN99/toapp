<?php

namespace App\Controllers;

use App\Models\Category;
use App\Exceptions\Core;
use App\Exceptions\Db;
use App\Models\Ingredient;
use App\MultiException;
use App\View;

class Product
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
        $this->view->blocktitle = 'Все блюда.';
        $this->view->products = \App\Models\Product::findAll();
        $this->view->categories = Category::findAll();
        $this->view->display(__DIR__ . '/../templates/products.php');
    }
    public function actionFindByIdCategory(){
        $this->view->products = \App\Models\Product::findByIdCategory($_GET['category_id']);
        $this->view->categories = Category::findAll();
        $this->view->blocktitle = 'Все блюда категории ';
        $this->view->display(__DIR__ . '/../templates/products.php');
    }
    public function actionFindById(){
        $this->view->product = \App\Models\Product::findById($_GET['product_id']);
        $category = Category::findById($this->view->product->category_id);
        $this->view->ingredients = Ingredient::findIngredientsById($_GET['product_id']);
        $this->view->product->category_url_img = $category->url_img;
        $this->view->display(__DIR__ . '/../templates/product.php');
    }
}
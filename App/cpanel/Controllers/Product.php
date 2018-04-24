<?php

namespace App\cpanel\Controllers;

use App\cpanel\Models\Category;
use App\cpanel\Models\Option;
use App\cpanel\Models\Ingredient;
use App\Exceptions\Core;
use App\Exceptions\Db;
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
        $this->view->products = \App\cpanel\Models\Product::findPoducts();
        $this->view->categories = Category::findAll();
        $this->view->display(__DIR__ . '/../templates/a_products.php');
    }
    public function actionFindByIdCategory(){
        $this->view->products = \App\cpanel\Models\Product::findByIdCategory($_GET['category_id']);
        $this->view->categories = Category::findAll();
        $this->view->blocktitle = 'Все блюда категории ';
        $this->view->display(__DIR__ . '/../templates/a_products.php');
    }
    public function actionFindById(){
        $this->view->product = \App\cpanel\Models\Product::findById($_GET['product_id']);
        $category = Category::findById($this->view->product->category_id);
        //$this->view->options = Option::findAll();
        $this->view->ingredients = Ingredient::findIngredientsById($_GET['product_id']);
        $this->view->product->category_title = $category->title;
        $this->view->display(__DIR__ . '/../templates/product.php');
    }

    public function actionDeleteProduct(){
        $product = \App\cpanel\Models\Product::findById($_GET['product_id']);
        $this->view = new View();
        if ($product != '' && isset($product)){
            try{
                 $product->delete();
            }catch (\Exception $e){
                $this->view->errors = $e;
                $e->getMessage();
                $this->view->display(__DIR__ . '/../templates/error.php');
            }
        }else{
            echo 'Ошибка, удалять нечего';
        }
        $this->view->display(__DIR__ . '/../templates/products_location.php');
    }
}
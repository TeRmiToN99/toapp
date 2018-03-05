<?php

namespace App\cpanel\Controllers;


use App\cpanel\Models\Article;
use App\cpanel\Models\Product;
use App\cpanel\View;
use App\cpanel\Models\User;

class Form
{
    protected $view;
    
    function __construct()
    {
        $this->view = new View();
    }

    public function action($action){
        $methodName = 'action'.$action;
        return $this->$methodName();
    }

    public function beforeAction(){

    }

    public function actionIndex(){

    }

    public function actionCategory(){
        $this->view->blocktitle = 'Добавить категорию';
        $this->view->categories = \App\cpanel\Models\Category::findAll();
        $this->view->display(__DIR__ . '/../templates/form_category.php');
    }

    public function actionUser(){
        $this->view->blocktitle = 'Добавить пользователя';
        $this->view->display(__DIR__ . '/../templates/form_user.php');
    }

    public function actionProduct(){
        $this->view->blocktitle = 'Добавить блюдо';
        $this->view->categories = \App\cpanel\Models\Category::findAll();
        $this->view->display(__DIR__ . '/../templates/form_product.php');
    }

    public function actionArticle(){
        $this->view->blocktitle = 'Добавить новость';
        $this->view->users = User::findAll();
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../templates/form_article.php');
    }

    public function actionUpdateProduct(){
        $this->view->blocktitle = 'Изменить товар';
        $this->view->product = Product::findById($_GET['product_id']);
        $this->view->categories = \App\cpanel\Models\Category::findAll();
        $this->view->display(__DIR__ . '/../templates/form_product.php');
    }

    public function actionUpdateArticle(){
        $this->view->blocktitle = 'Изменить новость';
        $this->view->article = Article::findById($_GET['article_id']);
        $this->view->display(__DIR__ . '/../templates/form_article.php');
    }
}
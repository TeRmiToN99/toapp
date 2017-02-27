<?php

namespace App\cpanel\Controllers;


use App\cpanel\Models\News;
use App\cpanel\View;

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

    public function actionNews(){
        $this->view->blocktitle = 'Добавить новость';
        $this->view->allnews = News::findAll();
        $this->view->display(__DIR__ . '/../templates/form_news.php');
    }
    
}
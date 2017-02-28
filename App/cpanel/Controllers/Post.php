<?php

namespace App\cpanel\Controllers;


use App\cpanel\Models\Category;
use App\cpanel\Models\News;
use App\cpanel\View;
use App\cpanel\Models\User;

class Post
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
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
        var_dump($this->data);
        die();
        $addcategory = new Category();
        $addcategory->insert($this->data);
        return true;
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
        $this->view->users = User::findAll();
        $this->view->allnews = News::findAll();
        $this->view->display(__DIR__ . '/../templates/form_news.php');
    }
    
}
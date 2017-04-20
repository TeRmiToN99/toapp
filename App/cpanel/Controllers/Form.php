<?php

namespace App\cpanel\Controllers;


use App\cpanel\Models\News;
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
        $this->view->blocktitle = '�������� ���������';
        $this->view->categories = \App\cpanel\Models\Category::findAll();
        $this->view->display(__DIR__ . '/../templates/form_category.php');
    }

    public function actionUser(){
        $this->view->blocktitle = '�������� ������������';
        $this->view->display(__DIR__ . '/../templates/form_user.php');
    }

    public function actionProduct(){
        $this->view->blocktitle = '�������� �����';
        $this->view->categories = \App\cpanel\Models\Category::findAll();
        $this->view->display(__DIR__ . '/../templates/form_product.php');
    }

    public function actionNews(){
        $this->view->blocktitle = '�������� �������';
        $this->view->users = User::findAll();
        $this->view->allnews = News::findAll();
        $this->view->display(__DIR__ . '/../templates/form_news.php');
    }

    public function actionUpdateProduct(){
        $this->view->blocktitle = '�������� �����';
        $this->view->product = Product::findById($_GET['product_id']);
        $this->view->categories = \App\cpanel\Models\Category::findAll();
        $this->view->display(__DIR__ . '/../templates/form_product.php');
    }
    
}
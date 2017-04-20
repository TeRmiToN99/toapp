<?php

namespace App\cpanel\Controllers;


use App\cpanel\Models\Category;
use App\cpanel\Models\News;
use App\cpanel\Models\Product;
use App\cpanel\View;
use App\cpanel\Models\User;

class Post
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function action($action, $post_type=''){
        if ('Insert' == $action && '' != $post_type) {
            $methodName = 'insert' . $post_type;
            return $this->$methodName();
        }elseif('' == $post_type){
            $methodName = 'action' . $action;
            return $this->$methodName();
        }elseif('Update' == $action && '' != $post_type){
                $methodName = 'update' . $post_type;
                return $this->$methodName();
        }else{
            echo '����������� �����';
        }
    }

    public function beforeAction(){

    }

    public function actionIndex(){

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
    public function insertCategory(){
        $this->category = new Category();
        $this->category->preInsert($this->data);
        $this->category->insert();
        $res = '�������';
        $this->view = new View();
        $_POST['message'] = '���������� ��������� ��������� ' . $res;
        $this->view->categories = Category::findAll();
        $this->view->page = 'index.php';
        $this->view->display(__DIR__ . '/../templates/index_location.php');
        //echo '<div class="col-sm-12 col-md-12 well">���������� ��������� ��������� ' . $this->res . '</div>
    }

    public function insertProduct(){
        $this->product = new Product();
        if (true == $this->product->uploadImage($_FILES['url_img'])){
            $this->product->uploadTechCart($_FILES['tech_cart23']);
            $this->product->uploadTechCart($_FILES['tech_cart33']);
            $message = '�������';
            $this->product->preInsert($this->data);
            $this->product->insert();
            $this->view = new View();
        }else{
            $message = '��������';
        }
        $_GET['message'] = '���������� ����� ��������� ' . $message;
        $this->view->page = 'index.php';
        $this->view->display(__DIR__ . '/../templates/index_location.php');
    }

    public function updateProduct(){
        $this->product = new Product();
        $this->product->uploadImage($_FILES['url_img']);
        $this->product->uploadTechCart('23');
        $this->product->uploadTechCart('33');
        $this->product->preInsert($this->data);
        $this->product->update();
        $this->view = new View();
        $_GET['message'] = '���������� ����� ��������� ';
        $this->view->page = 'form.php?action=Product';
        //$this->view->display(__DIR__ . '/../templates/index_location.php');
    }
}
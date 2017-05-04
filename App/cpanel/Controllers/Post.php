<?php

namespace App\cpanel\Controllers;


use App\cpanel\Models\Category;
use App\cpanel\Models\News;
use App\cpanel\Models\Product;
use App\cpanel\View;
use App\cpanel\Models\User;
use App\cpanel\MultiException;

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
            echo 'неизвестный метод';
        }
    }

    public function beforeAction(){

    }

    public function actionIndex(){

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


    public function insertUser(){
        $this->user = new User();
        $this->user->preInsert($this->data);
        $this->user->insert();
        $this->view = new View();
        $this->view->display(__DIR__ . '/../templates/index_location.php');
    }
    public function insertNews(){
        try
        {
            $this->article = new News();
            $this->article->preInsert($this->data);
            $this->article->insert();
            $this->view = new View();
        } catch (Exception $e) {
            $this->view->errors = $e;
        }
        $this->view->display(__DIR__ . '/../templates/index_location.php');
    }
    public function insertCategory(){
        $this->category = new Category();
        $this->category->preInsert($this->data);
        $this->category->insert();
        $this->view->res = 'Успешно';
        $this->view = new View();
        $this->view->categories = Category::findAll();
        $this->view->page = 'index.php';
        $this->view->display(__DIR__ . '/../templates/index_location.php');
        //echo '<div class="col-sm-12 col-md-12 well">Добавление категории произошло ' . $this->res . '</div>
    }

    public function insertProduct(){
        try{
            $this->product = new Product();
            if('' != $_FILES['url_img']){$this->product->uploadImage($_FILES['url_img']);}
            if('' != $_FILES['tech_cart23']){$this->product->uploadTechCart('23');}
            if('' != $_FILES['tech_cart33']){$this->product->uploadTechCart('33');}
            $this->product->preInsert($this->data);
            $this->product->insert();
            $this->view = new View();
            $this->view->page = 'index.php';
            $this->view->display(__DIR__ . '/../templates/index_location.php');
        } catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }

    }

    public function updateProduct(){
        try{
        $this->product = new Product();
        if('' != $_FILES['url_img']){$this->product->uploadImage($_FILES['url_img']);}
        if('' != $_FILES['tech_cart23']){$this->product->uploadTechCart('23');}
        if('' != $_FILES['tech_cart33']){$this->product->uploadTechCart('33');}
        $this->product->preInsert($this->data);
        $this->product->update();
        $this->view = new View();
        $_GET['message'] = 'Добавление блюда произошло ';
        $this->view->page = 'form.php?action=Product';
        $this->view->display(__DIR__ . '/../templates/index_location.php');
        } catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }
    }

}
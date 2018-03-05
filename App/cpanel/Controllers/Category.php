<?php

namespace App\cpanel\Controllers;

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
        $this->view->blocktitle = 'Все категории.';
        $this->view->categories = \App\cpanel\Models\Category::findAll();
        $this->view->display(__DIR__ . '/../templates/a_categories.php');
    }

    public function actionDeleteCategory(){
        $category = \App\cpanel\Models\Category::findById($_GET['category_id']);
        $this->view = new View();
        if ($category != '' && isset($category)){
            try{
                $category->delete();
            }catch (\Exception $e){
                $this->view->errors = $e;
                $e->getMessage();
                $this->view->display(__DIR__ . '/../templates/error.php');
            }
        }else{
            echo 'Ошибка, удалять нечего';
        }
        $this->view->display(__DIR__ . '/../templates/index_location.php');
    }
}
<?php

namespace App\cpanel\Controllers;

use App\Exceptions\Core;
use App\Exceptions\Db;
use App\MultiException;
use App\View;

class Ingredient
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
        $this->view->blocktitle = 'Все ингредиенты.';
        $this->view->ingredients = \App\cpanel\Models\Ingredient::findAll();
        $this->view->display(__DIR__ . '/../templates/ingredients.php');
    }

    public function actionDeleteIngredient(){
        $ingredient = \App\cpanel\Models\Ingredient::findById($_GET['ingredient_id']);
        $this->view = new View();
        if ($ingredient != '' && isset($ingredient)){
            try{
                $ingredient->delete();
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
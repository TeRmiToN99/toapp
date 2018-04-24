<?php

namespace App\cpanel\Controllers;


use App\cpanel\Models\Article;
use App\cpanel\Models\Product;
use App\cpanel\Models\Category;
use App\cpanel\Models\Ingredient;
use App\cpanel\Models\Option;
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
        $this->view->categories = Category::findAll();
        $this->view->display(__DIR__ . '/../templates/form_category.php');
    }

    public function actionUser(){
        $this->view->blocktitle = 'Добавить пользователя';
        $this->view->display(__DIR__ . '/../templates/form_user.php');
    }

    public function actionProduct(){
        $this->view->blocktitle = 'Добавить блюдо';
        $this->view->categories = Category::findAll();
        $this->view->ingredients = Ingredient::findAll();
        $this->view->options = Option::findAll();
        $this->view->display(__DIR__ . '/../templates/form_product.php');
    }

    public function actionIngredient(){
        $this->view->blocktitle = 'Добавить Ингредиент';
        $this->view->ingredients = Ingredient::findAll();
        $this->view->display(__DIR__ . '/../templates/form_ingredient.php');
    }
    public function actionOption(){
        $this->view->blocktitle = 'Добавить Модификатор';
        $this->view->options = Option::findAll();
        $this->view->display(__DIR__ . '/../templates/form_option.php');
    }

    public function actionArticle(){
        $this->view->blocktitle = 'Добавить новость';
        $this->view->users = User::findAll();
        $this->view->articles = Article::sampleArticleUser();
        $this->view->display(__DIR__ . '/../templates/form_article.php');
    }

    public function actionUpdateProduct(){
        $this->view->blocktitle = 'Изменить товар';
        $this->view->product = Product::findById($_GET['product_id']);
        $this->view->categories = Category::findAll();
        $this->view->options = Option::findAll();
        $this->view->ingredient = Ingredient::findIngredientsById($_GET['product_id']);
        $this->view->ingredients = Ingredient::findAll();
        $this->view->display(__DIR__ . '/../templates/form_product.php');
    }

    public function actionUpdateArticle(){
        $this->view->blocktitle = 'Изменить новость';
        $this->view->users = User::findAll();
        $this->view->article = Article::findById($_GET['article_id']);
        $this->view->articles = Article::sampleArticleUser();
        $this->view->display(__DIR__ . '/../templates/form_article.php');
    }
    public function actionUpdateCategory(){
        $this->view->blocktitle = 'Изменить категорию';
        $this->view->category = Category::findById($_GET['category_id']);
        $this->view->display(__DIR__ . '/../templates/form_category.php');
    }
    public function actionUpdateIngredient(){
        $this->view->blocktitle = 'Изменить ингредиент';
        $this->view->ingredient = Ingredient::findById($_GET['ingredient_id']);
        $this->view->display(__DIR__ . '/../templates/form_ingredient.php');
    }

    public function actionUpdateOption(){
        $this->view->blocktitle = 'Изменить модификатор';
        $this->view->option = Option::findById($_GET['option_id']);
        $this->view->display(__DIR__ . '/../templates/form_option.php');
    }
}
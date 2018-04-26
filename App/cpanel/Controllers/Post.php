<?php

namespace App\cpanel\Controllers;


use App\cpanel\Models\Category;
use App\cpanel\Models\Article;
use App\cpanel\Models\Ingredient;
use App\cpanel\Models\Option;
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
            return 'неизвестный метод';
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
        $this->view->allnews = Article::findAll();
        $this->view->display(__DIR__ . '/../templates/form_article.php');
    }


    public function insertUser(){
        try{
            $this->user = new User();
            $this->user->preInsert($this->data);
            $this->user->insert();
            $this->view = new View();
        }catch (Exception $e){
            $this->view->errors = $e;
        }

        $this->view->display(__DIR__ . '/../templates/index_location.php');
    }

    public function insertArticle(){
        $page = 'articles.php';
        try{
            $this->article = new Article();
            $this->article->preInsert($this->data);
            $this->article->insert();
            $this->view = new View();
            $this->view->res = 'Успешно';
        } catch (Exception $e) {
            $this->view->errors = $e;
            //$this->view->display(__DIR__ . '/../templates/errors.php');
        }
        $this->view->display(__DIR__ . '/../templates/index_location.php');
    }

    public function insertCategory(){
        $page = 'index.php';
        try{
            $this->category = new Category();
            if('' != $_FILES['url_img']){$this->category->uploadImage($_FILES['url_img']);}
            $this->category->preInsert($this->data);
            $this->category->insert();
            $this->view = new View();
            $this->view->res = 'Успешно';
            $this->view->categories = Category::findAll();
            $this->view->display(__DIR__ . '/../index.php');
        }catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }
    }

    public function insertProduct(){
        try{
            $this->product = new Product();
            if('' != $_FILES['url_img']){$this->product->uploadImage($_FILES['url_img']);}
            $this->product->preInsert($this->data);
            $this->product->insert();
            $this->view = new View();
            $this->view->res = 'Успешно';
            $this->view->page = 'products.php';
            $this->view->display(__DIR__ . '/../templates/products_location.php');
        } catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }

    }

    public function insertIngredient(){
        try{
            $this->ingredients = new Ingredient();
            if('' != $_FILES['url_img']){$this->ingredients->uploadImage($_FILES['url_img']);}
            $this->ingredients->preInsert($this->data);
            $this->ingredients->insert();
            $this->view = new View();
            $this->view->res = 'Успешно';
            $this->view->page = 'ingredients.php';
            $this->view->display(__DIR__ . '/../templates/ingredient_location.php');
        } catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }
    }

    public function insertOption(){
        try{
            $this->option = new Option();
            if('' != $_FILES['url_img']){$this->option->uploadImage($_FILES['url_img']);}
            $this->option->preInsert($this->data);
            $this->option->insert();
            $this->view = new View();
            $this->view->res = 'Успешно';
            $this->view->page = 'options.php';
            $this->view->display(__DIR__ . '/../templates/option_location.php');
        } catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }
    }
    public function updateOption(){
        try{
            $this->option = new Option();
            if('' != $_FILES['url_img']){$this->option->uploadImage($_FILES['url_img']);}
            $this->option->preInsert($this->data);
            $this->option->update();
            $this->view = new View();
            $this->view->res = 'Успешно';
            $this->view->page = 'form.php?action=Option';
            $this->view->display(__DIR__ . '/../templates/option_location.php');
        } catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }
    }
    public function updateIngredient(){
        try{
            $this->ingredient = new Ingredient();
            if('' != $_FILES['url_img']){$this->ingredient->uploadImage($_FILES['url_img']);}
            $this->ingredient->preInsert($this->data);
            $this->ingredient->update();
            $this->view = new View();
            $this->view->res = 'Изменение прошло успешно';
            $this->view->page = 'form.php?action=Ingredient';
            $this->view->display(__DIR__ . '/../templates/ingredient_location.php');
        } catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }
    }

    public function updateProduct(){
        try{
            $this->product = new Product();
            if(' ' != $_FILES['url_img']){
                $this->product->uploadImage($_FILES['url_img']);
            }
            //if('' != $_FILES['tech_cart23']){$this->product->uploadTechCart('23');}
            //if('' != $_FILES['tech_cart33']){$this->product->uploadTechCart('33');}$this->product->preInsert($this->data);
            $this->product->preInsert($this->data);
            $ingredients = $this->product->withDrawIngredientAndOption();
            $this->product->update();
            if(0 != count($ingredients)){
                $this->ingredient = new Ingredient();
                //$this->ingredient->deleteIngredientsToProduct($this->product->id);
                foreach ($ingredients as $ingredient){
                    (array)$val = $this->ingredient->findByIdIngredientAndProduct((int)$ingredient['ingredient_id'], (int)$ingredient['product_id']);
                    $this->ingredient->preInsert($ingredient);
                    if($val == false){
                        echo('Вставка <br>');
                        $this->ingredient->insertLinkIngredients();
                    }elseif($val != false || $val != ''){
                        echo('Обновление <br>');
                        $this->ingredient->updateLinkIngredients();
                    }else{
                        echo 'Произошло прерывание процесса сохрание данных в БД по неизвестной ошибке.';
                        var_dump($val);
                        die();
                    }
                }
            }
            $this->view = new View();
            $this->view->res = 'Обновление блюда произошло ';
            $this->view->page = 'form.php?action=Product';
            $this->view->display(__DIR__ . '/../templates/products_location.php');
        } catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }
    }

    public function updateCategory(){
        try{
            $this->category = new Category();
            if('' != $_FILES['url_img']){$this->category->uploadImage($_FILES['url_img']);}
            $this->category->preInsert($this->data);
            $this->category->update();
            $this->view = new View();
            $this->view->res = 'Изменение категории произошло ';
            $this->view->page = 'form.php?action=Category';
            $this->view->display(__DIR__ . '/../templates/category_location.php');
        } catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }
    }
    public function updateArticle(){
        try{
            $this->article = new Article();
            $this->article->preInsert($this->data);
            $this->article->update();
            $this->view = new View();
            $this->view->res = 'Изменение новости произошло ';
            $this->view->page = 'form.php?action=Article';
            $this->view->display(__DIR__ . '/../templates/article_location.php');
        } catch (Exception $e){
            $this->view->errors = $e;
            $this->view->display(__DIR__ . '/../templates/errors.php');
        }
    }
}
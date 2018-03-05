<?php

namespace App\cpanel\Controllers;

use App\cpanel\Model;
use App\Exceptions\Core;
use App\Exceptions\Db;
use App\MultiException;
use App\View;

class Article
{
    protected $view;

    function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
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
        $this->view->blocktitle = 'Новости.';
        $this->view->articles = \App\cpanel\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../templates/tmpl_articles.php');
    }

    protected function actionNew()
    {
        $id = (int)$_GET['id'];
        $this->view->article= \App\cpanel\Models\Article::findById($id);
        $this->view->display(__DIR__ . '/../templates/article.php');
    }

    protected function actionCreate(){
        try
        {
            $article = new \App\cpanel\Models\Article();
            $article->fill([]);
            $article->save();
        } catch (MultiException $e) {
            $this->view->errors = $e;
        }
            $this->view->display(__DIR__ . '/../templates/create.php');
    }
    public function actionDeleteArticle(){
        $article = \App\cpanel\Models\Article::findById($_GET['article_id']);
        $this->view = new View();
        if ($article != '' && isset($article)){
            try{
                $article->delete();
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
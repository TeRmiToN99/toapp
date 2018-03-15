<?php

namespace App\Controllers;


use App\Exceptions\Core;
use App\Exceptions\Db;
use App\MultiException;
use App\View;

class Article
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }

    public function beforeAction()
    {
        //$ex = new Db('Сообщение об исключении');
        //throw $ex;
    }

    public function actionIndex()
    {
        $this->view->blocktitle = 'Новости';
        $this->view->articles = \App\Models\Article::sampleArticleUser();
        $this->view->display(__DIR__ . '/../templates/articles.php');
    }
    public function actionBlog(){
        $this->view->blocktitle = 'Все новости:';
        $this->view->articles = \App\Models\Article::sampleArticleUser();
        $this->view->display(__DIR__ . '/../templates/articles_blog.php');
    }

    protected function actionNew()
    {
        $id = (int)$_GET['id'];
        $this->view->article= \App\Models\Article::findById($id);
        $this->view->display(__DIR__ . '/../templates/articles.php');
    }

    protected function actionCreate(){
        try
        {
            $article = new \App\Models\Article();
            $article->fill([]);
            $article->save();
        } catch (MultiException $e) {
            $this->view->errors = $e;
        }
            $this->view->display(__DIR__ . '/../templates/create.php');
    }
}
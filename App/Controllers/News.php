<?php

namespace App\Controllers;


use App\Exceptions\Core;
use App\Exceptions\Db;
use App\MultiException;
use App\View;

class News
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
        $this->view->blocktitle = 'Новости.';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/news.php');
    }

    protected function actionNew()
    {
        $id = (int)$_GET['id'];
        $this->view->article= \App\Models\News::findById($id);
        $this->view->display(__DIR__ . '/../templates/article.php');
    }

    protected function actionCreate(){
        try
        {
            $article = new \App\Models\News();
            $article->fill([]);
            $article->save();
        } catch (MultiException $e) {
            $this->view->errors = $e;
        }
            $this->view->display(__DIR__ . '/../templates/create.php');
    }
}
<?php

namespace App\cpanel\Models;


use App\cpanel\Model;

class Category
    extends Model
{
    const TABLE = 'categories';
    public $title;
    public $lead;

    public function __get($k){
        switch ($k){
            case 'user':
                return User::findById($this->user_id);
                break;
            default:
                return null;
        }
    }
    public function __isset($k)
    {
        switch ($k){
            case 'user':
                return !empty($this->user_id);
                break;
            default:
                return false;
        }
    }

    public function setTitle($str)
    {
        $this->title = trim($str);
    }

    public function fill($data = []){
        $e = new MultiException();
        if (true){
            $e[] = new \Exception('Заголовок неверный');
        }
        if (true){
            $e[] = new \Exception('Текст неверный');
        }
        throw $e;
    }
    
    public function preInsert($data){
        foreach ($data as $res => $val){
            $this->$res = $val;
        }
        return [];
    }
    
    public function uploadImage(){
        $root = '/App/images/categories/';
        if (isset($_FILES['url_img'])) {
            if (0 == $_FILES['url_img']['error']){
                $res = move_uploaded_file(
                    $_FILES['url_img']['tmp_name'],
                    $_SERVER['DOCUMENT_ROOT'] . $root . $_FILES['url_img']['name']
                );
                $this->url_img = $root . $_FILES['url_img']['name'];
            }
        }
        return $res;
    }
}
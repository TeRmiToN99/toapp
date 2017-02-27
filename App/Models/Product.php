<?php

namespace App\Models;


use App\Model;

class Product
    extends Model
{
    const TABLE = 'products';

    public $title;
    public $lead;
    public $description;
    public $category_id;

    public function __get($k){
        switch ($k){
            case 'category':
                return User::findById($this->category_id);
                break;
            default:
                return null;
        }
    }
    public function __isset($k)
    {
        switch ($k){
            case 'category':
                return !empty($this->category_id);
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
}
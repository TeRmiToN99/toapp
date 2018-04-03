<?php

namespace App\Models;


use App\Db;
use App\Model;

class Product
    extends Model
{
    const TABLE = 'products';
    const NOIMG = '/App/images/no-img.png';

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

    /*public function findAllwithCategory(){
        $db = Db::instance();
        return $db->query(
            'SELECT products.*, categories.url_img FROM ' . static::TABLE . 'INNER JOIN categories ' .
            'ON products.category_id = categories.id ',
            [], static::class
        );
    }*/
}
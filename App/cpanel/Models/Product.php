<?php

namespace App\cpanel\Models;


use App\cpanel\Model;

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

    public function preInsert($data){
        foreach ($data as $res => $val){
            $this->$res = $val;
        }
        return [];
    }

    public function uploadImage(){
    $root = '/App/images/products/';
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
    public function uploadTechCart(int $i){
        $file = $_FILES['tech_cart'.$i];
        $cart_name = 'tech_cart'.$i;
        $root = '/App/images/techcart/';
        if (isset($file)) {
            if (0 == $file['error']){
                $res = move_uploaded_file(
                    $file['tmp_name'],
                    $_SERVER['DOCUMENT_ROOT'] . $root . $file['name']
                );
                $this->$cart_name = $root . $file['name'];
            }
        }
        return $res;
    }
}
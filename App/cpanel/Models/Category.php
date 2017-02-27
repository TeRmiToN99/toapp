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
}
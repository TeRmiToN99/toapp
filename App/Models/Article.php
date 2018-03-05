<?php

namespace App\Models;


use App\Model;
use App\MultiException;

/**
 * Class Article
 * @package App\Models
 *
 * @property \App\Models\Author $author
 */

class Article
    extends Model
{
    const TABLE = 'articles';

    public $title;
    public $lead;
    public $user_id;

    /**
     * LAZY LOAD
     *
     * @param $k
     * @return null
     */
    public function __get($k)
    {
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
<?php

namespace App\cpanel\Models;


use App\cpanel\Model;
use App\MultiException;

/**
 * Class News
 * @package App\Models
 *
 * @property \App\Models\Author $author
 */

class News
    extends Model
{
    const TABLE = 'news';

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
}
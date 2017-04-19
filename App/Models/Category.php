<?php

namespace App\Models;


use App\Model;

class Category
    extends Model
{
    const TABLE = 'categories';
    public $title;
    public $lead;

    public function __get($k)
    {
        switch ($k) {
            case 'user':
                return User::findById($this->user_id);
                break;
            default:
                return null;
        }
    }

    public function __isset($k)
    {
        switch ($k) {
            case 'user':
                return !empty($this->user_id);
                break;
            default:
                return false;
        }
    }
}
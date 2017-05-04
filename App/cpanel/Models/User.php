<?php


namespace App\cpanel\Models;

use App\cpanel\Db;
use App\cpanel\Model;

class User extends Model
    implements HasEmail
{
    const TABLE = 'users';

    public $firstname;
    public $email;

    /**
     * Метод, возвращающий адрес e-mail
     * @deprecated
     * @return string Адрес электронной почты
     */
    public function getEmail()
    {
        return $this->email;
    }
    public function getName(){
        return $this->name;
    }
    public function __get($k){
        switch ($k){
            case 'user':
                return User::findById($this->user_id);
                break;
            default:
                return null;
        }
    }

    public function preInsert($data){
        foreach ($data as $res => $val){
            if('password' == $res){
                $val = md5($val);
            }
            $this->$res = $val;
        }
        return [];
    }

    public function findUser($login){
        if ($login != ' ') {
            $db = Db::instance();
            return $db->query(
                'SELECT * FROM ' . static::TABLE
                . ' WHERE login = :login',
                [':login' => $login],
                static::class
            );
        } else {
            return false;
        }
    }
}
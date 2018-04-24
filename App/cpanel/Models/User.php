<?php


namespace App\cpanel\Models;

use App\cpanel\Db;
use App\cpanel\Model;

class User extends Model
    implements HasEmail
{
    const TABLE = 'users';
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
    public function getLogin(){
        return $this->login;
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
                $val = User::cryptPass($val);
            }
            $this->$res = $val;
        }
        return [];
    }

    public function cryptPass($pass){
        return password_hash($pass, PASSWORD_ARGON2I);
    }

    public function passVerify(string $password , string $hash){
        return password_verify($password, $hash);
    }
}
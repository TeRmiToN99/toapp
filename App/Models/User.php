<?php


namespace App\Models;

use App\Db;
use App\Model;
include_once __DIR__ . '/../Db.php';

class User extends Model
    implements HasEmail
{
    const TABLE = 'users';

    public $name;
    public $email;
    public $password;

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

    public function getHashPass(){

        var_dump($this);
        return $this->this->password;
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

    public function cryptPass($pass){
        return password_hash($pass, PASSWORD_ARGON21);
    }

    public function passVerify(string $password , string $hash){
        return password_verify($password, $hash);
    }
}
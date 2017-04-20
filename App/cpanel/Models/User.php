<?php


namespace App\cpanel\Models;

use App\cpanel\Model;

class User extends Model
    implements HasEmail
{
    const TABLE = 'users';

    public $name;
    public $email;

    /**
     * �����, ������������ ����� e-mail
     * @deprecated
     * @return string ����� ����������� �����
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
}
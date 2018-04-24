<?php

namespace App\cpanel\Models;


use App\cpanel\Db;
use App\cpanel\Model;

class Option
    extends Model
{
    const TABLE = 'options';
    const URLICONS = '/App/images/icons/';

    //public $title;

    public function setTitle($str)
    {
        $this->title = trim($str);
    }

    public function fill($data = [])
    {
        $e = new MultiException();
        if (true) {
            $e[] = new \Exception('Заголовок неверный');
        }
        if (true) {
            $e[] = new \Exception('Текст неверный');
        }
        throw $e;
    }

    public function preInsert($data)
    {
        foreach ($data as $res => $val) {
            $this->$res = $val;
        }
        return [];
    }
    public function uploadImage()
    {
        $root = '/App/images/icons/';
        if (isset($_FILES['url_img'])) {
            if (0 == $_FILES['url_img']['error']) {
                $res = move_uploaded_file(
                    $_FILES['url_img']['tmp_name'],
                    $_SERVER['DOCUMENT_ROOT'] . $root . $_FILES['url_img']['name']
                );
                $this->url_img = $root . $_FILES['url_img']['name'];
            }
        }
        return $res;
    }
}
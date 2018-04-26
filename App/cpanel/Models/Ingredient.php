<?php

namespace App\cpanel\Models;


use App\cpanel\Db;
use App\cpanel\Model;

class Ingredient
    extends Model
{
    const TABLE = 'ingredients';
    const INGTOPRODTABLE = 'ingredienttoproduct';

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

    public static function findIngredientsToProduct()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ',
            [], static::class
        );
        //. 'DESC LIMIT :offset, :show_pages'
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
    public function deleteIngredientsToProduct($product_id){
        $sql = '';
        if ($product_id != ' ') {
            $sql = 'DELETE FROM ingredienttoproduct'
                . ' WHERE product_id = :product_id';
            $db = Db::instance();
            $db->query(
                $sql,
                [':product_id' => $product_id],
                static::class
            );
            return true;
        }else{
            return false;
        }
    }

    public function findIngredientsById(int $product_id)
    {
        if ($product_id != ' ') {
            $db = Db::instance();
            return $db->query(
                'SELECT 
                ingredients.*, ingredienttoproduct.weight1, ingredienttoproduct.weight2, 
                ingredienttoproduct.option_id, 
                options.url_img AS option_img, 
                options.title AS option_title
                FROM ingredients INNER JOIN ingredienttoproduct 
                ON ingredienttoproduct.ingredient_id = ingredients.id 
                LEFT JOIN options
                ON ingredienttoproduct.option_id = options.id
                WHERE ingredienttoproduct.product_id = :product_id
                ORDER BY id ASC
                ',
                [':product_id' => $product_id],
                static::class
            );
        } else {
            return false;
        }
    }

    public function insertLinkIngredients(){
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }
        $sql = 'INSERT INTO ingredienttoproduct '.'
            (' . implode(', ', $columns) . ')
             VALUES
             (' . implode(', ', array_keys($values)) . ')
             ';
        $db = Db::instance();
        return $db->query($sql, $values, static::class);
    }

    public function updateLinkIngredients(){
        $columns = [];
        $values = [];
        $str = '';
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
            $str =  $str . $k . ' = :' . $k . ', ';
        }
        $str = substr($str,0,-2);
        $sql = 'UPDATE ingredienttoproduct SET 
                '. $str .
            ' WHERE id = :id';
        $db = Db::instance();
        return $db->queryUpdate($sql, $values, static::class);
    }
}
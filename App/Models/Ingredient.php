<?php

namespace App\Models;


use App\Db;
use App\Model;

class Ingredient
    extends Model
{
    const TABLE = 'ingredients';
    const INGTOPRODTABLE = 'ingredienttoproduct';

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
                ',
                [':product_id' => $product_id],
                static::class
            );
        } else {
            return false;
        }
    }


}
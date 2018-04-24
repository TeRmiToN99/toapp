<?php

namespace App\cpanel\Models;


use App\cpanel\Model;
use Couchbase\Exception;

class Product
    extends Model
{
    const TABLE = 'products';

    public $title;
    public $category_id;

    public function __get($k){
        switch ($k){
            case 'category':
                return User::findById($this->category_id);
                break;
            default:
                return null;
        }
    }
    public function __isset($k)
    {
        switch ($k){
            case 'category':
                return !empty($this->category_id);
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

    public function uploadImage(){
    $root = '/App/images/products/';
    if (isset($_FILES['url_img'])) {
        if (0 == $_FILES['url_img']['error']){
            $res = move_uploaded_file(
                $_FILES['url_img']['tmp_name'],
                $_SERVER['DOCUMENT_ROOT'] . $root . $_FILES['url_img']['name']
            );
            $this->url_img = $root . $_FILES['url_img']['name'];
        }
    }
    return $res;
    }

    public function withDrawIngredientAndOption(){
        if($this->id != '') {
            $product_id = $this->id;
            $ingarray = $this;
            $ingredient[] = '';
            $ingredients[] = '';
            $x = 0;
            $i = 0;
            unset($ingredient);
            try{
                foreach ($ingarray as $v => $k){
                    if (strrpos($v, "weight") !== false) {
                        if (strrpos($v, "weight1") !== false) {
                            $s = (substr($v, 8, 10));
                            $ingredient['product_id'] = $product_id;
                                 $ingredient['ingredient_id'] = $s;
                                 $ingredient['weight1'] = $k;
                            $i++;
                            unset($this->$v);
                        }elseif(strrpos($v, "weight2") !== false) {
                            $ingredient['weight2'] = $k;
                            $i++;
                            unset($this->$v);
                        }
                    }
                    if (strrpos($v, "option") !== false) {
                        $k = (substr($v, 6, 10));
                        if ($k != '') {
                            if ($k == 'undefined') {
                                $k = null;
                            }
                            $ingredient['option_id'] = $k;
                        }
                        $i++;
                        unset($this->$v);
                    }
                    if($i == 3){
                        $i = 0;
                        $ingredients[$x] = $ingredient;
                        $x++;
                        unset($ingredient);
                    }
                }
                return $ingredients;
            }catch (Exception $e){
                echo $e->getMessage();
            }
            /*
             * $product_id = $this->id;
            $ingarray = $this;
            $ingredients[] = '';
            $array[] = '';
            $i=0;
            $x=0;
            try {
                foreach ($ingarray as $v => $k) {
                    if (strlen($v) > 0) {
                        if (strrpos($v, "weight") !== false) {
                            if (strrpos($v, "weight1") !== false) {
                                $s = (substr($v, 8, 10));
                                $array[$i]= [
                                    'product_id' => $product_id,
                                    'ingredient_id' => $s,
                                    'weight1' => $k
                                ];
                            }
                            if (strrpos($v, "weight2") !== false) {
                                $array[$i] = [
                                    'weight2' => $k
                                ];
                            }
                            unset($this->$v);
                        }
                        if (strrpos($v, "option") !== false) {
                            $k = (substr($v, 6, 10));
                            if ($k != '') {
                                if ($k == 'undefined') {
                                    $k = null;
                                }
                                $array[$i]= [
                                    'option' => $k
                                ];
                            }
                            unset($this->$v);
                        }
                        if ((array_key_exists('weight1', $array) == true) &&
                            (array_key_exists('weight2', $array) == true) &&
                            (array_key_exists('option', $array) == true)){
                            $ingredients[$i]=$array;
                            $i++;
                            unset($array);
                        }

                    }
                }
                var_dump($array);
                var_dump($ingredients);
                die();
                return $ingredients;
            } catch (Exception $e) {
                echo $e->getMessage();
            }*/
        }
    }

// deprecated!!!!!
    public function uploadTechCart(int $i){
        $file = $_FILES['tech_cart'.$i];
        $cart_name = 'tech_cart'.$i;
        $root = '/App/images/techcart/';
        if (isset($file)) {
            if (0 == $file['error']){
                $res = move_uploaded_file(
                    $file['tmp_name'],
                    $_SERVER['DOCUMENT_ROOT'] . $root . $file['name']
                );
                $this->$cart_name = $root . $file['name'];
            }
        }
        return $res;
    }
}
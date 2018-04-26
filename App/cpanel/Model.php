<?php
namespace App\cpanel;

abstract class Model
{
    const TABLE = '';
    //public static $table = 'users';
    public $id;
    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            [], static::class
        );
        //. 'DESC LIMIT :offset, :show_pages'
    }


    public static function findById(int $id)
    {
        if ($id != ' ') {
            $db = Db::instance();
            return $db->query(
                'SELECT * FROM ' . static::TABLE
                . ' WHERE id = :id',
                [':id' => $id],
                static::class
            )[0];
        } else {
            return false;
        }
    }
    public function isNew()
    {
        return empty($this->id);
    }
    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }

        $sql = '
            INSERT INTO ' . static::TABLE . '
            (' . implode(', ', $columns) . ')
             VALUES
             (' . implode(', ', array_keys($values)) . ')
             ';
        $db = Db::instance();
        return $db->query($sql, $values, static::class);
    }

    public static function findByIdCategory(int $id){
        if ($id != ' ') {
            $db = Db::instance();
            return $db->query(
                'SELECT * FROM ' . static::TABLE
                . ' WHERE category_id = :id',
                [':id' => $id],
                static::class
            );
        } else {
            return false;
        }
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

    public function findByIdIngredientAndProduct(int $ingredient_id, int $product_id){
        if ($ingredient_id != ' ' && $product_id != ' ') {
            $db = Db::instance();
            return $db->query(
                'SELECT * FROM ingredienttoproduct '
                . ' WHERE ingredient_id = :ingredient_id
                    AND product_id = :product_id
                ',
                [
                    ':ingredient_id' => $ingredient_id,
                    ':product_id' => $product_id
                    ],
                static::class
            );
        } else {
            return false;
        }
    }

    public function update(){
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
        $sql = 'UPDATE ' . static::TABLE . ' SET 
                '. $str .
                ' WHERE id = :id';
        $db = Db::instance();
        return $db->queryUpdate($sql, $values, static::class);
    }

    public function delete(){
        $id = $this->id;
        $sql = '';
        if ($id != ' ') {
            $sql = 'DELETE FROM ' . static::TABLE
                . ' WHERE id = :id';
            $db = Db::instance();
            $db->query(
                $sql,
                [':id' => $id],
                static::class
            );
            return true;
        }else{
            return false;
        }
    }

    public static function findPoducts()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY category_id ASC, title DESC',
            [], static::class
        );
        //. 'DESC LIMIT :offset, :show_pages'
    }

    public static function search(string $title)
    {
        if ($title != ' ') {
            $title = '%' . $title . '%';
            $db = Db::instance();
            return $db->query(
                'SELECT id, title FROM ' . static::TABLE
                . ' WHERE title LIKE :title',
                [':title' => $title],
                static::class
            );
        } else {
            return false;
        }
    }
}
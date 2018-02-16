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
}
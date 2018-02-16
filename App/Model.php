<?php

namespace App;


abstract class Model
{
    const TABLE = '';
    //public static $table = 'users';
    public $id;
    /**
     * The BeanHelper allows the bean to access the toolbox objects to implement
     * rich functionality, otherwise you would have to do everything with R or
     * external objects.
     *
     * @var BeanHelper
     */
    //protected $beanHelper = NULL;


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
}
<?php

class User
{
    public $id;
    public $name;

    function getUser($pdo, $id){
        try{
            $sth = $pdo->prepare('SELECT * FROM users WHERE id = :id');
            $sth->execute([':id' => $id]);
            $result = $sth->fatchAll(PDO::FETCH_CLASS, User::class);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $result;
    }
}
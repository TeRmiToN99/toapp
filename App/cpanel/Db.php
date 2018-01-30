<?php


namespace App\cpanel;


class Db
{
    use Singleton;

    protected $dbh;

   protected function __construct()
    {
        try{
            $this->dbh = new \PDO('mysql:host=localhost;dbname=toapp','root', '' );
            $this->dbh->exec('SET NAMES utf8');
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db($e->getMessage());
        }
    }
    public function execute($sql, $params = []){
        $sth = $this->dbh->prepare($sql, $params);
        $res = $sth->execute();
        return $res;
    }
    public function query($sql, $params, $class){
        try
        {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($params);
            if (false !== $res){
                return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
            }
        }catch (\PDOException $e){
            echo $e;
            die;
        }
        return [];
    }
    public function queryUpdate($sql, $params, $class){
        $sth = $this->dbh->prepare($sql);
        $params['id'] = $_POST['id'];
        $res = $sth->execute($params);
        if (false !== $res){
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

}
<?php

/**
 * Created by PhpStorm.
 * User: TeRmiT
 * Date: 21.03.2016
 * Time: 22:51
 */
class TextFile
{

}
class GuestBook extends TextFile{
//    protected $url;
    protected $resource;
    protected $data;
    public function __construct($fileurl)
    {
        //$res = file_get_contents($fileurl);
        $res = fopen($fileurl, 'r');
        while (!feof($res) ){
            $lines[] = fgets($res, 1024);
        }
        fclose($res);
        $this->data = $lines;
        return true;
    }

    public function getData(){
        $res = $this->data;
        foreach ($res as $re){
            echo $re;
        }
        return $res;
    }
    public function append($text){
        $this->data[] = $text;
    }
    public function save($fileurl){
        $data = $this->data;
        //$res = file_put_contents($fileurl, $data);
        $res = fopen($fileurl, 'w');
        fwrite($res, $data);
        fclose($res);
    }
}

$fileurl = __DIR__ . '/guest.txt';
$book = new GuestBook($fileurl);
$arr = $book->getData();
var_dump($arr);
var_dump($book);
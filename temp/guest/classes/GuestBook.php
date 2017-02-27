<?php

/**
 * Created by PhpStorm.
 * User: TeRmiT
 * Date: 21.03.2016
 * Time: 22:51
 */
class GuestBook
{
    protected $url;
    protected $data;
    public $text;
    public function __construct($path)
    {
        $this->url = $path;
        $this->data = file($path);
    }

    public function getData(){
        return $this->data;
    }
    public function append($text){
        $this->data[] = $text . "\n";
    }
    public function save($fileurl){
       file_put_contents($fileurl, $this->data);
        return true;
    }
}
<?php

namespace App;


trait BaseTrait
{
    public function __set($k, $v)
    {
        $this->data[$k]= $v;
    }
    public function __get($k)
    {
        return $this->data[$k];
    }

    public function __isset($k)
    {
        if(isset($k)){
            return $k;
        }else{
            return;
        }
    }
}
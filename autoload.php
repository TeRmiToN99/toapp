<?php

function __autoload($class)
{
    /*$classNameParts = explode('\\', $className);
    unset($classNameParts[0]);
    $className = implode('/', $classNameParts);*/
    require  __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    //require  __DIR__ . '/classes/' . $className . '.php';
}
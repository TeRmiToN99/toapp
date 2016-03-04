<?php

function ReadFileToArray($fileURL, $method){
    $res = fopen($fileURL, $method);
    while (!feof($res) ){
        $lines[] = fgets($res, 1024);
    }
    fclose($res);
    return $lines;
}
function WriteFileDate($fileURL, $method){}
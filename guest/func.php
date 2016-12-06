<?php

function ReadFileToArray($fileURL, $method){
    $res = fopen($fileURL, $method);
    // $res = file($fileURL); //чтение целиком файла в массив. Каждый элемент массива - строка
    //$res = file_get_contents($fileURL); //Чтение целиком файла в строку
    while (!feof($res) ){
        $lines[] = fgets($res, 1024);
    }
    fclose($res);
    return $lines;
}
function WriteFileDate($fileURL, $data){
    $res = fopen($fileURL, 'a');
    //file_put_contents($res, '<br>' . $data);
    fwrite($res, '<br>' . $data);
    fclose($res);
    return true;
}
function loadFile(){
    if($_FILES['product_img']['type'] === 'image/jpeg') {
        $url_img_folder = __DIR__ . '/images/';
        if (isset($_FILES['product_img'])) {
            if (0 == $_FILES['product_img']['error']) {
                $res = move_uploaded_file($_FILES['product_img']['tmp_name'],
                    $url_img_folder . $_FILES['product_img']['name']);
            }
        }
        return $_FILES['product_img']['name'] . ' загружен.';
    }else{
        return 'Формат файла не допустим. Пожалуйста
        выберете файл с расширением jpg или png';
    }
}
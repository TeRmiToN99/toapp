<?php

$json = array(
    "phone" => "+79001112233",
    "comment"=> "some text",
    "personsCount"=> 1,
    "reciver"=> array(
        "home"=> "23",
        "apartment"=> "55",
        "street"=> "Мира",
        "city"=> "Владимир",
        "entrance"=> "2",
        "floor"=> "7"
    ),
    "products" => array( array(
        "code"=> "899944075",
        "id"=> "873e126a-52b7-45e8-a0e2-7262326e7f7e",
        "amount"=> 2,
        "name"=> "Пицца \"4 сезона\"",
        "sum"=> 350
    ),
        array(
            "code"=> "2837462365",
            "id"=> "234sdf-52b7-45e8-a0e2-7262326e7f7e",
            "amount"=> 6,
            "name"=> "Суши гункан",
            "sum"=> 100
        ))
);

$json_str = json_encode($json);
/*
$myCurl = curl_init();
curl_setopt_array($myCurl, array(
    CURLOPT_URL => 'http://www.toapp.totopizza.ru/jsontomail.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query(array('request' => $json_str))
));
$response = curl_exec($myCurl);
curl_close($myCurl);

echo "Ответ на Ваш запрос: " . $response;
*/
$url = 'http://www.toapp.totopizza.ru/jsontomail.php';
$params = array ('request' => $json_str);
$result = file_get_contents($url, false, stream_context_create(array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($params)
    )
)));
echo "Ответ на Ваш запрос: " . $result;
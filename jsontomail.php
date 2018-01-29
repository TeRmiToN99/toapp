<?php
include_once 'log.php';

session_start();

if($_POST['request'] != '') {
    $data = json_decode($_POST['request']);
    $str = '';
    $error = '';
    if (isset($data)) {
        $str .= ' <html>
                <head>
                 <title>Новый заказ на доставку</title>
                </head>
                <body>
                ';
        $str .= '<p>Информация о клиенте:</p>';
        foreach ($data as $v => $k) {
            if ($v == 'phone' || $v == 'comment' || $v == 'personsCount') {
                switch ($v) {
                    case 'phone':
                        $str .= '<p>Телефон ' . ' : ' . $k . '</p>';
                        break;
                    case 'comment':
                        $str .= '<p>Комментарий ' . ' : ' . $k . '</p>';
                        break;
                    case 'personsCount':
                        $str .= '<p>Количество персон ' . ' : ' . $k . '</p>';
                        break;
                }
            } elseif ($v == 'reciver') {
                $str .= ' <p>!-----------------------------------------------------------------------! </p>';
                $str .= '<p>Адрес доставки:</p>';
                foreach ($k as $v => $key) {
                    switch ($v) {
                        case 'home':
                            $str .= '<p>Дом ' . ' : ' . $key . '</p>';
                            break;
                        case 'apartment':
                            $str .= '<p>Квартира ' . ' : ' . $key . '</p>';
                            break;
                        case 'street':
                            $str .= '<p>Улица ' . ' : ' . $key . '</p>';
                            break;
                        case 'city':
                            $str .= '<p>Город ' . ' : ' . $key . '</p>';
                            break;
                        case 'entrance':
                            $str .= '<p>Подъезд ' . ' : ' . $key . '</p>';
                            break;
                        case 'floor':
                            $str .= '<p>Этаж ' . ' : ' . $key . '</p>';
                            break;
                    }
                }
            } elseif ($v == 'products') {
                $str .= ('<p>!-------------------Товары: ------------------!</p>');
                foreach ($k as $v => $kk) {
                    if (count($k) > 0) {
                        foreach ($kk as $v => $key) {
                            switch ($v) {
                                case 'code':
                                    $str .= '<p>Код ' . ' : ' . $key . '</p>';
                                    break;
                                case 'id':
                                    $str .= '<p>id ' . ' : ' . $key . '</p>';
                                    break;
                                case 'amount':
                                    $str .= '<p>Количество ' . ' : ' . $key . '</p>';
                                    break;
                                case 'name':
                                    $str .= '<p>Название ' . ' : ' . $key . '</p>';
                                    break;
                                case 'sum':
                                    $str .= '<p>Сумма ' . ' : ' . $key . '</p>';
                                    break;
                            }
                        }
                        $str .= '<p>!-----------------------------------------------------------------------! </p>';
                    }
                }
            } else {
                $error .= '<p>Неизвестный параметр: ' . $v . '!!!!!</p>';
            }

        }
        if ($error != '') {
            $message = $str . $error;
        } else {
            $message = $str;
        }
        $message .= '</body></html>';
    }
    /* получатели */
    //$to= "TeRmiT <termit99@bk.ru>";
    $to= "TeRmiT <termit99@bk.ru>" . ", ";
    $to .= "Danial <danial.saprykin.ya@mail.ru>";
    /* тема/subject */
    $subject = "Новый заказ";

    /* Для отправки HTML-почты вы можете установить шапку Content-type. */
    $headers= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    /* дополнительные шапки */
    $headers .= "From: Доставка То-То <appjson@totopizza.ru>\r\n";

    /* и теперь отправим из */
    mail($to, $subject, $message, $headers);
    echo  'success';

}else{
    echo  'error';
}
session_destroy();
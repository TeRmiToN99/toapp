<?php
/*
require __DIR__ . '/classes/GuestBook.php';

$book = new GuestBook(__DIR__ . '/guest.txt');
$records = $book->getData();
$book->append('Снова новая строка');
$book->save(__DIR__ . '/guest.txt');
*/
require __DIR__ . '/classes/User.php';
/*?>

<fieldset>
    <legend>Строки записанные в файле.</legend>
    <ul>
        <?foreach($records as $text): ?>
            <li><?=$text?></li>
        <?endforeach;?>
    </ul>
</fieldset>
*/
function sendMail($user, $msg){
    /*if(get_class($user) ==  'User'){*/
    if($user instanceof User){
        echo 'Идет отправка на адрес ';
        echo $user->email;
        echo 'Содержимое письма: ' . $msg;
    } else {
        echo 'ERROR!';
    }
}


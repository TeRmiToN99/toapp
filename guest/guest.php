<?php
include_once __DIR__ . '/func.php';
$url = __DIR__ . '/guest.txt';
$m = 'r';
$guests = ReadFileToArray($url, $m);

if (isset($_FILES['product_img']) &&($_FILES['product_img']) != '')
$res = loadFile();
?>
<fieldset>
    <legend>Строки записанные в файле.</legend>
    <? foreach($guests as $name){
    echo $name;?><br>
<?}?>
</fieldset>
<br>
<form action="contrl.php" method="post">
    <input type="text" name="str">
    <input type="submit" value="Добавить">
</form>
<form
    action="guest.php?loadfile"
    method="post"
    enctype="multipart/form-data"
>
    <input type="file" name="product_img">
    <input type="submit" value="Загрузить">
    <?=$res?>
</form>

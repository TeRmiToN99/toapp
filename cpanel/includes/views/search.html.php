<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Поиск:</title>
</head>
<body>
<h2>Расширенный поиск.</h2>
<p>Настройте поиск по следующим критериям:</p>
<form action="" method="get">
    <div class="search">
        <label for="category">По категории:</label>
        <select name="category" id="category">
        <option value="">По всем категориям</option>
        <?php foreach($categories as $category):?>
        <option value="<? htmlout($category['id']);?>"><?htmlout($category['title']);?></option>
        <? endforeach; ?>
    </select>
        <div>
            <label for="text">Содержит текст:</label>
            <input type="text" name="text" id="text">
            <input type="hidden" name="action" value="search">
            <input type="submit" value="Искать">
        </div>
    </div>
    <p><a href="..">Вернуться назад</p>
</form>
</body>
</html>

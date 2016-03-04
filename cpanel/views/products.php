<?
/**
* Дописать проверку, как был осуществлен переход
*/
?>
<main>
<div id="wrapper">
    <div id="sidebar">
        <div id="leftadminmenu">
            <h3>Редактирование</h3>
            <ul id="adminmenu">
                <li><a href="category.php"><div class="menu-image"></div><div class="menu-name">Категории</div></a></li>
                <li><a href="products.php"><div class="menu-image"></div><div class="menu-name">Блюда</div></a></li>
                <li><a href="articles.php"><div class="menu-image"></div><div class="menu-name">Новости</div></a></li>
            </ul>
        </div>
    </div>
     <div class="container">
         <div class="content">
             <div class="search">
                 <div>
                     <label for="text">Содержит текст:</label>
                     <input type="text" name="text" id="text">
                     <input type="hidden" name="action" value="search">
                     <input type="submit" value="Искать">
                 </div>
             </div>
             <h2>Управление категориями</h2>
        <h3>Блюда категории: <?=$category['title']?></h3>
         <a href="form.php?action=add_prod">Добавить блюдо</a>
	    <? if($products != 0){foreach ($products as $product): ?>
		<div class="">
            <ul>	    
                <li><a href="product.php?id=<?=$product['id']?>">
                    <?= htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8')?></a><a href="index.php?action=edit&id=<?=$product['id']?>">Изменить</a><a href="index.php?action=delete&id=<?=$product['id']?>">Удалить</a></li>
            </ul>
		</div>
	    <?php endforeach; } else echo '<br>В данной категории нет товаров.';?>
	    </div>
	</div>
    </div>
</main>
<footer>
	<div>
        <a href="javascript:history.go(-1)"style=" text-decoration:none " >Назад</a>
    </div>
</footer>
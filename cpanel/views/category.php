<main>
<div id="wrapper">
    <div id="sidebar">
        <div id="leftadminmenu">
            <div class="search">
                <div>
                    <input type="text" name="text" id="text" value="Содержит текст">
                    <input type="hidden" name="action" value="search">
                    <button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-search" style="color:red;"></span></button>
                </div>
            </div>
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
            <h2>Управление категориями</h2>
            <p><a href="?action=add">Добавить категорию</a></p>
            <p>Весь список категорий:</p>
            <ul>
            <? foreach($categories as $category): ?>
                <form action="" method="post">
                    <li>
                        <?= htmlout($category['title']);?></a>
                        <input type="hidden" name="id" value="<?=$category['id']; ?>">
                        <!--<input type="submit" name="action" value="Редактировать">
                        <input type="submit" name="action" value="Удалить">-->
                <a href="products.php?id=<?=$category['id']?>">просмотреть</a><a href="?action=edit&id=<?= htmlout($category['id']);?>">изменить</a><a href="?action=delete&id=<?=$category['id']?>">удалить</a>
                    </li>
                </form>
            <? endforeach; ?>
            </ul>
        </div>
    </div>
</div>
</main>
<footer>
    <div>
        <a href="javascript:history.go(-1)"style=" text-decoration:none " >Назад</a>
    </div>
</footer>
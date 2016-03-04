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
        <h1>Система управление сайтом.</h1>
                <h2>Управление категориями</h2>
         <div class="list-category">
            <p>Весь список категорий:</p>
            <ul>
            <? foreach($categories as $category): ?>
                    <li>
                        <a href="products.php?id=<?= htmlout($category['id']);?>"><?= htmlout($category['title']);?></a>
                    </li>
            <? endforeach; ?>
            </ul>
         </div><!-- /list-category-->
            <div class="list-news">
                <h3>Последние добавленные новости:</h3>
            </div>
        </div><!-- /content-->
    </div> <!--/container-->
</div> <!-- /wrapper-->
</main>
<footer>
    <div>
        <a href="javascript:history.go(-1)"style=" text-decoration:none " >Назад</a>
    </div>
</footer>
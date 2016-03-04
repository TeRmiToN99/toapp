<main>
    <div id="form_wrapper">
        <div class="form-block">
            <?if (isset($_GET['action']) && $_GET['action'] == 'add_news'){?>
            <form action="news.php?<?=$_GET['action']?>" method="post">
                <div class="form-items">
                    <label for="add_news">Введите название новости</label>
                    <input type="text" id="add_news" class="form-item" name="title"><br><input type="submit" class="btn" value="Добавить"></div>
            </form>
            <?}?>
            <?if (isset($_GET['action']) && $_GET['action'] == 'add_prod'){?>
            <form action="product.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" method="post">
            <div class="form-items">
               <div>
                    <SELECT class="form-item" name="category">
                    <?php foreach($categories as $category):?>
                        <option value="<?= htmlout($category['id']);?>"><?= htmlout($category['title']);?></option>
                    <?php endforeach;?>
                    </SELECT>
                   <span>выберите категорию</span>
               </div>
                <input type="text" id="add_prod" class="form-item" name="title" placeholder="Название блюда">
                <div>
                    <input type="text" placeholder="Выберите картинку" class="form-item">
                    <input type="submit" value="..">
                </div>
                <input type="date" value="<?=date("Y-m-d")?>">
            </div><a href="#">
            <div id="img_block">
                <img class="small_img" src="../../images/noimg.jpg">
            </div></a>
            <div class="form-desc">Описание:
                <textarea for="add_prod" name="description"  rows="5" cols="40"></textarea>
            </div>
            <div>
                <input type="submit" class="btn" value="Сохранить">
            </div>
            <?}?>
            </form>
        </div>
    </div>
</main>
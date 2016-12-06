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
                        <option>выберите категорию</option>
                        <?php foreach($categories as $category):?>
                            <option value="<?= htmlout($category['id']);?>"><?= htmlout($category['title']);?></option>
                        <?php endforeach;?>
                    </SELECT>
                   <br>
                    <input type="text" id="add_prod" class="form-item" name="title" placeholder="Название блюда"><br>
                    <input type="date" value="<?=date("Y-m-d")?>"><input type="file" name="product_img">
                </div>
            </div>
                <fieldset>
                    <legend>Описание:</legend>
                    <textarea for="add_prod" name="description"  rows="5" cols="40"></textarea>
                </fieldset>
            <div>
                <input type="submit" class="btn" value="Сохранить изменения">
            </div>
            <?}?>
            </form>
        </div>
    </div>
</main>
<div class="col-sm-12 col-md-12 well" id="form_product">
    <h1>Добавить блюдо</h1>
    <form action="post.php?action=Insert&post_type=Product" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Заголовок</label><br>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="category">Категория</label><br>
            <select class="form-control" name="category_id">
                <?php foreach ($categories as $category):?>
                    <option value='<?=$category->id;?>'><?=$category->title?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="lead">Краткое описание</label><br>
            <div class="col-5">
                <textarea class="form-control" id="lead" name="lead" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Технология</label><br>
            <textarea class="form-control" id="description" name="description"rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="tech_cart23">Тех.карта 23 см</label>
            <input type="file" class="form-control-file" name="tech_cart23" id="tech_cart23">
        </div>
        <div class="form-group">
            <label for="tech_cart33">Тех.карта 33 см</label>
            <input type="file" class="form-control-file" name="tech_cart33" id="tech_cart33">
        </div>
        <div class="form-group">
            <label for="url_img">Общее фото</label>
            <input type="file" class="form-control-file" name="url_img" id="url_img">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
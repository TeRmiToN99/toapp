<div class="col-sm-12 col-md-12 well" id="form_product">
    <h1>Добавить блюдо</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="title">Заголовок</label><br>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="category">Категория</label><br>
            <select class="form-control" id="category">
                <?php foreach ($categories as $category):?>
                    <option><?=$category->title?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="lead">Краткое описание</label><br>
            <div class="col-5">
                <textarea class="form-control" id="lead" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Описание</label><br>
            <textarea class="form-control" id="description" rows="5"></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
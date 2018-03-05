<div class="col-sm-12 col-md-12 well" id="form_category">
    <h1>Добавить категорию</h1>
    <form action="/App/cpanel/post.php?action=<? echo(!empty($category->id) ? 'Update': 'Insert');?>&post_type=Category" method="post">
        <div class="form-group">
            <label for="title">Название категории</label><br>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="lead">Краткое описание</label><br>
            <textarea class="form-control" name="lead" id="lead" rows="3"></textarea>
        </div>
        <div class="product_image_block col-sm-4 col-md-4">
            <? if($category->url_img != ''):?>
                <img src="<?=$category->url_img;?>">
            <?else:?>
                <img src="<?=\App\cpanel\Models\Product::NOIMG?>">
            <?endif;?>

            <div class="form-group">
                <label for="url_img">Иконка категории</label>
                <input type="file" class="form-control-file" name="url_img" id="url_img">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
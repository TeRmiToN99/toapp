<div class="col-sm-12 col-md-12 well" id="form_category">
    <h1><? echo(!empty($category->id) ? 'Изменить': 'Добавить');?> категорию</h1>
    <div class="block_info col-sm-6 col-md-6">
    <form action="/App/cpanel/post.php?action=<? echo(!empty($category->id) ? 'Update': 'Insert');?>&post_type=Category" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Название категории</label><br>
            <input type="text" class="form-control" name="title" id="title" value='<?=$category->title;?>'>
            <input type="text" class="form-control" style="display: none" name="id" id="id" value="<?=$category->id?>">
        </div>
        <div class="form-group">
            <label for="lead">Краткое описание</label><br>
            <textarea class="form-control" name="lead" id="lead" rows="3"><?=$category->lead;?></textarea>
        </div>
        <div class="category_image_block">
            <?php if(isset($category->url_img)):?>
                <h4>Текущая иконка: <?=$category->url_img;?></h4>
                <img src="<?=$category->url_img;?>">
            <?php else: ?>
                <img src="<?=\App\Models\Category::NOIMG?>">
            <?php endif; ?>
            <div class="form-group">
                <label for="url_img">Иконка категории</label>
                <input type="file" class="form-control-file" name="url_img" id="url_img">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" onclick="this.form.submit;">Сохранить и выйти&nbsp;<i class="fa fa-floppy-o"></i></button>
    </form>
    </div>
</div>
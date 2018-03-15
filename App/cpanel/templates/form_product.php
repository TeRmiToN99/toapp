<div class="col-sm-12 col-md-12 well" id="form_products">
    <h1><?=$blocktitle;?></h1>
    <form id="form_product" action="/App/cpanel/post.php?action=<? echo(!empty($product->id) ? 'Update': 'Insert');?>&post_type=Product" method="post" enctype="multipart/form-data">
        <div class="block_info col-sm-6 col-md-6">
            <div class="form-group">
                <label for="title">Заголовок</label><br>
                <input type="text" name="title" id="title" value='<?=$product->title;?>'>
                <input type="text" style="display: none" name="id" id="id" value="<?=$product->id?>">
            </div>
            <div class="form-group">
                <label for="category">Категория</label><br>
                <select class="form-control" name="category_id">
                    <?php foreach ($categories as $category):?>
                        <option <?if($category->id == $_GET['category_id']){echo 'selected'; $vcat = '"'. $category->title . '"';}?> value='<?=$category->id;?>'><?=$category->title?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="lead">Краткое описание</label><br>
                <div class="col-5">
                    <textarea class="form-control" id="lead" name="lead" rows="3"><?=$product->lead;?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="tips">Подсказки</label><br>
                <textarea class="form-control" id="tips" name="tips"rows="5"><?=$product->tips;?></textarea>
            </div>
            <div class="form-group">
                <label for="description">Технология:</label><br>
                <textarea class="form-control" id="description" name="description"rows="5"><?=$product->description;?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" onclick="this.form.submit;"><i class="fa fa-floppy-o"></i></button>
            <button type="submit" class="btn btn-primary" onclick="this.form.submit;">Сохранить и выйти&nbsp;<i class="fa fa-floppy-o"></i></button>
        </div>
        <div class="product_image_block col-sm-4 col-md-4">
            <?php if($product->url_img != ''):?>
                <h4>Текущая основная фотография: <?=$product->url_img;?></h4>
                <a class="thumbnail" href="<?=$product->url_img;?>" target="_blank"><img src="<?=$product->url_img;?>"></a>
            <?php else: ?>
                <img src="<?=\App\Models\Product::NOIMG?>">
            <?php endif; ?>
            <div class="form-group">
                <label for="url_img">Основное фото</label>
                <input type="file" class="form-control-file" name="url_img" id="url_img">
            </div>
        </div>
    </form>
</div>
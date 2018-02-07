<div class="col-sm-12 col-md-12 well" id="form_product">
    <h1><?=$blocktitle;?></h1>
    <form action="/App/cpanel/post.php?action=<? echo(!empty($product->id) ? 'Update': 'Insert');?>&post_type=Product" method="post" enctype="multipart/form-data">
        <div class="block_info col-sm-6 col-md-6">
            <div class="form-group">
                <label for="title">Заголовок</label><br>
                <input type="text" name="title" id="title" value="<?=$product->title; ?>">
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
                <label for="description">Технология:</label><br>
                <textarea class="form-control" id="description" name="description"rows="5"><?=$product->description;?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
        <!--<div class="block_img_links">
            <div class="form-group">
                <label for="tech_cart23">Тех.карта 23 см</label>
                <input type="file" class="form-control-file" name="tech_cart23" id="tech_cart23">
                <? if(!empty($product->tech_cart23)){?><a href="<?=$product->tech_cart23;?>" target="_blank">текущая тех.карта</a> <?}?>
            </div>
            <div class="form-group">
                <label for="tech_cart33">Тех.карта 33 см</label>
                <input type="file" class="form-control-file" name="tech_cart33" id="tech_cart33">
                <? if(!empty($product->tech_cart33)){?><a href="<?=$product->tech_cart33;?>" target="_blank">текущая тех.карта</a> <?}?>
            </div>

        </div>-->
        <div class="product_image_block col-sm-4 col-md-4">
            <h4>Текущая основная фотография: <?=$product->url_img;?></h4>
            <a class="thumbnail" href="<?=$product->url_img;?>" target="_blank"><img src="<?=$product->url_img;?>"></a>
            <div class="form-group">
                <label for="url_img">Основное фото</label>
                <input type="file" class="form-control-file" name="url_img" id="url_img">
            </div>
        </div>
    </form>
</div>
<div class="col-sm-12 col-md-12 well">
    <div>
        <?php if (!empty($product)){ ?>
            <div class="product_item">
                <div class="header_block">
                    <h2><?= $product->title;?></h2>
                    <a class="thumbnail" href="<?php echo $product->url_img; ?>" target="_blank"><img title="<?= $product->title;?>" class="product_img" src="<?php echo $product->url_img; ?>"></a>
                </div>
                    <?= $product->category_title;?></label>
                    <fieldset>
                        <legend>Краткое описание</legend>
                        <?= $product->lead; ?>
                    </fieldset>
                    <fieldset>
                        <legend>Технология</legend>
                        <p></p><?= $product->description; ?></p>
                    </fieldset>
                </div>
            </div>
        <?php }else echo 'Нет данных по данному товару!';?>
    </div>
    <input type="button" class="btn btn-info" onclick="history.back();" value="< Назад"/>
</div>
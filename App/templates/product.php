<div class="col-sm-12 col-md-12 well">
    <div>
        <?php if (!empty($product)){ ?>
            <div class="product_item">
                <div class="header_block">
                    <?php if(isset($product->category_url_img)):?>
                        <img class="cat_img" src="<?=$product->category_url_img;?>">
                    <?php else: ?>
                        <img class="cat_img" src="<?=\App\Models\Category::NOIMG?>">
                    <?php endif; ?>
                    <h2 class="product_title"><?= $product->title;?></h2>
                    <? if($product->url_img != ''):?>
                        <a class="thumbnail" href="<?php echo $product->url_img; ?>" target="_blank"><img class="product_img" src="<?php echo $product->url_img; ?>"></a>
                    <?else:?>
                        <img src="<?=\App\Models\Product::NOIMG?>">
                    <?endif;?>
                </div>
                    <fieldset>
                        <label for="tips">Подсказки</label><br>
                        <div id="product_cart_table">
                            <?php if(!empty($ingredient)):?>
                                <? for($i=0; $i < count($ingredient); $i++): ?>
                                    <div id="ing_row<?=$i?>" class="ing_row">
                                        <div class="ing_icon">
                                            <img src="<?=$ingredient[$i]->url_img?>">
                                        </div>
                                        <div class="ingredient_selected"><?=$ingredient[$i]->title?></div>
                                        <div class="weight_input"><?=$ingredient[$i]->weight?></div>
                                    </div>
                                <?endfor; ?>
                            <?else:?>
                                <div id="ing_row1" style="display: none" class="ing_row"></div>
                            <?endif;?>
                        </div>
                    </fieldset>
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
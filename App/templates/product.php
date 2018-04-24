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
                        <div id="ing_row1" class="ing_row">
                            <strong class="ingredient_selected">Наименовение</strong>
                            <strong class="option">Модификатор</strong>
                            <strong class="weight">Вес1</strong>
                            <strong class="weight">Вес2</strong>
                        </div>
                        <?php if(!empty($ingredients)):?>
                            <? for($i=0; $i < count($ingredients); $i++): ?>
                                <div class="ing_row">
                                    <div class="ing_icon">
                                        <img src="<?=$ingredients[$i]->url_img?>">
                                    </div>
                                    <div class="ingredient_selected"><?=$ingredients[$i]->title?></div>
                                    <div class="opt_icon">
                                        <? if($ingredients[$i]->option_img != null):?>
                                            <img src="<?php echo $ingredients[$i]->option_img; ?>">
                                        <?else:?>
                                            <p>__</p>
                                        <?endif;?>
                                    </div>
                                    <div class="input_weight"><?=$ingredients[$i]->weight1?></div>
                                    <div class="input_weight"><?=$ingredients[$i]->weight2?></div>
                                </div>
                            <?endfor; ?>
                        <?else:?>
                            <div style="display: none" class="ing_row">В данном товаре нет ингредиентов.</div>
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
<div class="col-sm-12 col-md-12 well">
    <div>
        <?php if (!empty($product)){ ?>
            <div class="product_item">
                <div class="header_block">
                    <h2><?= $product->title;?></h2>
                    <a class="thumbnail" href="<?php echo $product->url_img; ?>" target="_blank"><img title="<?= $product->title;?>" class="product_img" src="<?php echo $product->url_img; ?>"></a>
                </div>

                <? if('Пицца'==$product->category_title && '' != $product->tech_cart23){ ?>
                    <div class="link_block">
                        <a class="btn btn-info popup-link" target="_blank" title="23см тех.карта <?= $product->title;?>" href="#popup">23см</a>
                        <div style="display:none;">
                            <div id="popup">
                                <iframe class="product_frame" src="<?php echo $product->tech_cart23; ?>"></iframe>
                                <p><button type="button" class="btn btn-info close-button">Закрыть</button></p>
                            </div>
                        </div>
                        <a class="btn btn-info popup-link" target="_blank" title="33см тех.карта <?= $product->title;?>" href="#popup1">33см</a>
                        <div style="display:none;">
                            <div id="popup1">
                                <iframe class="product_frame" src="<?php echo $product->tech_cart33; ?>"></iframe>
                                <p><button type="button" class="btn btn-info close-button">Закрыть</button></p>
                            </div>
                        </div>
                    </div>
                <?}elseif('' != $product->tech_cart23){?>
                    <div class="link_block">
                        <a class="btn btn-info popup-link" target="_blank" title="23см тех.карта <?= $product->title;?>" href="#popup">тех. карта</a>
                        <div style="display:none;">
                            <div id="popup">
                                <iframe class="product_frame" src="<?php echo $product->tech_cart23; ?>"></iframe>
                                <p><button type="button" class="btn btn-info close-button">Закрыть</button></p>
                            </div>
                        </div>
                    </div>
                <?}?>
                <div>
                    <!--<label><?= $product->category_title;?></label>-->
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
<div class="col-sm-12 col-md-12 well">
    <div>
        <?php if (!empty($product)){ ?>
            <div class="product_item">
                <div class="header_block">
                    <h2><?= $product->title;?></h2>
                    <div class="link_block">
                        <!--<a class="btn btn-info" href="#">23см</a>
                        <a class="btn btn-info" href="#">33см</a>-->
                        <a class="btn btn-info" href="form.php?action=UpdateProduct&product_id=<?=$product->id;?>&category_id=<?=$product->category_id;?>"><i class="fa fa-pencil fa-fw"></i></a>
                        <a class="btn btn-danger" onClick="return window.confirm('Вы подтверждаете удаление?');" href="products.php?action=DeleteProduct&product_id=<?=$product->id;?>" ><i class="fa fa-trash-o"></i></a>
                    </div>
                    <? if($product->url_img != ''):?>
                        <a class="thumbnail" href="<?php echo $product->url_img; ?>" target="_blank"><img class="product_img" src="<?php echo $product->url_img; ?>"></a>
                    <?else:?>
                        <img src="<?=\App\Models\Product::NOIMG?>">
                    <?endif;?>
                </div>
                <div class="form-group">
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
                </div>

                <div>
                    <fieldset>
                        <legend>Подсказки</legend>
                        <?= $product->tips; ?>
                    </fieldset>
                    <label><?= $product->category_title;?></label>
                    <fieldset>
                        <legend>Краткое описание</legend>
                        <?= $product->lead; ?>
                    </fieldset>
                    <fieldset>
                        <legend>Технология</legend>
                        <p></p><?= $product->description; ?></p>
                    </fieldset>
                </div>
                <!--
                <div>
                    <fieldset>
                        <legend>Технологическая карта</legend>
                    <!-- Навигация -->
                    <!--<ul class="nav nav-tabs" role="tablist">
                        <li><a href="#23sm" aria-controls="23sm" role="tab" data-toggle="tab">23см</a></li>
                        <li><a href="#33sm" aria-controls="33sm" role="tab" data-toggle="tab">33см</a></li>
                    </ul>-->
                    <!-- Содержимое вкладок -->
                    <!--<div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="23sm">
                            <iframe class="product_frame" src="<?php echo $product->tech_cart23; ?>"></iframe>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="33sm">
                            <iframe class="product_frame" src="<?php echo $product->tech_cart33; ?>"></iframe>
                        </div>
                    </div>--><!--
                    </fieldset>
                </div>-->
            </div>
        <?php }else echo 'Нет данных по данному товару!';?>
    </div>
    <input type="button" class="btn btn-info" onclick="history.back();" value="< Назад"/>
</div>
<div class="col-sm-12 col-md-12 well">
    <div>
        <?php if (!empty($product)){ ?>
            <div class="product_item">
                <div class="header_block">
                    <h2><?= $product->title;?></h2>
                    <a href="<?php echo $product->url_img; ?>" target="_blank"><img class="product_img" src="<?php echo $product->url_img; ?>"></a>
                </div>
                <div class="link_block">
                    <a class="btn btn-info" href="#">23см</a>
                    <a class="btn btn-info" href="#">33см</a>
                    <a class="btn btn-info" href="form.php?action=UpdateProduct&product_id=<?=$product->id;?>&category_id=<?=$product->category_id;?>"><i class="fa fa-pencil fa-fw"></i></a>
                </div>
                <div>
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
                <div>
                    <fieldset>
                        <legend>Технологическая карта</legend>
                    <!-- Навигация -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a href="#23sm" aria-controls="23sm" role="tab" data-toggle="tab">23см</a></li>
                        <li><a href="#33sm" aria-controls="33sm" role="tab" data-toggle="tab">33см</a></li>
                    </ul>
                    <!-- Содержимое вкладок -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="23sm">
                            <iframe class="product_frame" src="<?php echo $product->tech_cart23; ?>"></iframe>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="33sm">
                            <iframe class="product_frame" src="<?php echo $product->tech_cart33; ?>"></iframe>
                        </div>
                    </div>
                    </fieldset>
                </div>
            </div>
        <?php }else echo 'Нет данных по данному товару!';?>
    </div>
    <input type="button" class="btn btn-info" onclick="history.back();" value="< Назад"/>
</div>
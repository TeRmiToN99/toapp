<div class="col-sm-12 col-md-12 well">
    <div>
        <?php if (!empty($product)){ ?>
            <div class="product_item">
                <div class="header_block">
                    <h2><?= $product->title;?></h2>
                    <img class="product_img" src="<?php echo $product->url_img; ?>">
                </div>
                <div class="link_block">
                    <a class="btn btn-info" href="#">23см</a>
                    <a class="btn btn-info" href="#">33см</a>
                </div>
                <fieldset>
                    <legend>Краткое описание</legend>
                    <?= $product->lead; ?>
                </fieldset>
                <fieldset>
                    <legend>Технология</legend>
                    <p></p><?= $product->description; ?></p>
                </fieldset>
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
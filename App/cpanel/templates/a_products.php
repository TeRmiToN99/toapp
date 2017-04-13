<div class="col-sm-12 col-md-12 well">
    <div>
        <h3><?=$blocktitle?></h3>
        <input type="">
        <?php foreach ($products as $product): ?>
            <div>
                <div>
                    <img class="product_img" src="<?php echo $product->url_img; ?>">
                </div>
                <div>
                    <h3><?php echo $product->title;?></h3>
                    <?= $product->lead; ?>
                </div>
            </div>
            <hr>
        <?php endforeach;?>
    </div>
</div>
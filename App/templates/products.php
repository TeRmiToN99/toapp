<article class="col-sm-12 col-md-8 col-lg-9">
    <div class="panel panel-default block-products">
        <h3><?=$blocktitle ?></h3>
        <?php foreach ($products as $product) :?>
            <div class="panel-heading top-bar">
                <div class="panel-title">
                    <?php echo $product->title;?>
                </div>
                <img class="product_img" src="<? echo $product->url_img;?>">
                <p> <?php if (!empty($product->author)): ?>
                        Автор: <?php echo $product->author->name; ?>
                    <?php endif; ?></p>
            </div>
            <div class="panel-body">
                <p><?php echo $product->lead; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</article>
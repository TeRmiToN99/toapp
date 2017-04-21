<div class="col-sm-12 col-md-12 well">
    <div>
        <form action="products.php" method="get">
            <select class="form-control catfilter" name="category_id"">
            <?php foreach ($categories as $category):?>
                <option <?if($category->id == $_GET['category_id']){echo 'selected'; $vcat = '"'. $category->title . '"';}?> value='<?=$category->id;?>'><?=$category->title?></option>
            <?php endforeach;?>
            </select>
            <input type="text" style="display: none" name="action" value="FindByIdCategory">
            <input type="submit" class="btn btn-success" value="Вывести">
        </form>
    </div>
    <div>
        <h3><?=$blocktitle; echo $vcat; echo(' (' . count($products) . ')');?></h3>
        <?php if (!empty($products)){foreach ($products as $product): ?>
            <a href="products.php?action=FindById&product_id=<?echo $product->id?>"><div class="products_item">
                <div>
                    <img class="product_img" src="<?php echo $product->url_img; ?>">
                </div>
                    <h3><?php echo $product->title;?></h3></a>
                <div>
                    <?= $product->lead; ?>
                </div>
            </div>
        <?php endforeach;}else echo 'Выбранная категория не содержит товаров!';?>
    </div>
</div>
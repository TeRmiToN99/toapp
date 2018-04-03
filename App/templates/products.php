<div class="col-sm-12 col-md-12 well">
    <div>
        <!--<form action="../../products.php" method="get">
            <select class="form-control catfilter" name="category_id"">
            <?//php foreach ($categories as $category):?>
                <option <?//if($category->id == $_GET['category_id']){echo 'selected'; $vcat = '"'. $category->title . '"';}?> value='<?=$category->id;?>'><?=$category->title?></option>
            <?//php endforeach;?>
            </select>
            <input type="text" style="display: none" name="action" value="FindByIdCategory">
            <input type="submit" class="btn btn-success" value="Вывести">
        </form>-->
        <?php foreach ($categories as $category):?>
            <a class="btn btn-success" href="../../products.php?action=FindByIdCategory&category_id=<?=$category->id?>"><?=$category->title?></a>
            <?php
                $cat_array[$category->id]['url_img'] = $category->url_img;
            ?>
        <?php endforeach;?>
    </div>
    <div>
        <h3><?=$blocktitle; echo(' (' . count($products) . ')');?></h3>
        <?php
        if (!empty($products)){foreach ($products as $product): ?>
                <div>
                    <a href="../../products.php?action=FindById&product_id=<?echo $product->id?>"><div class="products_item">
                            <?php if(isset($cat_array[$product->category_id]['url_img'])):?>
                                <img class="cat_img" src="<?=$cat_array[$product->category_id]['url_img'];?>">
                            <?php else: ?>
                                <img class="cat_img" src="<?=\App\Models\Category::NOIMG?>">
                            <?php endif; ?>
                        <? if($product->url_img != ''):?>
                            <img class="product_img hidden-xs hidden-sm" src="<?php echo $product->url_img; ?>">
                        <?else:?>
                            <img class="product_img hidden-xs hidden-sm" src="<?=\App\Models\Product::NOIMG?>">
                        <?endif;?>
                            <h3><?php echo $product->title;?></h3>
                    </a>
                </div>
        <!--<div>
                    <?//= $product->lead; ?>
                </div>-->
            </div>
        <?php endforeach;}else echo 'Выбранная категория не содержит товаров!';?>
    </div>
</div>
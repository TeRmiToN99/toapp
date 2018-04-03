<article class="col-sm-12 col-md-8 col-lg-9">
    <div class="panel panel-default block-categoies">
        <h3><?=$blocktitle?></h3>
    <?php foreach ($categories as $category): ?>
        <div class="panel-heading col-md-4">
            <?php if(isset($category->url_img)):?>
                <img class="cat_img" src="<?=$category->url_img;?>">
            <?php else: ?>
                <img class="cat_img" src="<?=\App\Models\Category::NOIMG?>">
            <?php endif; ?>
            <div class="panel-title">
                <?php echo $category->title;?>
            </div>
            <div class="panel-body">
                <?php echo $category->lead;?>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</article>
<div class="col-sm-12 col-md-12 well">
    <div>
        <h3><?=$blocktitle?></h3>
        <?php foreach ($categories as $category): ?>
            <div class="all_category">
                <?php if(isset($category->url_img)):?>
                    <img class="cat_img" src="<?=$category->url_img;?>">
                <?php else: ?>
                    <img class="cat_img" src="<?=\App\Models\Category::NOIMG?>">
                <?php endif; ?>
                <?php echo $category->title;?>
                <div class="link_block">
                    <!--<a class="btn btn-info" href="#">23см</a>
                    <a class="btn btn-info" href="#">33см</a>-->
                    <a class="btn btn-info" href="form.php?action=UpdateCategory&category_id=<?=$category->id;?>"><i class="fa fa-pencil fa-fw"></i></a>
                    <a class="btn btn-danger" onClick="return window.confirm('Вы подтверждаете удаление?');" href="products.php?action=DeleteCategory&category_id=<?=$category->id;?>" ><i class="fa fa-trash-o"></i></a>
                </div>
                <p><?php echo $category->lead;?></p>
            </div>
        <?php endforeach;?>
    </div>
</div>
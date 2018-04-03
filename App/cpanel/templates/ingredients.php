<div class="col-sm-12 col-md-12 well">
    <div>
        <h3><?=$blocktitle?></h3>
        <?php foreach ($ingredients as $ingredient): ?>
            <div class="ingredients">
                <?php if(isset($ingredient->url_img)):?>
                    <img class="icon" src="<?=$ingredient->url_img;?>">
                <?php else: ?>
                    <img class="icon" src="<?=\App\Models\Ingredient::NOIMG?>">
                <?php endif; ?>
                <?php echo $ingredient->title;?>
                <div class="link_block">
                    <!--<a class="btn btn-info" href="#">23см</a>
                    <a class="btn btn-info" href="#">33см</a>-->
                    <a class="btn btn-info" href="form.php?action=UpdateIngredient&ingredient_id=<?=$ingredient->id;?>"><i class="fa fa-pencil fa-fw"></i></a>
                    <a class="btn btn-danger" onClick="return window.confirm('Вы подтверждаете удаление?');" href="products.php?action=DeleteCategory&category_id=<?=$ingredient->id;?>" ><i class="fa fa-trash-o"></i></a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
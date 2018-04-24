<div class="col-sm-12 col-md-12 well">
    <div>
        <h3><?=$blocktitle?></h3>
        <?php foreach ($options as $option): ?>
            <div class="options">
                <?php if(isset($option->url_img)):?>
                    <img class="icon" src="<?=$option->url_img;?>">
                <?php else: ?>
                    <img class="icon" src="<?=\App\Models\Option::NOIMG?>">
                <?php endif; ?>
                <?php echo $option->title;?>
                <div class="link_block">
                    <!--<a class="btn btn-info" href="#">23см</a>
                    <a class="btn btn-info" href="#">33см</a>-->
                    <a class="btn btn-info" href="form.php?action=UpdateOption&option_id=<?=$option->id;?>"><i class="fa fa-pencil fa-fw"></i></a>
                    <a class="btn btn-danger" onClick="return window.confirm('Вы подтверждаете удаление?');" href="options.php?action=DeleteOption&option_id=<?=$option->id;?>" ><i class="fa fa-trash-o"></i></a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
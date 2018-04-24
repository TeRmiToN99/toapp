<div class="col-sm-12 col-md-12 well">
    <h1><?=$blocktitle;?></h1>
    <form id="form_option" action="/App/cpanel/post.php?action=<? echo(!empty($option->id) ? 'Update': 'Insert');?>&post_type=Option" method="post" enctype="multipart/form-data">
        <div class="block_info col-sm-6 col-md-6">
            <div class="form-group">
                <label for="title">Заголовок</label><br>
                <input type="text" name="title" id="title" value='<?=$option->title;?>'>
                <input type="text" style="display: none" name="id" id="id" value="<?= $option->id?>">
            </div>
        <div class="form-group">
            <?php if($option->url_img != ' '):?>
                <img src="<?= $option->url_img;?>">
                <h4>Текущая иконка: <?= $option->url_img;?></h4>
            <?php else: ?>
                <img src="<?=\App\Models\Option::NOIMG?>">
            <?php endif; ?>
            <input type="file" class="form-control-file" id="url_img" name="url_img">
        </div>
            <input type="button" class="btn btn-info" onclick="history.back();" value="< Назад"/>
            <button type="submit" class="btn btn-primary" onclick="this.form.submit;"><i class="fa fa-floppy-o"></i></button>
    </form>
</div>
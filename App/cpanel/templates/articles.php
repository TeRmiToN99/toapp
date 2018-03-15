<div class="col-sm-12 col-md-12 well" id="content">
    <h3><?=$blocktitle?>
        <div class="block-news">
            <?php foreach ($articles as $article): ?>
                <div class="block_news_items">
                    <div class="block_news_item" ><h4><?php echo $article->title;?></h4>
                        <div class="link_block">
                            <a class="btn btn-info" href="form.php?action=UpdateArticle&article_id=<?=$article->article_id;?>"><i class="fa fa-pencil fa-fw"></i></a>
                            <a class="btn btn-danger" onClick="return window.confirm('Вы подтверждаете удаление?');" href="articles.php?action=DeleteArticle&article_id=<?=$article->id;?>" ><i class="fa fa-trash-o"></i></a>
                        </div>
                        <p><span class="media-heading"><?=$article->publication; ?> <?php if (isset($article->login)): ?>
                        <?=$article->login ?></span></p>
                        <?php else:?>
                            <p><span>Автор: Неизвестен. </span></p>
                        <?endif; ?>
                        <span>
                            <?php echo $article->lead; ?>
                        </span>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
</div>
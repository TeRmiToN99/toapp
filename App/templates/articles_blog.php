<div class="col-sm-12 col-md-12 well hidden-xs hidden-sm" id="content">
        <h3><?=$blocktitle?></h3>
    <div>
        <?php foreach ($articles as $article): ?>
            <div class="block_news_items">
                <div class=""><h4><?php echo $article->title;?></h4>
                </div>
                <span>
                    <?php echo $article->lead;?>
                </span>
                <p><span class="media-heading"><?=$article->publication; ?> <?php if (isset($article->login)): ?>
                        <?=$article->login; ?></span></p>
                <?php else:?>
                        Автор: Неизвестен. </span></p>
                <?endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
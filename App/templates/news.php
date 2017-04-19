<div class="col-sm-12 col-md-12 well" id="content">
        <h3><?=$blocktitle?></h3>
    <div>
        <?php foreach ($news as $article): ?>
            <div class="block-news">
                <div class=""><h4><?php echo $article->title;?></h4>
                    <p> <?php if (!empty($article->user)): ?>
                    <span class="media-heading">автор: <?php echo $article->user->nikname; ?></span>
                    <?php endif; ?></p>
                </div>
                <span>
                    <?php echo $article->lead; ?>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
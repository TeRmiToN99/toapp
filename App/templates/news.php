<aside class="col-sm-12 col-md-4 col-lg-3">
    <div class="row block-news">
        <h3><?=$blocktitle?></h3>
        <div class="panel-body msg_container_base">
            <?php foreach ($news as $article): ?>
            <div class="col-sm-6 col-md-12">
                <div class="panel-title"><h4><?php echo $article->title;?></h4>
                <p> <?php if (!empty($article->user)): ?>
                        <span class="media-heading">автор: <?php echo $article->user->nikname; ?></span>
                    <?php endif; ?></p>
                </div>
                <div class="panel-body">
                    <?php echo $article->lead; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</aside>
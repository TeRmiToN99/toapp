<div class="col-sm-12 col-md-12 well hidden-xs hidden-sm" id="content">
        <h3><?=$blocktitle; echo '(' .count($articles) . ')' ;?></h3>
    <div class="block-news">
        <? if(count($articles) > 0 ):?>
        <? $x=0; if(count($articles) > 3 ){$x=3;}else{$x=count($articles);} ?>
            <div class="block_left">
            <? for($i=0; $i<$x; $i++):?>
                <div class="block_news_items">
                    <div class=""><h4><?php echo $articles[$i]->title;?></h4>
                    </div>
                    <span>
                        <?php echo $articles[$i]->lead;?>
                    </span>
                    <p><span class="media-heading"><?=$articles[$i]->publication; ?> <?php if (isset($articles[$i]->user_id)): ?>
                            <?=$users[$articles[$i]->user_id-1]->login; ?></span></p>
                    <?php else:?>
                            Автор: Неизвестен. </span></p>
                    <?endif; ?>
                </div>
            <?endfor;?>
            </div>
        <?endif;?>
        <? if(count($articles) > 3 ):?>
            <? $x=0; if(count($articles) > 6  ){$x=6;}else{$x=count($articles);} ?>
            <div class="block_rigth">
            <? for($i=3; $i<$x; $i++):?>
                <div class="block_news_items ">
                    <div class=""><h4><?php echo $articles[$i]->title;?></h4>
                    </div>
                    <span>
                        <?php echo $articles[$i]->lead;?>
                    </span>
                    <p><span class="media-heading"><?=$articles[$i]->publication; ?> <?php if (isset($articles[$i]->user_id)): ?>
                            <?=$users[$articles[$i]->user_id-1]->login; ?></span></p>
                    <?php else:?>
                        Автор: Неизвестен. </span></p>
                    <?endif; ?>
                </div>
            <?endfor;?>
            </div>
    </div>
    <?endif;?>
    <?if(count($articles) > 6):?>
        <a href="/../article.php?action=Blog">Все новости.</a>
    <?endif;?>
</div>
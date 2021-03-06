<div class="col-sm-12 col-md-12 well" id="form_article">
    <h1>Добавить новость</h1>
    <form id="form_article" action="/App/cpanel/post.php?action=<? echo(!empty($article->id) ? 'Update': 'Insert');?>&post_type=Article" method="post">
        <div class="form-group">
            <label for="title">Заголовок</label><br>
            <input type="text" name="title" id="title" value="<?=$article->title?>">
        </div>
        <div class="form-group">
            <label for="user">Автор:</label><br>
            <select class="form-control" id="user_id" name="user_id">
                <?php foreach ($users as $user):?>
                    <option value="<?=$user->id;?>" <?if($user->id ===$_SESSION['logged_user'][0]->id){echo('selected');}else{echo('disabled');}?>><?=$user->name?></option>
                <?php endforeach; ?>
            </select>
            <!--<input id="<? //echo($_SESSION['logged_user'][0]->id);?>" value="<? //echo($_SESSION['logged_user'][0]->name);?>" readonly>-->
        </div>
        <div class="form-group">
            <label for="lead">Описание</label><br>
            <div class="col-5">
                <textarea class="form-control" name="lead" id="lead" rows="3"><?=$article->lead?></textarea>
            </div>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

<div class="col-sm-12 col-md-12 well">
    <h3>Последние добавленные новости:</h3>
        <?php foreach ($articles as $article): ?>
            <div class="block_news_items">
                <div class="block_news_item" ><h4><?php echo $article->title;?></h4>
                    <div class="link_block">
                        <a class="btn btn-info" href="form.php?action=UpdateArticle&article_id=<?=$article->id;?>"><i class="fa fa-pencil fa-fw"></i></a>
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
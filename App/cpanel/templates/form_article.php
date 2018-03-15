<div class="col-sm-12 col-md-12 well" id="form_article">
    <h1>Добавить новость</h1>
    <form id="form_article" action="/App/cpanel/post.php?action=<? echo(!empty($article->id) ? 'Update': 'Insert');?>&post_type=Article" method="post">
        <div class="form-group">
            <label for="title">Заголовок</label><br>
            <input type="text" name="title" id="title">
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
                <textarea class="form-control" name="lead" id="lead" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

<div class="col-sm-12 col-md-12 well">
    <h3>Последние добавленные новости:</h3>
    <?php foreach ($articles as $article):?>
        <div>
            <h4><?= $article->title;?></h4>
            <p><?= $article->lead;?></p>
        </div>
    <?php endforeach;?>
</div>
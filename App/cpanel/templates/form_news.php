<div class="col-sm-12 col-md-12 well" id="form_news">
    <h1>Добавить новость</h1>
    <form action="Post.php?action=Insert&post_type=News" method="post">
        <div class="form-group">
            <label for="title">Заголовок</label><br>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="user">Автор:</label><br>
            <select class="form-control" id="user">
                <?php foreach ($users as $user):?>
                    <option><?=$user->nikname?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="lead">Краткое описание</label><br>
            <div class="col-5">
                <textarea class="form-control" id="lead" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Описание</label><br>
            <textarea class="form-control" id="description" rows="7"></textarea>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

<div class="col-sm-12 col-md-12 well">
    <h3>Последние добавленные новости:</h3>
    <?php foreach ($allnews as $new):?>
        <div>
            <h4><?= $new->title;?></h4>
            <p><?= $new->lead;?></p>
        </div>
    <?php endforeach;?>
</div>
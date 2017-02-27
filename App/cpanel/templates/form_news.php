<div class="col-sm-12 col-md-12 well" id="form_news">
    <h1>Добавить новость</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="title">Заголовок</label><br>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="user">Автор:</label><br>
            <input type="text" name="user" id="user">
        </div>
        <div class="form-group">
            <label for="lead">Краткое описание</label><br>
            <div class="col-5">
                <textarea class="form-control" id="lead" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Описание</label><br>
            <textarea class="form-control" id="description" rows="5"></textarea>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
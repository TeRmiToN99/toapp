<div class="col-sm-12 col-md-12 well" id="form_user">
    <h1>Добавить пользователя</h1>
    <form action="Post.php?action=Insert&post_type=User" method="post">
        <div class="form-group">
            <label for="nickname">Никнейм</label><br>
            <input type="text" name="nickname" id="nickname">
        </div>
        <div class="form-group">
            <label for="firstname">Имя</label><br>
            <input type="text" name="firstname" id="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Фамилия</label><br>
            <input type="text" name="lastname" id="lastname">
        </div>
        <div class="form-group">
            <label for="email">Почта</label><br>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label><br>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password">Подтвердите пароль</label><br>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
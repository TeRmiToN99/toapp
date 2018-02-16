<?=$msg;?>
<div class="loginform" >
    <h2>Авторизоваться на сервисе:</h2>
    <form action="login.php?action=Login" method="post">
        <div class="form-group row">
            <lable class="control-label col-xs-2" >Логин:</lable>
            <input class="form-control" type="text" name="login" value="<?php echo @$data['login']?>"><br>
            <label class="control-label col-xs-2" >Пароль:</label>
            <input class="form-control" type="password" value="<?php echo @$data['password']; ?>"  name="password"><br>
            <button type="submit" class="btn btn-success" >Войти</button>
        </div>
    </form>
</div>
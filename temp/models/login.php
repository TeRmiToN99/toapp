<!doctype html>
 <html>
<head>
	<meta charset="UTF-8">
	<title>ToApp | Авторизация</title>
	<link rel="stylesheet" type="text/css" href="../tamplates/toapp/css/tamplates.css">
</head>
<body>
<form  id="loginForm" action="controller.php" metod="post">
	
		<div>
			<div><label for="login">Логин:</label></div>
			<input type="text" name="login" id="login">
		</div>
		<div>
			<div><label for="password">Пароль:</label></div>
			<input type="text" name="password" id="password">
		</div>
	<div><input type="submit" value="Подтвердить"></div>
</form>
<footer>
<div class="copy">
<p>ToApp&copy;1998&ndash;<?= date('Y'); ?>.&nbsp;ООО "ТоАст-групп"</p>
</footer>
</body>
</html>
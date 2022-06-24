<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="<?=base_url();?>/auth/login_process">
	<label>Username: </label><input type="text" name="username"><br>
	<label>Password: </label><input type="password" name="password"><br>
	<input type="submit" value="Login"> &nbsp; <a href="<?=base_url()?>/auth/register">Register</a><br>
	<p><?=$error?></p>
</form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="<?=base_url('/login');?>">
	<label>Username: </label><input type="text" name="username"><br>
	<label>Password: </label><input type="password" name="password"><br>
	<input type="submit" value="Login"> &nbsp; <a href="<?=base_url('/register')?>">Register</a><br>
	<p><?php
		if (is_array($notif)) {
			foreach ($notif as $item){
				echo $item['type']." |==| ".$item['message'];
			}
		}
	?></p>
</form>
</body>
</html>
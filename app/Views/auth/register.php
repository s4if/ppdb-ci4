<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="<?=base_url();?>/auth/register_process">
	<label>Username: </label><input type="text" name="username"><br>
	<label>Password: </label><input type="password" name="password"><br>
	<label>Nama: </label><input type="text" name="name"><br>
	<label>Gender: 
		<select name="gender">
			<option value="L">Laki-Laki</option>
			<option value="P">Perempuan</option>
		</select>
	<br>
	<label>Sekolah Sebelumnya: </label><input type="text" name="prev_school"><br>
	<label>NISN: </label><input type="text" name="nisn"><br>
	<label>No. Telp: </label><input type="text" name="contact"><br>
	<label>Program: 
		<select name="program">
			<?php
			foreach ($jurusan as $item) {
				echo '<option value="'.$item->singkatan.'">'.$item->deskripsi.'</option>';
			}
			?>
		</select>
	<br>
	<input type="submit" value="Register"> &nbsp; <a href="<?=base_url()?>/auth/index">Login</a><br>
	<p><?=$error?></p>
</form>
</body>
</html>
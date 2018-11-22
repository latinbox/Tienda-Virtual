<?php
session_start();
include ("includes/db.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Login Administrador</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/login.css" >
</head>
<body>
	<div class="container" ><!-- container Inicio -->
		<form class="form-login" action="" method="post" ><!-- form-login Inicio -->
			<h2 class="form-login-heading" >Login Administrador</h2>
			<input type="text" class="form-control" name="admin_email" placeholder="Correo" required >
			<input type="password" class="form-control" name="admin_pass" placeholder="Contraseña" required >
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login" >
				Log in
			</button>
		</form><!-- form-login Fin -->
	</div><!-- container Fin -->
</body>
</html>

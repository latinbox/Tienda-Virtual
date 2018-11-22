<?php

$con = new mysqli("localhost", "root", "", "tienda_virtual_actual");
if (isset($_POST['admin_login'])) {
	$admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
	$admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);
	$get_admin = "select * from admin where admin_email='$admin_email' AND admin_pass='$admin_pass'";
	$run_admin = mysqli_query($con, $get_admin);
	$count = mysqli_num_rows($run_admin);
	if ($count == 1) {
		$_SESSION['admin_email'] = $admin_email;
		echo "<script>alert('Bienvenido al Panel de Control')</script>";
		echo "<script>window.open('index.php?panel_control','_self')</script>";
	} else {
		echo "<script>alert('Email o Password es incorrecto')</script>";
	}
}

?>
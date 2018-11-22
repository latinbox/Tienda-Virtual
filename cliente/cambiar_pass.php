<h1 align="center">Cambia tu contraseña </h1>
<form action="" method="post"><!-- form Inicio -->
<div class="form-group"><!-- form-group Inicio -->
<label>Ingresa tu contraseña actual</label>
<input type="text" name="old_pass" class="form-control" required>
</div><!-- form-group Fin -->
<div class="form-group"><!-- form-group Inicio -->
<label>Ingresa tu contraseña</label>
<input type="text" name="new_pass" class="form-control" required>
</div><!-- form-group Fin -->
<div class="form-group"><!-- form-group Inicio -->
<label>Ingresa tu contraseña nuevamente</label>
<input type="text" name="new_pass_again" class="form-control" required>
</div><!-- form-group Fin -->
<div class="text-center"><!-- text-center Inicio -->
<button type="submit" name="submit" class="btn btn-primary">
<i class="fa fa-user-md"> </i> Cambiar Contraseña
</button>
</div><!-- text-center Fin -->
</form><!-- form Fin -->
<?php
if (isset($_POST['submit'])) {
	$c_email = $_SESSION['cliente_email'];
	$old_pass = $_POST['old_pass'];
	$new_pass = $_POST['new_pass'];
	$new_pass_again = $_POST['new_pass_again'];
	$sel_old_pass = "select * from cliente where cliente_pass='$old_pass'";
	$run_old_pass = mysqli_query($con, $sel_old_pass);
	$check_old_pass = mysqli_num_rows($run_old_pass);
	if ($check_old_pass == 0) {
		echo "<script>alert('Your Actual contraseña es invalidad, intenta nuevamente')</script>";
		exit();
	}
	if ($new_pass != $new_pass_again) {
		echo "<script>alert('Tu nuevo pass no coincide')</script>";
		exit();
	}
	$update_pass = "update cliente set cliente_pass='$new_pass' where cliente_email='$c_email'";
	$run_pass = mysqli_query($con, $update_pass);
	if ($run_pass) {
		echo "<script>alert('tu contraseña ha sido cambiada exitosamente')</script>";
		echo "<script>window.open('mi_cuenta.php?mis_pedidos','_self')</script>";
	}
}
?>





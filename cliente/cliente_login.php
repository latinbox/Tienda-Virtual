<div class="box" ><!-- box Inicio -->
<div class="box-header" ><!-- box-header Inicio -->
<center>
<h1>Login</h1>
<p class="lead" >Si ya eres parte de camrú closet, ingresa aqui</p>
</center>
<p class="text-muted" >
Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.

</p>
</div><!-- box-header Fin -->
<form action="checkout.php" method="post" ><!--form Inicio -->
<div class="form-group" ><!-- form-group Inicio -->
<label>Email</label>
<input type="text" class="form-control" name="c_email" required >
</div><!-- form-group Fin -->
<div class="form-group" ><!-- form-group Inicio -->
<label>Contraseña</label>
<input type="password" class="form-control" name="c_pass" required >
<h4 align="center">
<a href="forgot_pass.php">Recordar tu contraseña</a>
</h4>
</div><!-- form-group Fin -->
<div class="text-center" ><!-- text-center Inicio -->
<button name="login" value="Login" class="btn btn-primary" >
<i class="fa fa-sign-in" ></i> Log in
</button>
</div><!-- text-center Fin -->
</form><!--form Fin -->
<center><!-- center Inicio -->
<a href="registro_clientes.php" >
<h4>Aún no te registras?.</br>Registro aquí</h4>
</a>
</center><!-- center Fin -->
</div><!-- box Fin -->
<?php
if (isset($_POST['login'])) {
	$cliente_email = $_POST['c_email'];
	$cliente_pass = $_POST['c_pass'];
	$select_cliente = "select * from cliente where cliente_email='$cliente_email' AND cliente_pass='$cliente_pass'";
	$run_cliente = mysqli_query($con, $select_cliente);
	$get_ip = getRealUserIp();
	$check_cliente = mysqli_num_rows($run_cliente);
	$select_carrito = "select * from carrito where ip_add='$get_ip'";
	$run_carrito = mysqli_query($con, $select_carrito);
	$check_carrito = mysqli_num_rows($run_carrito);
	if ($check_cliente == 0) {
		echo "<script>alert('password or email incorrecto')</script>";
		exit();
	}
	if ($check_cliente == 1 AND $check_carrito == 0) {
		$_SESSION['cliente_email'] = $cliente_email;
		echo "<script>alert('Estás logueado.')</script>";
		echo "<script>window.open('cliente/mi_cuenta.php?mis_pedidos','_self')</script>";
	} else {
		$_SESSION['cliente_email'] = $cliente_email;
		echo "<script>alert('Estás logueado')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
}
?>
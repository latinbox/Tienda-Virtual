<?php

$cliente_session = $_SESSION['cliente_email'];
$get_cliente = "select * from cliente where cliente_email='$cliente_session'";
$run_cliente = mysqli_query($con, $get_cliente);
$row_cliente = mysqli_fetch_array($run_cliente);
$cliente_id = $row_cliente['cliente_id'];
$cliente_nombre = $row_cliente['cliente_nombre'];
$cliente_email = $row_cliente['cliente_email'];
$cliente_region = $row_cliente['cliente_region'];
$cliente_ciudad = $row_cliente['cliente_ciudad'];
$cliente_contacto = $row_cliente['cliente_contacto'];
$cliente_direccion = $row_cliente['cliente_direccion'];


?>

<h1 align="center" > Edita tu cuenta </h1>
<form action="" method="post" enctype="multipart/form-data" ><!--- form Inicio -->
	<div class="form-group" ><!-- form-group Inicio -->
		<label> cliente Nombre: </label>
		<input type="text" name="c_nombre" class="form-control" required value="<?php echo $cliente_nombre;?>">
	</div><!-- form-group Fin -->
	<div class="form-group" ><!-- form-group Inicio -->
		<label> cliente Email: </label>
		<input type="text" name="c_email" class="form-control" required value="<?php echo $cliente_email;?>">
	</div><!-- form-group Fin -->
	<div class="form-group" ><!-- form-group Inicio -->
		<label> cliente Region: </label>
		<input type="text" name="c_region" class="form-control" required value="<?php echo $cliente_region;?>">
	</div><!-- form-group Fin -->
	<div class="form-group" ><!-- form-group Inicio -->
		<label> cliente Ciudad: </label>
		<input type="text" name="c_ciudad" class="form-control" required value="<?php echo $cliente_ciudad;?>">
	</div><!-- form-group Fin -->
	<div class="form-group" ><!-- form-group Inicio -->
		<label> cliente nr. contacto: </label>
		<input type="text" name="c_contacto" class="form-control" required value="<?php echo $cliente_contacto;?>">
	</div><!-- form-group Fin -->
	<div class="form-group" ><!-- form-group Inicio -->
		<label> cliente Dirección: </label>
		<input type="text" name="c_direccion" class="form-control" required value="<?php echo $cliente_direccion;?>">
	</div><!-- form-group Fin -->
	<div class="text-center" ><!-- text-center Inicio -->
		<button name="update" class="btn btn-primary" >
			<i class="fa fa-user-md" ></i> Actualizar ahora
		</button>


	</div><!-- text-center Fin -->


</form><!--- form Fin -->

<?php

if (isset($_POST['update'])) {

	$update_id = $cliente_id;
	$c_nombre = $_POST['c_nombre'];
	$c_email = $_POST['c_email'];
	$c_region = $_POST['c_region'];
	$c_ciudad = $_POST['c_ciudad'];
	$c_contacto = $_POST['c_contacto'];
	$c_direccion = $_POST['c_direccion'];


	

	$update_cliente = "update cliente set cliente_nombre='$c_nombre',cliente_email='$c_email',cliente_region='$c_region',cliente_ciudad='$c_ciudad',cliente_contacto='$c_contacto',cliente_direccion='$c_direccion' where cliente_id='$update_id'";

	$run_cliente = mysqli_query($con, $update_cliente);

	if ($run_cliente) {

		echo "<script>alert('Tu cuenta ha sido actualizada, porfavor vuelve a ingresar')</script>";

		echo "<script>window.open('logout.php','_self')</script>";

	}

}

?>
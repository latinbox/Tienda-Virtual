<center>
<h1>Realmente quieres eliminar tu cuenta?!</h1>
<form action="" method="post">
<input class="btn btn-danger" type="submit" name="yes" value="Si, la quiero eliminar">
<input class="btn btn-primary" type="submit" name="no" value="No, no quiero eliminarla">
</form>
</center>
<?php
$c_email = $_SESSION['cliente_email'];
if (isset($_POST['yes'])) {
	$delete_cliente = "delete from cliente where cliente_email='$c_email'";
	$run_delete = mysqli_query($con, $delete_cliente);
	if ($run_delete) {
		session_destroy();
		echo "<script>alert('Tu cuenta ha sido eliminada.Adios')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}
}
if (isset($_POST['no'])) {
	echo "<script>window.open('mi_cuenta.php?mis_pedidos','_self')</script>";
}
?>

<?php
if (isset($_GET['borrar_lista_deseos'])) {
	$borrar_id = $_GET['borrar_lista_deseos'];
	$borrar_lista_deseos = "delete from wishlist where wishlist_id='$borrar_id'";
	$run_borrar = mysqli_query($con, $borrar_lista_deseos);
	if ($run_borrar) {
		echo "<script>alert('Producto ha sido eliminado de la lista de deseos')</script>";
		echo "<script>window.open('mi_cuenta.php?borrar_lista_deseos','_self')</script>";
	}
}

?>


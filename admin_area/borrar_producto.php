<?php

if (!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

} else {

	?>

	<?php

	if (isset($_GET['borrar_producto'])) {

		$borrar_id = $_GET['borrar_producto'];

		$delete_pro = "delete from producto where producto_id='$borrar_id'";

		$run_delete = mysqli_query($con, $delete_pro);

		if ($run_delete) {

			echo "<script>alert('El producto ha sido eliminado')</script>";

			echo "<script>window.open('index.php?ver_productos','_self')</script>";

		}

	}

	?>

	<?php }?>
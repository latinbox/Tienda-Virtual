<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<?php
	if (isset($_GET['borrar_cat'])) {
		$borrar_id  = $_GET['borrar_cat'];
		$borrar_cat = "delete from categoria where cat_id='$borrar_id'";
		$run_delete = mysqli_query($con, $borrar_cat);
		if ($run_delete) {
			echo "<script> alert('La categoria ha sido elimnada exitosamente') </script>";
			echo "<script>window.open('index.php?ver_cats','_self')</script>";
		}
	}
	?>

	<?php }?>
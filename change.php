<?php

session_start();

include ("includes/db.php");

include ("funciones/funciones.php");

?>

<?php

$ip_add = getRealUserIp();

if (isset($_POST['id'])) {

	$id = $_POST['id'];

	$cantidad = $_POST['cantidad'];

	$change_qty = "update carrito set cantidad='$cantidad' where p_id='$id' AND ip_add='$ip_add'";

	$run_qty = mysqli_query($con, $change_qty);

}

?>
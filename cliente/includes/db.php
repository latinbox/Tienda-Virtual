<?php
$con = new mysqli("localhost", "root", "", "tienda_virtual_actual");
//$con = mysqli_connect("localhost", "root", "", "tienda_virtual_actual");
if ($con->connect_errno) {
	printf("Conexión a base de datos fallada: %s\n", $mysqli->connect_error);
	exit();
}
?>
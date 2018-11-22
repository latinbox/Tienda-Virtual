<?php
include ("includes/db.php");
include ("funciones/funciones.php");
?>
<?php
if (isset($_GET['c_id'])) {
	$cliente_id = $_GET['c_id'];
}

//Traspaso de datos desde tabla "carrito" a Tabla "pedido_cliente"

$ip_add         = getRealUserIp();
$estado         = "completado";
$nr_boleta      = mt_rand();
$select_carrito = "select * from carrito where ip_add='$ip_add'";
$run_carrito    = mysqli_query($con, $select_carrito);
while ($row_carrito = mysqli_fetch_array($run_carrito)) {
	$pro_id                    = $row_carrito['p_id'];
	$pro_tamano                = $row_carrito['tamano'];
	$cantidad_pedida           = $row_carrito['cantidad'];
	$sub_total                 = $row_carrito['p_precio']*$cantidad_pedida;
	$get_productos             = "select * from producto where producto_id='$pro_id'";
	$run_productos             = mysqli_query($con, $get_productos);
	$fila_productos            = mysqli_fetch_array($run_productos);
	$producto_cantidad         = $fila_productos['producto_cantidad'];
	$cantidad_final_disponible = $producto_cantidad-$cantidad_pedida;

	// actualizar productos
	$actualizar_cant_producto = "update producto set producto_cantidad='$cantidad_final_disponible' where producto_id='$pro_id'";
	$run_cantidad             = mysqli_query($con, $actualizar_cant_producto);

	$insertar_pedido_cliente = "insert into pedido_cliente (cliente_id,monto,nr_boleta,cantidad,tamano,fecha_pedido,pedido_estado) values ('$cliente_id','$sub_total','$nr_boleta','$cantidad_pedida','$pro_tamano',NOW(),'$estado')";
	$run_cliente_order       = mysqli_query($con, $insertar_pedido_cliente);

	$delete_carrito = "delete from carrito where ip_add='$ip_add'";
	$run_delete     = mysqli_query($con, $delete_carrito);
	echo "<script>alert('Tu pedido ha sido agregado a tu cuenta personal, Gracias')</script>";
	echo "<script>window.open('cliente/mi_cuenta.php?mis_pedidos','_self')</script>";

}

?>




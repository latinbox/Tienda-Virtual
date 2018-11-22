<div class="box"><!-- box Inicio -->
<?php
$session_email  = $_SESSION['cliente_email'];
$select_cliente = "select * from cliente where cliente_email='$session_email'";
$run_cliente    = mysqli_query($con, $select_cliente);
$row_cliente    = mysqli_fetch_array($run_cliente);
$cliente_id     = $row_cliente['cliente_id'];
?>

	<h1 class="text-center">Opciones de pago para ti</h1>


<center><!-- center Starts -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"><!-- form Starts -->
<input type="hidden" name="business" value="rutsita@gmail.com">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="http://192.168.43.108/tienda_virtual_prototipo/pedido_paypal.php?c_id=<?php echo $cliente_id;?>">
<input type="hidden" name="cancel_return" value="http://192.168.43.108/tienda_virtual_prototipo/index.php">
<?php
$i        = 0;
$ip_add   = getRealUserIp();
$get_cart = "select * from carrito where ip_add='$ip_add'";
$run_cart = mysqli_query($con, $get_cart);
while ($row_cart = mysqli_fetch_array($run_cart)) {
	$pro_id          = $row_cart['p_id'];
	$pro_cantidad    = $row_cart['cantidad'];
	$pro_precio      = $row_cart['p_precio'];
	$get_productos   = "select * from producto where producto_id='$pro_id'";
	$run_productos   = mysqli_query($con, $get_productos);
	$fila_productos  = mysqli_fetch_array($run_productos);
	$producto_titulo = $fila_productos['producto_titulo'];
	$i++;
	?>
				<input type="hidden" name="item_name_<?php echo $i;?>" value="<?php echo $producto_titulo;?>" >
				<input type="hidden" name="item_number_<?php echo $i;?>" value="<?php echo $i;?>" >
				<input type="hidden" name="amount_<?php echo $i;?>" value="<?php echo $pro_precio;?>" >
				<input type="hidden" name="quantity_<?php echo $i;?>" value="<?php echo $pro_cantidad;?>" >
	<?php }?>
<input type="image" name="submit" width="500" height="270" src="images/paypal.png" >
</form><!-- form Ends -->
</center><!-- center Ends -->
</div><!-- box Fin -->
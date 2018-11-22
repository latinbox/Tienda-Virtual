<center><!-- center Inicio -->
<h1>Mis Pedidos</h1>
<p class="lead"> Tus pedidos en un solo sitio</p>
<p class="text-muted" >
Si tiene alguna consulta, no dude en preguntarnos<a href="../contacto.php" > Contáctanos,</a>

</p>


</center><!-- center Fin -->
<hr>
<div class="table-responsive" ><!-- table-responsive Inicio -->
<table class="table table-bordered table-hover" ><!-- table table-bordered table-hover Inicio -->
<thead><!-- thead Inicio -->
<tr>

<th>ID N:</th>
<th>Monto:</th>
<th>Nr Boleta:</th>
<th>Cantidad:</th>
<th>Tamaño:</th>
<th>Fecha Pedido:</th>
<th>Pagado/Nopagado:</th>


</tr>

</thead><!-- thead Fin -->

<tbody><!--- tbody Inicio --->

<?php

$cliente_session = $_SESSION['cliente_email'];
$get_cliente     = "select * from cliente where cliente_email='$cliente_session'";
$run_cliente     = mysqli_query($con, $get_cliente);
$row_cliente     = mysqli_fetch_array($run_cliente);
$cliente_id      = $row_cliente['cliente_id'];
$get_orders      = "select * from pedido_cliente where cliente_id='$cliente_id'";
$run_orders      = mysqli_query($con, $get_orders);

$i = 0;

while ($fila_pedidos = mysqli_fetch_array($run_orders)) {

	$pedido_id     = $fila_pedidos['pedido_id'];
	$monto         = $fila_pedidos['monto'];
	$nr_boleta     = $fila_pedidos['nr_boleta'];
	$cantidad      = $fila_pedidos['cantidad'];
	$tamano        = $fila_pedidos['tamano'];
	$fecha_pedido  = substr($fila_pedidos['fecha_pedido'], 0, 11);
	$pedido_estado = $fila_pedidos['pedido_estado'];
	$i++;
	if ($pedido_estado == 'completado') {
		$pedido_estado = "Pagado";
	} else {
		$pedido_estado = "NoPagado";
	}
	?>

							<tr><!-- tr Inicio -->
							<th><?php echo $i;?></th>
							<td>$<?php echo $monto;?></td>
							<td><?php echo $nr_boleta;?></td>
							<td><?php echo $cantidad;?></td>
							<td><?php echo $tamano;?></td>
							<td><?php echo $fecha_pedido;?></td>
							<td><?php echo $pedido_estado;?></td>
							</tr><!-- tr Fin -->

	<?php }?>
</tbody><!--- tbody Fin --->


</table><!-- table table-bordered table-hover Fin -->

</div><!-- table-responsive Fin -->




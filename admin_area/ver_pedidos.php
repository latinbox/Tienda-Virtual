<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<div class="row"><!-- 1 row Inicio -->
				<div class="col-lg-12"><!-- col-lg-12 Inicio -->
					<ol class="breadcrumb"><!-- breadcrumb Inicio  --->
						<li class="active">
							<i class="fa fa-Panel de Control"></i> Panel de Control / Ver Pedidos
						</li>
					</ol><!-- breadcrumb Fin  --->
				</div><!-- col-lg-12 Fin -->
			</div><!-- 1 row Fin -->
			<div class="row"><!-- 2 row Inicio -->
				<div class="col-lg-12"><!-- col-lg-12 Inicio -->
					<div class="panel panel-default"><!-- panel panel-default Inicio -->
						<div class="panel-heading"><!-- panel-heading Inicio -->
							<h3 class="panel-title"><!-- panel-title Inicio -->
								<i class="fa fa-money fa-fw"></i> Ver Pedidos
							</h3><!-- panel-title Fin -->
						</div><!-- panel-heading Fin -->
						<div class="panel-body"><!-- panel-body Inicio -->
							<div class="table-responsive"><!-- table-responsive Inicio -->
								<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Inicio -->
									<thead><!-- thead Inicio -->
										<tr>
												<!--
														<th>Id Pedido:</th>
														<th>Email del Cliente:</th>
														<th>Nr Boleta:</th>
														<th>Nombre:</th>
														<th>Cantidad:</th>
														<th>Tamano:</th>
														<th>Fecha:</th>
														<th>Valor Total:</th>
														<th>Estado del pedido:</th>
														<th>Borrar Pedido:</th>
													-->
													<th>ID del Pedido:</th>
													<th>ID del Cliente:</th>
													<th>Monto:</th>
													<th>Nr Boleta:</th>
													<th>Cantidad:</th>
													<th>Tamaño:</th>
													<th>Fecha Pedido:</th>
													<th>Pagado/Nopagado:</th>
												</tr>
											</thead><!-- thead Fin -->

											<tbody><!-- tbody Inicio -->
	<?php

	//$cliente_session = $_SESSION['admin_email'];
	//$get_cliente     = "select * from cliente";
	//$run_cliente     = mysqli_query($con, $get_cliente);
	//$row_cliente     = mysqli_fetch_array($run_cliente);
	//$cliente_id      = $row_cliente['cliente_id'];
	$get_orders = "select * from pedido_cliente";
	$run_orders = mysqli_query($con, $get_orders);

	$i = 0;

	while ($fila_pedidos = mysqli_fetch_array($run_orders)) {

		$pedido_id     = $fila_pedidos['pedido_id'];
		$cliente_id    = $fila_pedidos['cliente_id'];
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
																<th><?php echo $cliente_id;?></th>
																<td>$<?php echo $monto;?></td>
																<td><?php echo $nr_boleta;?></td>
																<td><?php echo $cantidad;?></td>
																<td><?php echo $tamano;?></td>
																<td><?php echo $fecha_pedido;?></td>
																<td><?php echo $pedido_estado;?></td>
															</tr><!-- tr Fin -->

		<?php }?>
	</tbody><!-- tbody Fin -->
										</table><!-- table table-bordered table-hover table-striped Fin -->
									</div><!-- table-responsive Fin -->
								</div><!-- panel-body Fin -->
							</div><!-- panel panel-default Fin -->
						</div><!-- col-lg-12 Fin -->
					</div><!-- 2 row Fin -->
	<?php }?>
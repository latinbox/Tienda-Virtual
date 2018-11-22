<?php

if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<div class="row"><!-- 1 row Inicio -->
									<div class="col-lg-12"><!-- col-lg-12 Inicio -->
									<ol class="breadcrumb"><!-- breadcrumb Inicio -->
									<li class="active">
									<i class="fa fa-Panel de Control"></i> Panel de Control / Ver clientes
									</li>
									</ol><!-- breadcrumb Fin -->
									</div><!-- col-lg-12 Fin -->
									</div><!-- 1 row Fin -->
									<div class="row"><!-- 2 row Inicio -->
									<div class="col-lg-12"><!-- col-lg-12 Inicio -->
									<div class="panel panel-default"><!-- panel panel-default Inicio -->
									<div class="panel-heading"><!-- panel-heading Inicio -->
									<h3 class="panel-title"><!-- panel-title Inicio -->
									<i class="fa fa-money fa-fw"></i> Ver clientes
									</h3><!-- panel-title Fin -->
									</div><!-- panel-heading Fin -->
									<div class="panel-body" ><!-- panel-body Inicio -->
									<div class="table-responsive" ><!-- table-responsive Inicio -->
									<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Inicio -->
									<thead><!-- thead Inicio -->
									<tr>
									<th>Id Cliente:</th>
									<th>Nombre:</th>
									<th>Email:</th>
									<th>Region:</th>
									<th>Ciudad:</th>
									<th>Número de telefono:</th>
									<th>Borrar:</th>
									</tr>
									</thead><!-- thead Fin -->
									<tbody><!-- tbody Inicio -->
	<?php
	$i     = 0;
	$get_c = "select * from cliente";
	$run_c = mysqli_query($con, $get_c);
	while ($row_c = mysqli_fetch_array($run_c)) {
		$c_id       = $row_c['cliente_id'];
		$c_name     = $row_c['cliente_nombre'];
		$c_email    = $row_c['cliente_email'];
		$c_region   = $row_c['cliente_region'];
		$c_ciudad   = $row_c['cliente_ciudad'];
		$c_contacto = $row_c['cliente_contacto'];
		$i++;
		?>

																		<tr>
																		<td><?php echo $c_id;?></td>
																		<td><?php echo $c_name;?></td>
																		<td><?php echo $c_email;?></td>
																		<td><?php echo $c_region;?></td>
																		<td><?php echo $c_ciudad;?></td>
																		<td><?php echo $c_contacto;?></td>
																		<td>
																		<a href="index.php?borrar_cliente=<?php echo $c_id;?>" >
																		<i class="fa fa-trash-o" ></i> Borrar
																		</a>
																		</td>
																		</tr>

		<?php }?>
	</tbody><!-- tbody Fin -->

									</table><!-- table table-bordered table-hover table-striped Fin -->
									</div><!-- table-responsive Fin -->
									</div><!-- panel-body Fin -->
									</div><!-- panel panel-default Fin -->
									</div><!-- col-lg-12 Fin -->
									</div><!-- 2 row Fin -->
	<?php }?>
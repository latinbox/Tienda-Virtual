<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<div class="row"><!--  1 row Inicio -->
								<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
								<ol class="breadcrumb" ><!-- breadcrumb Inicio -->
								<li class="active" >
								<i class="fa fa-Panel de Control"></i> Panel de Control / Ver Productos
								</li>
								</ol><!-- breadcrumb Fin -->
								</div><!-- col-lg-12 Fin -->
								</div><!--  1 row Fin -->
								<div class="row" ><!-- 2 row Inicio -->
								<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
								<div class="panel panel-default" ><!-- panel panel-default Inicio -->
								<div class="panel-heading" ><!-- panel-heading Inicio -->
								<h3 class="panel-title" ><!-- panel-title Inicio -->
								<i class="fa fa-money fa-fw" ></i> Ver Productos
								</h3><!-- panel-title Fin -->
								</div><!-- panel-heading Fin -->
								<div class="panel-body" ><!-- panel-body Inicio -->
								<div class="table-responsive" ><!-- table-responsive Inicio -->
								<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Inicio -->
								<thead>
								<tr>
								<th> ID</th>
								<th> Titulo</th>
								<th> Imagen</th>
								<th> Precio</th>
								<th>Disponibles</th>
								<th> Fecha</th>
								<th> Borrar</th>
								<th> Editar</th>
								</tr>

								</thead>

								<tbody>

	<?php

	$i = 0;

	$get_pro = "select * from producto";

	$run_pro = mysqli_query($con, $get_pro);

	while ($fila_productos = mysqli_fetch_array($run_pro)) {

		$pro_id       = $fila_productos['producto_id'];
		$pro_titulo   = $fila_productos['producto_titulo'];
		$pro_image    = $fila_productos['producto_img1'];
		$pro_precio   = $fila_productos['producto_precio'];
		$pro_cantidad = $fila_productos['producto_cantidad'];
		$pro_fecha    = $fila_productos['fecha'];
		$i++;

		?>

																<tr>
																<!-- Columna Indice -->
																<td><?php echo $i;?></td>
										<!-- Columna Titulo-->
																<td><?php echo $pro_titulo;?></td>
										<!-- Columna Imagen-->
																<td><img src="product_images/<?php echo $pro_image;?>" width="60" height="60"></td>
										<!-- Columna Precio -->
																<td>$ <?php echo $pro_precio;?></td>
																<!-- Columna Cantidad -->
																<td> <?php echo $pro_cantidad;?></td>
																<!-- Columna Fecha -->
																<td> <?php echo $pro_fecha?></td>
																<td>

																<a href="index.php?borrar_producto=<?php echo $pro_id;?>">

																<i class="fa fa-trash-o"> </i> Borrar

																</a>

																</td>



																<td>

																<a href="index.php?editar_producto=<?php echo $pro_id;?>">

																<i class="fa fa-pencil"> </i> Editar

																</a>

																</td>

																</tr>

		<?php }?>
	</tbody>


								</table><!-- table table-bordered table-hover table-striped Fin -->
								</div><!-- table-responsive Fin -->
								</div><!-- panel-body Fin -->
								</div><!-- panel panel-default Fin -->
								</div><!-- col-lg-12 Fin -->
								</div><!-- 2 row Fin -->


	<?php }?>
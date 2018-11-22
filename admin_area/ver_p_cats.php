<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<div class="row"><!-- 1 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
		<ol class="breadcrumb"><!-- breadcrumb Inicio -->
		<li class="active">
		<i class="fa fa-Panel de Control"></i> Panel de Control / Ver Categoria de Productos
		</li>
		</ol><!-- breadcrumb Fin -->
		</div><!-- col-lg-12 Fin -->
		</div><!-- 1 row Fin -->
		<div class="row"><!-- 2 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
		<div class="panel panel-default"><!-- panel panel-default Inicio -->
		<div class="panel-heading"><!-- panel-heading Inicio -->
		<h3 class="panel-title"><!-- panel-title Inicio -->
		<i class="fa fa-money fa-fw"> </i> Ver Categoria de Productos
		</h3><!-- panel-title Fin -->
		</div><!-- panel-heading Fin -->
		<div class="panel-body"><!-- panel-body Inicio -->
		<div class="table-responsive"><!-- table-responsive Inicio -->
		<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Inicio -->
		<thead><!-- thead Inicio -->
		<tr>
		<th>Id</th>
		<th>Titulo</th>
		<th>Borrar</th>
		<th>Editar</th>
		</tr>
		</thead><!-- thead Fin -->
		<tbody><!-- tbody Inicio -->
	<?php
	$i = 0;
	$get_p_cats = "select * from producto_categoria";
	$run_p_cats = mysqli_query($con, $get_p_cats);
	while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
		$p_cat_id = $row_p_cats['p_cat_id'];
		$p_cat_title = $row_p_cats['p_cat_titulo'];
		$i++;
		?>
				<tr>
				<td> <?php echo $i;?> </td>
				<td> <?php echo $p_cat_title;?> </td>
				<td>
				<a href="index.php?borrar_p_cat=<?php echo $p_cat_id;?>">
				<i class="fa fa-trash-o"></i> Borrar
				</a>
				</td>
				<td>
				<a href="index.php?editar_p_cat=<?php echo $p_cat_id;?>">
				<i class="fa fa-pencil"></i> Editar
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
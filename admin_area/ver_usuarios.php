<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<div class="row" ><!-- 1 row Inicio -->
	<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
	<ol class="breadcrumb" ><!-- breadcrumb Inicio -->
	<li class="active" >
	<i class="fa fa-Panel de Control" ></i> Panel de Control / Ver Usuarios Admins
	</li>
	</ol><!-- breadcrumb Fin -->
	</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row" ><!-- 2 row Inicio -->
	<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
	<div class="panel panel-default" ><!-- panel panel-default Inicio -->
	<div class="panel-heading" ><!-- panel-heading Inicio -->
	<h3 class="panel-title" ><!-- panel-title Inicio -->
	<i class="fa fa-money fa-fw" ></i> Ver Usuarios Admins
	</h3><!-- panel-title Fin -->
	</div><!-- panel-heading Fin -->
	<div class="panel-body" ><!-- panel-body Inicio -->
	<div class="table-responsive" ><!-- table-responsive Inicio -->
	<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Inicio -->
	<thead><!-- thead Inicio -->
	<tr>
	<th>Nombre:</th>
	<th>Email:</th>
	<th>Imagen:</th>
	<th>Borrar:</th>
	</tr>
	</thead><!-- thead Fin -->
	<tbody><!-- tbody Inicio -->
	<?php
	$get_admin = "select * from admin";
	$run_admin = mysqli_query($con, $get_admin);
	while ($row_admin = mysqli_fetch_array($run_admin)) {
		$admin_id = $row_admin['admin_id'];
		$admin_nombre = $row_admin['admin_nombre'];
		$admin_email = $row_admin['admin_email'];
		$admin_imagen = $row_admin['admin_imagen'];
		?>
		<tr>
		<td><?php echo $admin_nombre;?></td>
		<td><?php echo $admin_email;?></td>
		<td><img src="admin_images/<?php echo $admin_imagen;?>" width="60" height="60" ></td>
		<td>
		<a href="index.php?borrar_usuario=<?php echo $admin_id;?>" >
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
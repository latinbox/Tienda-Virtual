<?php

if (!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

} else {

	?>
	<div class="row"><!-- 1 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
			<ol class="breadcrumb"><!-- breadcrumb Inicio -->
				<li class="active" >
					<i class="fa fa-Panel de Control"></i> Panel de Control / Ver Misiones
				</li>
			</ol><!-- breadcrumb Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row"><!-- 2 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
			<div class="panel panel-default"><!-- panel panel-default Inicio -->
				<div class="panel-heading"><!-- panel-heading Inicio -->
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"></i> Ver Misiones
					</h3>
				</div><!-- panel-heading Fin -->
				<div class="panel-body"><!-- panel-body Inicio -->
					<?php
					$get_boxes = "select * from mision";
					$run_boxes = mysqli_query($con, $get_boxes);
					while ($row_boxes = mysqli_fetch_array($run_boxes)) {
						$mision_id = $row_boxes['mision_id'];
						$mision_titulo = $row_boxes['mision_titulo'];
						$mision_desc = $row_boxes['mision_desc'];
						?>
						<div class="col-lg-4 col-md-4"><!-- col-lg-4 col-md-4 Inicio -->
							<div class="panel panel-primary"><!-- panel panel-primary Inicio -->
								<div class="panel-heading"><!-- panel-heading Inicio -->
									<h3 class="panel-title" align="center"><!-- panel-title Inicio -->
										<?php echo $mision_titulo;?>
									</h3><!-- panel-title Fin -->
								</div><!-- panel-heading Fin -->
								<div class="panel-body"><!-- panel-body Inicio -->
									<?php echo $mision_desc;?>
								</div><!-- panel-body Fin -->
								<div class="panel-footer"><!-- panel-footer Inicio -->
									<a href="index.php?borrar_mision=<?php echo $mision_id;?>" class="pull-left">
										<i class="fa fa-trash-o"></i> Borrar
									</a>
									<a href="index.php?editar_mision=<?php echo $mision_id;?>" class="pull-right">
										<i class="fa fa-pencil"></i> Editar
									</a>
									<div class="clearfix"></div>
								</div><!-- panel-footer Fin -->
							</div><!-- panel panel-primary Fin -->
						</div><!-- col-lg-4 col-md-4 Fin -->
					<?php }?>
				</div><!-- panel-body Fin -->
			</div><!-- panel panel-default Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 2 row Fin -->
	<?php }?>
<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<div class="row"><!-- 1 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
			<ol class="breadcrumb"><!-- breadcrumb Inicio -->
				<li class="active">
					<i class="fa fa-Panel de Control"></i> Panel de Control / Ver Slides
				</li>
			</ol><!-- breadcrumb Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row"><!-- 2 row Inicio  -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
			<div class="panel panel-default"><!-- panel panel-default Inicio -->
				<div class="panel-heading"><!-- panel-heading Inicio -->
					<h3 class="panel-title"><!-- panel-title Inicio -->
						<i class="fa fa-money fa-fw"></i> Ver Slides
					</h3><!-- panel-title Fin -->
				</div><!-- panel-heading Fin -->
				<div class="panel-body" ><!-- panel-body Inicio -->
					<?php
					$get_slides = "select * from slider";
					$run_slides = mysqli_query($con, $get_slides);
					while ($fila_slides = mysqli_fetch_array($run_slides)) {
						$slide_id = $fila_slides['slide_id'];
						$slide_nombre = $fila_slides['slide_nombre'];
						$slide_imagen = $fila_slides['slide_imagen'];
						
						?>
						<div class="col-lg-3 col-md-3" ><!-- col-lg-3 col-md-3 Inicio -->
							<div class="panel panel-primary" ><!-- panel panel-primary Inicio --->
								<div class="panel-heading" ><!-- panel-heading Inicio -->
									<h3 class="panel-title" align="center" >
										<?php echo $slide_nombre;?>
									</h3>
								</div><!-- panel-heading Fin -->
								<div class="panel-body" ><!-- panel-body Inicio -->
									<img src="slides_images/<?php echo $slide_imagen;?>" class="img-responsive" >
								</div><!-- panel-body Fin -->
								<div class="panel-footer" ><!-- panel-footer Inicio -->
									<center><!-- center Inicio -->
										<a href="index.php?borrar_slide=<?php echo $slide_id;?>" class="pull-left" >
											<i class="fa fa-trash-o" ></i> Borrar 
										</a>
										<a href="index.php?editar_slide=<?php echo $slide_id;?>" class="pull-right" >
											<i class="fa fa-pencil" ></i> Editar
										</a>
										<div class="clearfix" >
										</div>
									</center><!-- center Fin -->
								</div><!-- panel-footer Fin -->
							</div><!-- panel panel-primary Fin --->
						</div><!-- col-lg-3 col-md-3 Fin -->
					<?php }?>
				</div><!-- panel-body Fin -->
			</div><!-- panel panel-default Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 2 row Fin  -->
	<?php }?>
<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<div class="row"><!-- 1 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
			<h1 class="page-header">Panel de Control</h1>
			<ol class="breadcrumb"><!-- breadcrumb Inicio -->
				<li class="active">
					<i class="fa fa-Panel de Control"></i> Panel de Control
				</li>
			</ol><!-- breadcrumb Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row"><!-- 2 row Inicio -->
		<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicio -->
			<div class="panel panel-primary"><!-- panel panel-primary Inicio -->
				<div class="panel-heading"><!-- panel-heading Inicio -->
					<div class="row"><!-- panel-heading row Inicio -->
						<div class="col-xs-3"><!-- col-xs-3 Inicio -->
							<i class="fa fa-tasks fa-5x"> </i>
						</div><!-- col-xs-3 Fin -->
						<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Inicio -->
							<div class="huge"> <?php echo $contar_productos;?> </div>
							<div>Productos</div>
						</div><!-- col-xs-9 text-right Fin -->
					</div><!-- panel-heading row Fin -->
				</div><!-- panel-heading Fin -->
				<a href="index.php?ver_productos">
					<div class="panel-footer"><!-- panel-footer Inicio -->
						<span class="pull-left"> Ver detalles </span>
						<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
						<div class="clearfix"></div>
					</div><!-- panel-footer Fin -->
				</a>
			</div><!-- panel panel-primary Fin -->
		</div><!-- col-lg-3 col-md-6 Fin -->
		<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicio -->
			<div class="panel panel-green"><!-- panel panel-green Inicio -->
				<div class="panel-heading"><!-- panel-heading Inicio -->
					<div class="row"><!-- panel-heading row Inicio -->
						<div class="col-xs-3"><!-- col-xs-3 Inicio -->
							<i class="fa fa-comments fa-5x"> </i>
						</div><!-- col-xs-3 Fin -->
						<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Inicio -->
							<div class="huge"> <?php echo $contar_clientes;?> </div>
							<div>Clientes</div>
						</div><!-- col-xs-9 text-right Fin -->
					</div><!-- panel-heading row Fin -->
				</div><!-- panel-heading Fin -->
				<a href="index.php?ver_clientes">
					<div class="panel-footer"><!-- panel-footer Inicio -->
						<span class="pull-left"> Ver detalles </span>
						<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
						<div class="clearfix"></div>
					</div><!-- panel-footer Fin -->
				</a>
			</div><!-- panel panel-green Fin -->
		</div><!-- col-lg-3 col-md-6 Fin -->

		<div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Inicio -->
			<div class="panel panel-yellow"><!-- panel panel-yellow Inicio -->
				<div class="panel-heading"><!-- panel-heading Inicio -->
					<div class="row"><!-- panel-heading row Inicio -->
						<div class="col-xs-3"><!-- col-xs-3 Inicio -->
							<i class="fa fa-Tiendaping-carrito fa-5x"> </i>
						</div><!-- col-xs-3 Fin -->
						<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Inicio -->
							<div class="huge"> <?php echo $contar_p_categorias;?> </div>
							<div>Categoría de Productos </div>
						</div><!-- col-xs-9 text-right Fin -->
					</div><!-- panel-heading row Fin -->
				</div><!-- panel-heading Fin -->
				<a href="index.php?ver_p_cats">
					<div class="panel-footer"><!-- panel-footer Inicio -->
						<span class="pull-left"> Ver detalles </span>
						<span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
						<div class="clearfix"></div>
					</div><!-- panel-footer Fin -->
				</a>
			</div><!-- panel panel-yellow Fin -->

		</div><!-- col-lg-3 col-md-6 Fin -->
	</div><!-- 2 row Fin -->
	<div class="row" ><!-- 3 row Inicio -->
		<div class="col-lg-8" ><!-- col-lg-8 Inicio -->
			<div class="panel panel-primary" ><!-- panel panel-primary Inicio -->
				<div class="panel-heading" ><!-- panel-heading Inicio -->
					<h3 class="panel-title" ><!-- panel-title Inicio -->
						<i class="fa fa-money fa-fw" ></i> Nuevos Pedidos
					</h3><!-- panel-title Fin -->
				</div><!-- panel-heading Fin -->
				<div class="panel-body" ><!-- panel-body Inicio -->
					<div class="table-responsive" ><!-- table-responsive Inicio -->
						<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Inicio -->
							<thead><!-- thead Inicio -->
								<tr>
									<th>Order No:</th>
									<th>cliente Email:</th>
									<th>Nr. Boleta:</th>
									<th>Producto ID:</th>
									<th>Producto cantidad:</th>
									<th>Producto tamano:</th>
									<th>Estado:</th>

								</tr>
							</thead><!-- thead Fin -->
						</table><!-- table table-bordered table-hover table-striped Fin -->
					</div><!-- table-responsive Fin -->
					<div class="text-right" ><!-- text-right Inicio -->
						<a href="index.php?ver_pedidos" >
							Ver todos los pedidos <i class="fa fa-arrow-circle-right" ></i>
						</a>
					</div><!-- text-right Fin -->
				</div><!-- panel-body Fin -->
			</div><!-- panel panel-primary Fin -->
		</div><!-- col-lg-8 Fin -->
		<div class="col-md-4"><!-- col-md-4 Inicio -->
			<div class="panel"><!-- panel Inicio -->
				<div class="panel-body"><!-- panel-body Inicio -->
					<div class="thumb-info mb-md"><!-- thumb-info mb-md Inicio -->
						<img src="admin_images/<?php echo $admin_image;?>" class="rounded img-responsive">
						<div class="thumb-info-title"><!-- thumb-info-title Inicio -->
							<span class="thumb-info-inner"> <?php echo $admin_name;?> </span>
						</div><!-- thumb-info-title Fin -->
					</div><!-- thumb-info mb-md Fin -->
					<div class="mb-md"><!-- mb-md Inicio -->
						<div class="widget-content-expanded"><!-- widget-content-expanded Inicio -->
							<i class="fa fa-user"></i> <span>Email: </span> <?php echo $admin_email;?>  <br>
							<i class="fa fa-user"></i> <span>contacto: </span> <?php echo $admin_contacto;?><br>
						</div><!-- widget-content-expanded Fin -->
						<hr class="dotted short">
					</div><!-- mb-md Fin -->
				</div><!-- panel-body Fin -->
			</div><!-- panel Fin -->
		</div><!-- col-md-4 Fin -->
	</div><!-- 3 row Fin -->
	<?php }?>
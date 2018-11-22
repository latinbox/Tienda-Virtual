<?php
session_start();
include ("includes/db.php");
include ("funciones/funciones.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tienda Virtual </title>
	<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >
	<link href="styles/bootstrap.min.css" rel="stylesheet">
	<link href="styles/style.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div id="top"><!-- top Inicio -->
		<div class="container"><!-- container Inicio -->
			<div class="col-md-6 offer"><!-- col-md-6 offer Inicio -->
				<a href="#" class="btn btn-success btn-sm" >
					<?php
					if (!isset($_SESSION['cliente_email'])) {
						echo "Bienvenido :Invitado";
					} else {
						echo "Bienvenido : ".$_SESSION['cliente_email']."";
					}
					?>
				</a>
				<a href="#">
					Total a Pagar: <?php precio_total();
					?>, Total Items <?php items();
					?>
				</a>
			</div><!-- col-md-6 offer Fin -->
			<div class="col-md-6"><!-- col-md-6 Inicio -->
				<ul class="menu"><!-- menu Inicio -->
					<li>
						<a href="registro_clientes.php">
							Registro
						</a>
					</li>
					<li>
						<?php
						if (!isset($_SESSION['cliente_email'])) {
							echo "<a href='checkout.php' >Mi Cuenta</a>";
						} else {
							echo "<a href='cliente/mi_cuenta.php?mis_pedidos'>Mi Cuenta</a>";
						}
						?>
					</li>
					<li>
						<a href="carrito.php">
							Ir al carrito
						</a>
					</li>
					<li>
						<?php
						if (!isset($_SESSION['cliente_email'])) {
							echo "<a href='checkout.php'> Login </a>";
						} else {
							echo "<a href='logout.php'> Logout </a>";
						}
						?>
					</li>
				</ul><!-- menu Fin -->
			</div><!-- col-md-6 Fin -->
		</div><!-- container Fin -->
	</div><!-- top Fin -->
	<div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Inicio -->
		<div class="container" ><!-- container Inicio -->
			<div class="navbar-header"><!-- navbar-header Inicio -->
				<a class="navbar-brand home" href="index.php" ><!--- navbar navbar-brand home Inicio -->
					<img src="images/logo.png" alt="rutsitas logo" width="140px" class="hidden-xs">
					<img src="images/logo.png" alt="rutsitas logo"  width="55px" class="visible-xs">
				</a><!--- navbar navbar-brand home Fin -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation"  >
					<span class="sr-only" >Toggle Navegacion </span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search" >
					<span class="sr-only" >Toggle Buscar</span>
					<i class="fa fa-search" ></i>
				</button>
			</div><!-- navbar-header Fin -->
			<div class="navbar-collapse collapse" id="navigation" ><!-- navbar-collapse collapse Inicio -->
				<div class="padding-nav" ><!-- padding-nav Inicio -->
					<ul class="nav navbar-nav navbar-left"><!-- nav navbar-nav navbar-left Inicio -->
						<li>
							<a href="index.php"> Home </a>
						</li>
						<li class="active" >
							<a href="shop.php"> Tienda </a>
						</li>
						<li>
							<?php
							if (!isset($_SESSION['cliente_email'])) {
								echo "<a href='checkout.php' >Mi Cuenta</a>";
							} else {
								echo "<a href='cliente/mi_cuenta.php?mis_pedidos'>Mi Cuenta</a>";
							}
							?>
						</li>
						<li>
							<a href="carrito.php"> Carrito de Compra </a>
						</li>
						<li>
							<a href="contacto.php"> Contáctanos </a>
						</li>
					</ul><!-- nav navbar-nav navbar-left Fin -->
				</div><!-- padding-nav Fin -->
				<a class="btn btn-primary navbar-btn right" href="carrito.php"><!-- btn btn-primary navbar-btn right Inicio -->
					<i class="fa fa-Tiendaping-carrito"></i>
					<span> <?php items();?>items en carrito </span>
				</a><!-- btn btn-primary navbar-btn right Fin -->
				<div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Inicio -->
					<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle Buscar</span>
						<i class="fa fa-search"></i>
					</button>
				</div><!-- navbar-collapse collapse right Fin -->
				<div class="collapse clearfix" id="search"><!-- collapse clearfix Inicio -->
					<form class="navbar-form" method="get" action="resultados.php"><!-- navbar-form Inicio -->
						<div class="input-group"><!-- input-group Inicio -->
							<input class="form-control" type="text" placeholder="Buscar" name="query_ingresada_usuario" required>
							<span class="input-group-btn"><!-- input-group-btn Inicio -->
								<button type="submit" value="Search" name="search" class="btn btn-primary">
									<i class="fa fa-search"></i>
								</button>
							</span><!-- input-group-btn Fin -->
						</div><!-- input-group Fin -->
					</form><!-- navbar-form Fin -->
				</div><!-- collapse clearfix Fin -->
			</div><!-- navbar-collapse collapse Fin -->
		</div><!-- container Fin -->
	</div><!-- navbar navbar-default Fin -->
	<div id="content" ><!-- content Inicio -->
		<div class="container" ><!-- container Inicio -->
			<div class="col-md-12" ><!--- col-md-12 Inicio -->
				<ul class="breadcrumb" ><!-- breadcrumb Inicio -->
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>Resultados de Búsqueda</li>
				</ul><!-- breadcrumb Fin -->
			</div><!--- col-md-12 Fin -->
			<div class="col-md-12" ><!-- col-md-12 Inicio --->
				<div class="row" id="Productos" ><!-- row Inicio -->
					<?php
					if (isset($_GET['search'])) {
						$user_keyword = $_GET['query_ingresada_usuario'];
						$get_Productos = "select * from producto where product_keywords like '%$user_keyword%'";
						$run_Productos = mysqli_query($con, $get_Productos);
						$count = mysqli_num_rows($run_Productos);
						if ($count == 0) {
							echo "
							<div class='box'>
							<h2>No se encontraron resultados</h2>
							</div>
							";
						} else {
							while ($fila_producto = mysqli_fetch_array($run_Productos)) {
								$pro_id = $fila_producto['product_id'];
								$pro_titulo = $fila_producto['producto_titulo'];
								$pro_price = $fila_producto['producto_precio'];
								$pro_img1 = $fila_producto['producto_img1'];
								$pro_label = $fila_producto['product_label'];
								$marca_id = $fila_producto['marca_id'];
								$get_marca = "select * from marca where marca_id='$marca_id'";
								$run_marca = mysqli_query($db, $get_marca);
								$fila_marca = mysqli_fetch_array($run_marca);
								$marca_nombre = $fila_marca['marca_titulo'];
								$pro_url = $fila_producto['producto_url'];
								if ($pro_label == "Sale" or $pro_label == "Gift") {
									$producto_precio = "<del> $$pro_price </del>";
									$product_psp_price = "| $$pro_psp_price";
								} else {
									$product_psp_price = "";
									$producto_precio = "$$pro_price";
								}
								if ($pro_label == "") {
								} else {
									$product_label = "
									<a class='label sale' href='#' style='color:black;'>
									<div class='thelabel'>$pro_label</div>
									<div class='label-background'> </div>
									</a>
									";
								}
								echo "
								<div class='col-md-3 col-sm-6 center-responsive' >
								<div class='product' >
								<a href='$pro_url' >
								<img src='admin_area/product_images/$pro_img1' class='img-responsive' >
								</a>
								<div class='text' >
								<center>
								<p class='btn btn-primary'> $marca_nombre </p>
								</center>
								<hr>
								<h3><a href='$pro_url' >$pro_titulo</a></h3>
								<p class='price' > $producto_precio  </p>
								<p class='buttons' >
								<a href='$pro_url' class='btn btn-default' >Ver detalles</a>
								<a href='$pro_url' class='btn btn-primary'>
								<i class='fa fa-Tiendaping-carrito'></i> Agregar al carrito
								</a>
								</p>
								</div>
								$product_label</div>
								</div>
								";
							}
						}
					}
					?>
				</div><!-- row Fin -->
			</div><!-- col-md-9 Fin --->
		</div><!-- container Fin -->
	</div><!-- content Fin -->
	<?php
	include ("includes/footer.php");
	?>
	<script src="js/jquery.min.js"> </script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
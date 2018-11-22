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
					<a class="navbar-brand home" href="index.php"> <!-- Inicio navbar-brand home-->
						<img src="images/logo.png" alt="rutsitas logo" width="140px" class="hidden-xs">
						<img src="images/logo.png" alt="rutsitas logo"  width="55px" class="visible-xs">
					</a> <!-- Fin navbar-brand home-->
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
						<li>
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
					<form class="navbar-form" method="get" action="results.php"><!-- navbar-form Inicio -->
						<div class="input-group"><!-- input-group Inicio -->
							<input class="form-control" type="text" placeholder="Search" name="user_query" required>
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
					<li>Registro</li>
				</ul><!-- breadcrumb Fin -->
			</div><!--- col-md-12 Fin -->
			<div class="col-md-12" ><!-- col-md-12 Inicio -->
				<?php
				if (!isset($_SESSION['cliente_email'])) {
					include ("cliente/cliente_login.php");
				} else {
					include ("opciones_pago.php");
				}
				?>
			</div><!-- col-md-12 Fin -->
		</div><!-- container Fin -->
	</div><!-- content Fin -->

	<?php
	include ("includes/footer.php");
	?>
	<script src="js/jquery.min.js"> </script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
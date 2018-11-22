<?php
session_start();
include ("includes/db.php");
include ("funciones/funciones.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Tienda virtual </title>

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
				<a class="navbar-brand home" href="index.php"> <!-- Inicio navbar-brand home-->
					<img src="images/logo.png" alt="rutsitas logo" width="140px" class="hidden-xs">
					<img src="images/logo.png" alt="rutsitas logo"  width="55px" class="visible-xs">
				</a> <!-- Fin navbar-brand home-->
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
						<li class="active">
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
					<form class="navbar-form" method="get" action="resultados.php"><!-- navbar-form Inicio -->
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

	<div class="container" id="slider"><!-- container Inicio -->
		<div class="col-md-12"><!-- col-md-12 Inicio -->
			<div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Inicio --->
				<ol class="carousel-indicators"><!-- carousel-indicators Inicio -->
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
				</ol><!-- carousel-indicators Fin -->
				<div class="carousel-inner"><!-- carousel-inner Inicio -->
<?php

$get_slides = "select * from slider LIMIT 0,1";
$run_slides = mysqli_query($con, $get_slides);
while ($fila_slides = mysqli_fetch_array($run_slides)) {
	$slide_nombre = $fila_slides['slide_nombre'];
	$slide_imagen = $fila_slides['slide_imagen'];
	$slide_url    = $fila_slides['slide_url'];
	echo "
						<div class='item active'>
						<a href='$slide_url'><img src='admin_area/slides_images/$slide_imagen'></a>
						</div>
";
}

?>


<?php
$get_slides = "select * from slider LIMIT 1,3 ";
$run_slides = mysqli_query($con, $get_slides);
while ($fila_slides = mysqli_fetch_array($run_slides)) {
	$slide_nombre = $fila_slides['slide_nombre'];
	$slide_imagen = $fila_slides['slide_imagen'];
	$slide_url    = $fila_slides['slide_url'];
	echo "
						<div class='item'>
						<a href='$slide_url'><img src='admin_area/slides_images/$slide_imagen'></a>
						</div>
";
}

?>
</div><!-- carousel-inner Fin -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev"><!-- left carousel-control Inicio -->
					<span class="glyphicon glyphicon-chevron-left"> </span>
					<span class="sr-only"> Anterior </span>
				</a><!-- left carousel-control Fin -->
				<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Inicio -->
					<span class="glyphicon glyphicon-chevron-right"> </span>
					<span class="sr-only"> Siguiente </span>
				</a><!-- right carousel-control Fin -->
			</div><!-- carousel slide Fin --->
		</div><!-- col-md-12 Fin -->
	</div><!-- container Fin -->
	<div id="advantages"><!-- advantages Inicio -->
		<div class="container"><!-- container Inicio -->
			<div class="same-height-row"><!-- same-height-row Inicio -->
<?php
$get_boxes = "select * from mision";
$run_boxes = mysqli_query($con, $get_boxes);
while ($run_boxes_section = mysqli_fetch_array($run_boxes)) {
	$mision_id     = $run_boxes_section['mision_id'];
	$mision_titulo = $run_boxes_section['mision_titulo'];
	$mision_desc   = $run_boxes_section['mision_desc'];
	?>
						<div class="col-sm-4"><!-- col-sm-4 Inicio -->
							<div class="box same-height"><!-- box same-height Inicio -->
								<div class="icon">
									<i class="fa fa-heart" ></i>
								</div>
								<h3><a href="#"> <?php echo $mision_titulo;?></a></h3>
								<p>
	<?php echo $mision_desc;?>
	</p>
							</div><!-- box same-height Fin -->
						</div><!-- col-sm-4 Fin -->
	<?php }?>
</div><!-- same-height-row Fin -->
		</div><!-- container Fin -->
	</div><!-- advantages Fin -->
	<div id="hot"><!-- hot Inicio -->
		<div class="box"><!-- box Inicio -->
			<div class="container"><!-- container Inicio -->
				<div class="col-md-12"><!-- col-md-12 Inicio -->
					<h2>Novedades de esta semana</h2>
				</div><!-- col-md-12 Fin -->
			</div><!-- container Fin -->
		</div><!-- box Fin -->
	</div><!-- hot Fin -->
	<div id="content" class="container"><!-- container Inicio -->
		<div class="row"><!-- row Inicio -->
<?php
getPro();
?>
</div><!-- row Fin -->
	</div><!-- container Fin -->
<?php
include ("includes/footer.php");
?>
	<script src="js/jquery.min.js"> </script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
session_start();
include ("includes/db.php");
include ("funciones/funciones.php");
?>
<?php

$producto_id   = @$_GET['pagina_id'];
$get_product   = "select * from producto where producto_url='$producto_id'";
$run_product   = mysqli_query($con, $get_product);
$check_product = mysqli_num_rows($run_product);
if ($check_product == 0) {
	echo "<script> window.open('index.php','_self') </script>";
} else {

	$row_product         = mysqli_fetch_array($run_product);
	$p_cat_id            = $row_product['p_cat_id'];
	$producto_id         = $row_product['producto_id'];
	$producto_titulo     = $row_product['producto_titulo'];
	$producto_precio     = $row_product['producto_precio'];
	$cantidad_disponible = $row_product['producto_cantidad'];
	$producto_desc       = $row_product['producto_desc'];
	$producto_img1       = $row_product['producto_img1'];
	$producto_img2       = $row_product['producto_img2'];
	$producto_img3       = $row_product['producto_img3'];
	$pro_url             = $row_product['producto_url'];

	$get_p_cat    = "select * from producto_categoria where p_cat_id='$p_cat_id'";
	$run_p_cat    = mysqli_query($con, $get_p_cat);
	$row_p_cat    = mysqli_fetch_array($run_p_cat);
	$p_cat_titulo = $row_p_cat['p_cat_titulo'];

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
																		<li>
																			<a href="index.php"> Home </a>
																		</li>

																		<li class="active" >
																			<a href="shop.php"> Tienda </a>
																		</li>
																		<li>
	<?php

	if (!isset($_SESSION['cliente_email'])) {

		echo "<a href='checkout.php'>Mi Cuenta</a>";

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
																	<span> <?php items();?> items en carrito </span>
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
																	<li>
																		<a href="shop.php">Tienda</a></li>
																		<li>
																			<a href="shop.php?p_cat=<?php echo $p_cat_id;?>"> <?php echo $p_cat_titulo;
	?> </a>
																		</li>
																		<li> <?php echo $producto_titulo;?> </li>
																	</ul><!-- breadcrumb Fin -->
																</div><!--- col-md-12 Fin -->



																<div class="col-md-12"><!-- col-md-12 Inicio -->
																	<div class="row" id="productMain"><!-- row Inicio -->
																		<div class="col-sm-6"><!-- col-sm-6 Inicio -->
																			<div id="mainImage"><!-- mainImage Inicio -->
																				<div id="myCarousel" class="carousel slide" data-ride="carousel">
																					<ol class="carousel-indicators"><!-- carousel-indicators Inicio -->
																						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
																						<li data-target="#myCarousel" data-slide-to="1"></li>
																						<li data-target="#myCarousel" data-slide-to="2"></li>
																					</ol><!-- carousel-indicators Fin -->
																					<div class="carousel-inner"><!-- carousel-inner Inicio -->
																						<div class="item active">
																							<center>
																								<img src="admin_area/product_images/<?php echo $producto_img1;?>" class="img-responsive">
																							</center>
																						</div>
																						<div class="item">
																							<center>
																								<img src="admin_area/product_images/<?php echo $producto_img2;?>" class="img-responsive">
																							</center>
																						</div>
																						<div class="item">
																							<center>
																								<img src="admin_area/product_images/<?php echo $producto_img3;?>" class="img-responsive">
																							</center>
																						</div>
																					</div><!-- carousel-inner Fin -->
																					<a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Inicio -->
																						<span class="glyphicon glyphicon-chevron-left"> </span>
																						<span class="sr-only"> Anterior </span>
																					</a><!-- left carousel-control Fin -->
																					<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Inicio -->
																						<span class="glyphicon glyphicon-chevron-right"> </span>
																						<span class="sr-only"> Siguiente </span>
																					</a><!-- right carousel-control Fin -->
																				</div>
																			</div><!-- mainImage Fin -->
																		</div><!-- col-sm-6 Fin -->
																		<div class="col-sm-6" ><!-- col-sm-6 Inicio -->
																			<div class="box" ><!-- box Inicio -->
																				<h1 class="text-center" > <?php echo $producto_titulo;?></h1>
	<?php

	if (isset($_POST['add_carrito'])) {
		$ip_add               = getRealUserIp();
		$p_id                 = $producto_id;
		$p_cantidad_ingresada = $_POST['producto_cantidad'];

		$p_tamano      = $_POST['producto_tamano'];
		$check_product = "select * from carrito where ip_add='$ip_add' AND p_id='$p_id'";
		$run_check     = mysqli_query($con, $check_product);
		if ($p_cantidad_ingresada > $cantidad_disponible) {
			echo "<script>alert('Por el momento no tenemos el stock que pides')</script>";
		} else {
			if (mysqli_num_rows($run_check) > 0) {
				echo "<script>alert('Este producto ya ha sido agregado al carrito')</script>";
				echo "<script>window.open('$pro_url','_self')</script>";
			} else {
				//$p                 = $p_cantidad_ingresada-$cantidad_disponible;
				$run_cliente_order = mysqli_query($con, $insertar_pedido_cliente);
				$delete_producto   = "delete from carrito where ip_add='$ip_add'";
				$run_delete        = mysqli_query($con, $delete_carrito);
				$get_price         = "select * from producto where producto_id='$p_id'";
				$run_price         = mysqli_query($con, $get_price);
				$row_price         = mysqli_fetch_array($run_price);
				$pro_precio        = $row_price['producto_precio'];
				//$pro_cantidad_stock = $row_price['producto_cantidad'];
				$pro_label = $row_price['product_label'];

				$query = "insert into carrito (p_id,ip_add,cantidad,p_precio,tamano) values ('$p_id','$ip_add','$p_cantidad_ingresada','$pro_precio','$p_tamano')";

				$run_query = mysqli_query($db, $query);

				echo "<script>window.open('$pro_url','_self')</script>";

			}
		}

	}

	?>
	<form action="" method="post" class="form-horizontal" ><!-- form-horizontal Inicio -->
	<?php
	echo "

										<p class='price'>
										Cantidad disponible : $cantidad_disponible</p>
";

	?>
	<div class="form-group"><!-- form-group Inicio -->


																						<label class="col-md-5 control-label" >Cantidad </label>
																						<div class="col-md-7" ><!-- col-md-7 Inicio -->
																							<select name="producto_cantidad" class="form-control" >
																								<option>Seleccione cantidad</option>
																								<option>1</option>
																								<option>2</option>
																								<option>3</option>
																								<option>4</option>
																								<option>5</option>
																							</select>
																						</div><!-- col-md-7 Fin -->
																					</div><!-- form-group Fin -->
																					<div class="form-group" ><!-- form-group Inicio -->
																						<label class="col-md-5 control-label" >Tamaño</label>
																						<div class="col-md-7" ><!-- col-md-7 Inicio -->
																							<select name="producto_tamano" class="form-control" >
																								<option>Seleccione Tamaño</option>
																								<option>S</option>
																								<option>M</option>
																								<option>L</option>
																							</select>
																						</div><!-- col-md-7 Fin -->
																					</div><!-- form-group Fin -->
	<?php
	echo "

										<p class='price'>
										Precio : $$producto_precio</p>
";

	?>
	<p class="text-center buttons" ><!-- text-center buttons Inicio -->
																						<button class="btn btn-primary" type="submit" name="add_carrito">
																							<i class="fa fa-Tiendaping-carrito" ></i> Agregar al carrito
																						</button>
																						<button class="btn btn-primary" type="submit" name="agregar_lista_deseos">
																							<i class="fa fa-heart" ></i> Agregar a lista de deseos
																						</button>
	<?php
	if (isset($_POST['agregar_lista_deseos'])) {
		if (!isset($_SESSION['cliente_email'])) {
			echo "<script>alert('Debes estar logueado para agregar productos a tu lista de deseos')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
		} else {
			$cliente_session     = $_SESSION['cliente_email'];
			$get_cliente         = "select * from cliente where cliente_email='$cliente_session'";
			$run_cliente         = mysqli_query($con, $get_cliente);
			$row_cliente         = mysqli_fetch_array($run_cliente);
			$cliente_id          = $row_cliente['cliente_id'];
			$select_lista_deseos = "select * from lista_deseos where cliente_id='$cliente_id' AND producto_id='$producto_id'";
			$run_lista_deseos    = mysqli_query($con, $select_lista_deseos);
			$check_lista_deseos  = mysqli_num_rows($run_lista_deseos);
			if ($check_lista_deseos == 1) {
				echo "<script>alert('Este Producto ya ha sido agregado a la lista de deseos')</script>";
				echo "<script>window.open('$pro_url','_self')</script>";
			} else {
				$insert_lista_deseos = "insert into lista_deseos (cliente_id,producto_id) values ('$cliente_id','$producto_id')";
				$run_lista_deseos    = mysqli_query($con, $insert_lista_deseos);
				if ($run_lista_deseos) {
					echo "<script> alert('Producto ingresado a la lista de deseos') </script>";
					echo "<script>window.open('$pro_url','_self')</script>";
				}
			}
		}

	}

	?>

																					</p><!-- text-center buttons Fin -->

																				</form><!-- form-horizontal Fin -->

																			</div><!-- box Fin -->


																			<div class="row" id="thumbs" ><!-- row Inicio -->
																				<div class="col-xs-4" ><!-- col-xs-4 Inicio -->
																					<a href="#" class="thumb" >
																						<img src="admin_area/product_images/<?php echo $producto_img1;?>" class="img-responsive" >
																					</a>
																				</div><!-- col-xs-4 Fin -->
																				<div class="col-xs-4" ><!-- col-xs-4 Inicio -->
																					<a href="#" class="thumb" >
																						<img src="admin_area/product_images/<?php echo $producto_img2;?>" class="img-responsive" >
																					</a>
																				</div><!-- col-xs-4 Fin -->
																				<div class="col-xs-4" ><!-- col-xs-4 Inicio -->
																					<a href="#" class="thumb" >
																						<img src="admin_area/product_images/<?php echo $producto_img3;?>" class="img-responsive" >
																					</a>
																				</div><!-- col-xs-4 Fin -->
																			</div><!-- row Fin -->
																		</div><!-- col-sm-6 Fin -->
																	</div><!-- row Fin -->
																	<div class="box" id="details"><!-- box Inicio -->
																		<a class="btn btn-primary tab" style="margin-bottom:10px;" href="#description" data-toggle="tab"><!-- btn btn-primary tab Inicio -->

	<?php
	echo "Descripción de producto";
	?>
	</a><!-- btn btn-primary tab Fin -->

																		<hr style="margin-top:0px;">
																		<div class="tab-content"><!-- tab-content Inicio -->
																			<div id="description" class="tab-pane fade in active" style="margin-top:7px;" ><!-- description tab-pane fade in active Inicio -->
	<?php echo $producto_desc;?>
	</div><!-- description tab-pane fade in active Fin -->


																		</div><!-- tab-content Fin -->
																	</div><!-- box Fin -->
																	<div id="row same-height-row"><!-- row same-height-row Inicio -->

																		<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Inicio -->

																			<div class="box same-height headline"><!-- box same-height headline Inicio -->
																				<h3 class="text-center"> También te podrían gustar estos productos </h3>
																			</div><!-- box same-height headline Fin -->
																		</div><!-- col-md-3 col-sm-6 Fin -->
	<?php
	$get_productos = "select * from producto order by rand() LIMIT 0,3";
	$run_productos = mysqli_query($con, $get_productos);
	while ($row_productos = mysqli_fetch_array($run_productos)) {
		$prod_id     = $row_productos['producto_id'];
		$prod_titulo = $row_productos['producto_titulo'];
		$prod_precio = $row_productos['producto_precio'];
		$prod_imagen = $row_productos['producto_img1'];
		echo "
								<div class='col-md-3 col-sm-6 center-responsive'>
								<div class='product same-height'>
								<a href='detalles.php?prod_id=$prod_id'>
								<img src='admin_area/product_images/$prod_imagen' class='img-responsive'>
								</a>
								<div class='text'>
								<h3><a href='detalles.php?prod_id=$prod_id'>$prod_titulo</a></h3>
								<p class='precio'>$prod_precio</p>
								</div>
								</div>

								</div>
";
	}
	?>
	</div><!-- row same-height-row Fin -->

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

	<?php }?>

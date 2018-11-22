<?php
session_start();
include ("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<?php

	$admin_session = $_SESSION['admin_email'];
	$get_admin = "select * from admin  where admin_email='$admin_session'";
	$run_admin = mysqli_query($con, $get_admin);
	$row_admin = mysqli_fetch_array($run_admin);
	$admin_id = $row_admin['admin_id'];
	$admin_name = $row_admin['admin_nombre'];
	$admin_email = $row_admin['admin_email'];
	$admin_image = $row_admin['admin_imagen'];
	$admin_contacto = $row_admin['admin_contacto'];
	$get_producto   = "select * from producto";
	$run_producto   = mysqli_query($con, $get_producto);
	$contar_productos = mysqli_num_rows($run_producto);

	$get_clientes   = "select * from cliente";
	$run_clientes   = mysqli_query($con, $get_clientes);
	$contar_clientes = mysqli_num_rows($run_clientes);

	$get_p_categorias   = "select * from producto_categoria";
	$run_p_categorias   = mysqli_query($con, $get_p_categorias);
	$contar_p_categorias = mysqli_num_rows($run_p_categorias);

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Panel de Control</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >
	</head>

	<body>
		<div id="wrapper"><!-- wrapper Inicio -->
			<?php include ("includes/sidebar.php");?>
			<div id="page-wrapper"><!-- page-wrapper Inicio -->
				<div class="container-fluid"><!-- container-fluid Inicio -->
					<?php
					if (isset($_GET['panel_control'])) {
						include ("panel_control.php");
					}
					if (isset($_GET['insertar_producto'])) {
						include ("insertar_producto.php");
					}
					if (isset($_GET['ver_productos'])) {

						include ("ver_productos.php");

					}

					if (isset($_GET['borrar_producto'])) {

						include ("borrar_producto.php");

					}

					if (isset($_GET['editar_producto'])) {

						include ("editar_producto.php");

					}

					if (isset($_GET['insertar_p_cat'])) {

						include ("insertar_p_cat.php");

					}

					if (isset($_GET['ver_p_cats'])) {

						include ("ver_p_cats.php");

					}

					if (isset($_GET['borrar_p_cat'])) {

						include ("borrar_p_cat.php");

					}

					if (isset($_GET['editar_p_cat'])) {

						include ("editar_p_cat.php");

					}

					if (isset($_GET['insertar_cat'])) {

						include ("insertar_cat.php");

					}

					if (isset($_GET['ver_cats'])) {

						include ("ver_cats.php");

					}

					if (isset($_GET['borrar_cat'])) {

						include ("borrar_cat.php");

					}

					if (isset($_GET['editar_cat'])) {

						include ("editar_cat.php");

					}

					if (isset($_GET['insertar_slide'])) {

						include ("insertar_slide.php");

					}

					if (isset($_GET['ver_slides'])) {

						include ("ver_slides.php");

					}

					if (isset($_GET['borrar_slide'])) {

						include ("borrar_slide.php");

					}

					if (isset($_GET['editar_slide'])) {

						include ("editar_slide.php");

					}

					if (isset($_GET['ver_clientes'])) {

						include ("ver_clientes.php");

					}

					if (isset($_GET['borrar_cliente'])) {

						include ("borrar_cliente.php");

					}
					if (isset($_GET['insertar_region'])) {

						include ("insertar_region.php");

					}
					if (isset($_GET['ver_regiones'])) {

						include ("ver_regiones.php");

					}

					if (isset($_GET['ver_pedidos'])) {

						include ("ver_pedidos.php");

					}

					if (isset($_GET['borrar_pedido'])) {

						include ("borrar_pedido.php");

					}
					if (isset($_GET['insertar_usuario'])) {

						include ("insertar_usuario.php");

					}

					if (isset($_GET['ver_usuarios'])) {

						include ("ver_usuarios.php");

					}

					if (isset($_GET['borrar_usuario'])) {

						include ("borrar_usuario.php");

					}

					if (isset($_GET['perfil_usuario'])) {

						include ("perfil_usuario.php");

					}

					if (isset($_GET['insertar_mision'])) {

						include ("insertar_mision.php");

					}

					if (isset($_GET['ver_misiones'])) {

						include ("ver_misiones.php");

					}

					if (isset($_GET['borrar_mision'])) {

						include ("borrar_mision.php");

					}

					if (isset($_GET['editar_mision'])) {

						include ("editar_mision.php");

					}

					if (isset($_GET['insertar_termino'])) {

						include ("insertar_termino.php");

					}

					if (isset($_GET['ver_terminos'])) {

						include ("ver_terminos.php");

					}

					if (isset($_GET['borrar_termino'])) {

						include ("borrar_termino.php");

					}

					if (isset($_GET['editar_termino'])) {

						include ("editar_termino.php");

					}


					if (isset($_GET['insertar_marca'])) {

						include ("insertar_marca.php");

					}

					if (isset($_GET['ver_marcas'])) {

						include ("ver_marcas.php");

					}

					if (isset($_GET['borrar_marca'])) {

						include ("borrar_marca.php");

					}

					if (isset($_GET['editar_marca'])) {

						include ("editar_marca.php");

					}

					if (isset($_GET['editar_contacto'])) {

						include ("editar_contacto.php");

					}

					if (isset($_GET['insertar_duda'])) {

						include ("insertar_duda.php");

					}

					if (isset($_GET['ver_dudas'])) {

						include ("ver_dudas.php");

					}

					if (isset($_GET['borrar_duda'])) {

						include ("borrar_duda.php");

					}

					if (isset($_GET['editar_duda'])) {

						include ("editar_duda.php");

					}


					

					?>
				</div><!-- container-fluid Fin -->

			</div><!-- page-wrapper Fin -->

		</div><!-- wrapper Fin -->

		<script src="js/jquery.min.js"></script>

		<script src="js/bootstrap.min.js"></script>


	</body>


	</html>

	<?php }?>
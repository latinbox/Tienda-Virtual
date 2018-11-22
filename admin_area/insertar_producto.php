<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<!DOCTYPE html>
				<html>
				<head>
					<title> Insertar Productos </title>
					<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
					<script>tinymce.init({ selector:'#producto_desc' });</script>
				</head>

				<body>
					<div class="row"><!-- row Inicio -->
						<div class="col-lg-12"><!-- col-lg-12 Inicio -->
							<ol class="breadcrumb"><!-- breadcrumb Inicio -->
								<li class="active">
									<i class="fa fa-Panel de Control"> </i> Panel de Control / Insertar Productos
								</li>
							</ol><!-- breadcrumb Fin -->
						</div><!-- col-lg-12 Fin -->
					</div><!-- row Fin -->

					<div class="row"><!-- 2 row Inicio -->
						<div class="col-lg-12"><!-- col-lg-12 Inicio -->
							<div class="panel panel-default"><!-- panel panel-default Inicio -->
								<div class="panel-heading"><!-- panel-heading Inicio -->
									<h3 class="panel-title">
										<i class="fa fa-money fa-fw"></i> Insertar Productos
									</h3>
								</div><!-- panel-heading Fin -->
								<div class="panel-body"><!-- panel-body Inicio -->
									<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Inicio -->
										<div class="form-group" ><!-- form-group Inicio -->
											<label class="col-md-3 control-label" > Titulo </label>
											<div class="col-md-6" >
												<input type="text" name="producto_titulo" class="form-control" required >
											</div>
										</div><!-- form-group Fin -->
										<div class="form-group" ><!-- form-group Inicio -->
											<label class="col-md-3 control-label" > Url </label>
											<div class="col-md-6" >
												<input type="text" name="producto_url" class="form-control" required >
												<br>
												<p style="font-size:15px; font-weight:bold;">

													Ejemplo de url: navy-blue-t-shirt
												</p>
											</div>
										</div><!-- form-group Fin -->
										<div class="form-group" ><!-- form-group Inicio -->
											<label class="col-md-3 control-label" > Elegir una Marca </label>
											<div class="col-md-6" >
												<select class="form-control" name="marca"><!-- select marca Inicio -->
													<option> Elegir una marca </option>
	<?php

	$get_marca = "select * from marca";
	$run_marca = mysqli_query($con, $get_marca);
	while ($fila_marca = mysqli_fetch_array($run_marca)) {
		$marca_id     = $fila_marca['marca_id'];
		$marca_titulo = $fila_marca['marca_titulo'];

		echo "<option value='$marca_id'>
$marca_titulo
											</option>";

	}

	?>
	</select><!-- select marca Fin -->
											</div>
										</div><!-- form-group Fin -->

										<div class="form-group" ><!-- form-group Inicio -->
											<label class="col-md-3 control-label" > Categoría de Producto </label>
											<div class="col-md-6" >
												<select name="producto_cat" class="form-control" >
													<option> Elija una Categoría de Producto</option>

	<?php

	$get_p_cats = "select * from producto_categoria";
	$run_p_cats = mysqli_query($con, $get_p_cats);
	while ($fila_p_cats = mysqli_fetch_array($run_p_cats)) {
		$p_cat_id     = $fila_p_cats['p_cat_id'];
		$p_cat_titulo = $fila_p_cats['p_cat_titulo'];
		echo "<option value='$p_cat_id' >$p_cat_titulo</option>";
	}

	?>
	</select>
											</div>
										</div><!-- form-group Fin -->
										<div class="form-group" ><!-- form-group Inicio -->
											<label class="col-md-3 control-label" > Categoria </label>
											<div class="col-md-6" >
												<select name="cat" class="form-control" >
													<option> Elija una Categoria </option>

	<?php

	$get_cat = "select * from categoria";
	$run_cat = mysqli_query($con, $get_cat);
	while ($row_cat = mysqli_fetch_array($run_cat)) {
		$cat_id     = $row_cat['cat_id'];
		$cat_titulo = $row_cat['cat_titulo'];
		echo "<option value='$cat_id'>$cat_titulo</option>";
	}

	?>
	</select>

											</div>
										</div><!-- form-group Fin -->
										<div class="form-group" ><!-- form-group Inicio -->
											<label class="col-md-3 control-label" > Imagen 1 </label>
											<div class="col-md-6" >
												<input type="file" name="producto_img1" class="form-control" required >
											</div>
										</div><!-- form-group Fin -->
										<div class="form-group" ><!-- form-group Inicio -->
											<label class="col-md-3 control-label" > Imagen 2 </label>
											<div class="col-md-6" >
												<input type="file" name="producto_img2" class="form-control" required >
											</div>
										</div><!-- form-group Fin -->
										<div class="form-group" ><!-- form-group Inicio -->
											<label class="col-md-3 control-label" > Imagen 3 </label>
											<div class="col-md-6" >
												<input type="file" name="producto_img3" class="form-control" required >
											</div>
										</div><!-- form-group Fin -->
										<div class="form-group" ><!-- form-group Inicio -->
											<label class="col-md-3 control-label" >  Precio </label>
											<div class="col-md-6" >
												<input type="text" name="producto_precio" class="form-control" required >
											</div>
										</div><!-- form-group Fin -->
										<div class="form-group"><!--Inicio de form-group-->
											<label class="col-md-3 control-label">Cantidad</label>
											<div class="col-md-6">
												<input name="producto_cant" class="form-control" rows="6" cols="12"></input>
											</div>
										</div>
										<!--Fin de form-group-->
										<div class="form-group"><!--Inicio de form-group-->
											<label class="col-md-3 control-label">Descripción</label>
											<div class="col-md-6">
												<textarea name="producto_desc" class="form-control" rows="6" cols="12"></textarea>
											</div>
										</div>
										<!--Fin de form-group-->
									</div><!-- form-group Fin -->
									<div class="form-group" ><!-- form-group Inicio -->
										<label class="col-md-3 control-label" ></label>
										<div class="col-md-6" >
											<input type="submit" name="submit" value="Insertar Producto" class="btn btn-primary form-control" >
										</div>
									</div><!-- form-group Fin -->
								</form><!-- form-horizontal Fin -->
							</div><!-- panel-body Fin -->
						</div><!-- panel panel-default Fin -->
					</div><!-- col-lg-12 Fin -->
				</div><!-- 2 row Fin -->



			</body>

			</html>

	<?php

	if (isset($_POST['submit'])) {

		$producto_titulo = $_POST['producto_titulo'];
		$producto_cat    = $_POST['producto_cat'];
		$cat             = $_POST['cat'];
		$marca_id        = $_POST['marca'];
		$producto_precio = $_POST['producto_precio'];
		$producto_cant   = $_POST['cantidad'];
		$producto_desc   = $_POST['producto_desc'];
		$producto_url    = $_POST['producto_url'];

		//$status = "product";

		$producto_img1 = $_FILES['producto_img1']['name'];
		$producto_img2 = $_FILES['producto_img2']['name'];
		$producto_img3 = $_FILES['producto_img3']['name'];

		$temp_name1 = $_FILES['producto_img1']['tmp_name'];
		$temp_name2 = $_FILES['producto_img2']['tmp_name'];
		$temp_name3 = $_FILES['producto_img3']['tmp_name'];

		move_uploaded_file($temp_name1, "product_images/$producto_img1");
		move_uploaded_file($temp_name2, "product_images/$producto_img2");
		move_uploaded_file($temp_name3, "product_images/$producto_img3");

		$insertar_producto = "insert into producto
	(p_cat_id,cat_id,marca_id,fecha,producto_titulo,producto_url,producto_img1,producto_img2,producto_img3,producto_precio, producto_cant, producto_desc) values ('$producto_cat','$cat','$marca_id',NOW(),'$producto_titulo','$producto_url','$producto_img1','$producto_img2','$producto_img3','$producto_precio', '$producto_cant',$producto_desc')";

		$run_product = mysqli_query($con, $insertar_producto);

		if ($run_product) {

			echo "<script>alert('Producto ha sido ingresado exitosamente')</script>";

			echo "<script>window.open('index.php?ver_productos','_self')</script>";

		}

	}

	?>

	<?php }?>

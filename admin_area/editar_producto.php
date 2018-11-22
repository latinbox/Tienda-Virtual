<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
		<?php
	if (isset($_GET['editar_producto'])) {
		$editar_id    = $_GET['editar_producto'];
		$get_p        = "select * from producto where producto_id='$editar_id'";
		$run_editar   = mysqli_query($con, $get_p);
		$fila_editar  = mysqli_fetch_array($run_editar);
		$p_id         = $fila_editar['producto_id'];
		$p_title      = $fila_editar['producto_titulo'];
		$p_cat        = $fila_editar['p_cat_id'];
		$cat          = $fila_editar['cat_id'];
		$m_id         = $fila_editar['marca_id'];
		$p_image1     = $fila_editar['producto_img1'];
		$p_image2     = $fila_editar['producto_img2'];
		$p_image3     = $fila_editar['producto_img3'];
		$new_p_image1 = $fila_editar['producto_img1'];
		$new_p_image2 = $fila_editar['producto_img2'];
		$new_p_image3 = $fila_editar['producto_img3'];
		$p_precio     = $fila_editar['producto_precio'];
		$p_cantidad   = $fila_editar['producto_cantidad'];
		$p_desc       = $fila_editar['producto_desc'];
		$p_url        = $fila_editar['producto_url'];
	}

	$get_marca    = "select * from marca where marca_id='$m_id'";
	$run_marca    = mysqli_query($con, $get_marca);
	$fila_marca   = mysqli_fetch_array($run_marca);
	$marca_id     = $fila_marca['marca_id'];
	$marca_title  = $fila_marca['marca_titulo'];
	$get_p_cat    = "select * from producto_categoria where p_cat_id='$p_cat'";
	$run_p_cat    = mysqli_query($con, $get_p_cat);
	$row_p_cat    = mysqli_fetch_array($run_p_cat);
	$p_cat_titulo = $row_p_cat['p_cat_titulo'];
	$get_cat      = "select * from categoria where cat_id='$cat'";
	$run_cat      = mysqli_query($con, $get_cat);
	$row_cat      = mysqli_fetch_array($run_cat);
	$cat_titulo   = $row_cat['cat_titulo'];
	?>
		<!DOCTYPE html>
		<html>
		<head>
			<title> Editar Productos </title>
			<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
			<script>tinymce.init({ selector:'#producto_desc' });</script>
		</head>
		<body>
			<div class="row"><!-- row Starts -->
				<div class="col-lg-12"><!-- col-lg-12 Starts -->
					<ol class="breadcrumb"><!-- breadcrumb Starts -->
						<li class="active">
							<i class="fa fa-dashboard"> </i> Panel de Control / Editar Products
						</li>
					</ol><!-- breadcrumb Ends -->
				</div><!-- col-lg-12 Ends -->
			</div><!-- row Ends -->
			<div class="row"><!-- 2 row Starts -->
				<div class="col-lg-12"><!-- col-lg-12 Starts -->
					<div class="panel panel-default"><!-- panel panel-default Starts -->
						<div class="panel-heading"><!-- panel-heading Starts -->
							<h3 class="panel-title">
								<i class="fa fa-money fa-fw"></i> Editar Productos
							</h3>
						</div><!-- panel-heading Ends -->
						<div class="panel-body"><!-- panel-body Starts -->
							<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Nombre </label>
									<div class="col-md-6" >
										<input type="text" name="producto_titulo" class="form-control" required value="<?php echo $p_title;?>">
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Url </label>
									<div class="col-md-6" >
										<input type="text" name="producto_url" class="form-control" required value="<?php echo $p_url;?>" >
										<br>
										<p style="font-size:15px; font-weight:bold;">
											Ejemplo de Url de producto : polera-verde-lacoste
										</p>
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Elija una marca </label>
									<div class="col-md-6" >
										<select name="marca" class="form-control">
											<option value="<?php echo $marca_id;?>">
	<?php echo $marca_title;?>
	</option>
	<?php
	$get_marca = "select * from marca";
	$run_marca = mysqli_query($con, $get_marca);
	while ($fila_marca = mysqli_fetch_array($run_marca)) {
		$marca_id    = $fila_marca['marca_id'];
		$marca_title = $fila_marca['marca_titulo'];

		echo "
											<option value='$marca_id'>
$marca_title</option>
";

	}
	?>
										</select>
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Categoria de Producto </label>
									<div class="col-md-6" >
										<select name="producto_cat" class="form-control" >
											<option value="<?php echo $p_cat;?>" > <?php echo $p_cat_titulo;
	?></option>

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
								</div><!-- form-group Ends -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Categoria General </label>
									<div class="col-md-6" >
										<select name="cat" class="form-control" >
											<option value="<?php echo $cat;?>" > <?php echo $cat_titulo;
	?></option>
	<?php
	$get_cat = "select * from categoria ";
	$run_cat = mysqli_query($con, $get_cat);
	while ($row_cat = mysqli_fetch_array($run_cat)) {
		$cat_id     = $row_cat['cat_id'];
		$cat_titulo = $row_cat['cat_titulo'];
		echo "<option value='$cat_id'>$cat_titulo</option>";
	}
	?>
										</select>
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Imagen de Producto 1 </label>
									<div class="col-md-6" >
										<input type="file" name="producto_img1" class="form-control" >
										<br><img src="product_images/<?php echo $p_image1;?>" width="70" height="70" >
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Imagen de Producto 2 </label>
									<div class="col-md-6" >
										<input type="file" name="producto_img2" class="form-control" >
										<br><img src="product_images/<?php echo $p_image2;?>" width="70" height="70" >
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Imagen de Producto 3 </label>
									<div class="col-md-6" >
										<input type="file" name="producto_img3" class="form-control" >
										<br><img src="product_images/<?php echo $p_image3;?>" width="70" height="70" >
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Precio </label>
									<div class="col-md-6" >
										<input type="text" name="producto_precio" class="form-control" required value="<?php echo $p_precio;?>" >
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Cantidad </label>
									<div class="col-md-6" >
										<input type="text" name="producto_cantidad" class="form-control" required value="<?php echo $p_cantidad;?>" >
									</div>
								</div><!-- form-group Ends -->

								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" > Producto </label>
									<div class="col-md-6" >
										<ul class="nav nav-tabs"><!-- nav nav-tabs Starts -->
											<li class="active">
												<a data-toggle="tab" href="#description"> Descripción </a>
											</li>
										</ul><!-- nav nav-tabs Ends -->
										<div class="tab-content"><!-- tab-content Starts -->
											<div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->
												<br>
												<textarea name="producto_desc" class="form-control" rows="15" id="producto_desc">
	<?php echo $p_desc;?>
	</textarea>
											</div><!-- description tab-pane fade in active Ends -->
										</div><!-- tab-content Ends -->
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group" ><!-- form-group Starts -->
									<label class="col-md-3 control-label" ></label>
									<div class="col-md-6" >
										<input type="submit" name="actualizar" value="Actualizar producto" class="btn btn-primary form-control" >
									</div>
								</div><!-- form-group Ends -->
							</form><!-- form-horizontal Ends -->
						</div><!-- panel-body Ends -->
					</div><!-- panel panel-default Ends -->
				</div><!-- col-lg-12 Ends -->
			</div><!-- 2 row Ends -->
		</body>
		</html>
	<?php
	if (isset($_POST['actualizar'])) {

		$producto_titulo   = $_POST['producto_titulo'];
		$producto_cat      = $_POST['producto_cat'];
		$cat               = $_POST['cat'];
		$marca_id          = $_POST['marca'];
		$producto_precio   = $_POST['producto_precio'];
		$producto_cantidad = $_POST['producto_cantidad'];
		$producto_desc     = $_POST['producto_desc'];

		$producto_url = $_POST['producto_url'];

		$producto_img1 = $_FILES['producto_img1']['name'];
		$producto_img2 = $_FILES['producto_img2']['name'];
		$producto_img3 = $_FILES['producto_img3']['name'];

		$temp_name1 = $_FILES['producto_img1']['tmp_name'];
		$temp_name2 = $_FILES['producto_img2']['tmp_name'];
		$temp_name3 = $_FILES['producto_img3']['tmp_name'];

		if (empty($producto_img1)) {
			$producto_img1 = $new_p_image1;
		}
		if (empty($producto_img2)) {
			$producto_img2 = $new_p_image2;
		}
		if (empty($producto_img3)) {
			$producto_img3 = $new_p_image3;
		}
		move_uploaded_file($temp_name1, "product_images/$producto_img1");
		move_uploaded_file($temp_name2, "product_images/$producto_img2");
		move_uploaded_file($temp_name3, "product_images/$producto_img3");

		$actualizar_producto = "update producto set p_cat_id='$producto_cat',cat_id='$cat',marca_id='$marca_id',fecha=NOW(),producto_titulo='$producto_titulo',producto_url='$producto_url',producto_img1='$producto_img1',producto_img2='$producto_img2',producto_img3='$producto_img3',producto_precio='$producto_precio',producto_cantidad='$producto_cantidad',producto_desc='$producto_desc' where producto_id='$p_id'";
		$run_product         = mysqli_query($con, $actualizar_producto);
		if ($run_product) {
			echo "<script> alert('Producto actualizado exitosamente') </script>";
			echo "<script>window.open('index.php?ver_productos','_self')</script>";
		}
	}
	?>
	<?php }?>

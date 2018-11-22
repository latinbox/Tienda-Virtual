<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<div class="row"><!-- 1 row Inicio -->
	<div class="col-lg-12"><!-- col-lg-12 Inicio -->
	<ol class="breadcrumb"><!-- breadcrumb Inicio -->
	<li>
	<i class="fa fa-Panel de Control"></i> Panel de Control / Insertar Categoria General
	</li>
	</ol><!-- breadcrumb Fin -->
	</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row"><!-- 2 row Inicio -->
	<div class="col-lg-12"><!-- col-lg-12 Inicio -->
	<div class="panel panel-default"><!-- panel panel-default Inicio -->
	<div class="panel-heading"><!-- panel-heading Inicio -->
	<h3 class="panel-title"><!-- panel-title Inicio -->
	<i class="fa fa-money fa-fw"></i> Insertar Categoría General
	</h3><!-- panel-title Fin -->
	</div><!-- panel-heading Fin -->
	<div class="panel-body"><!-- panel-body Inicio -->
	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Inicio -->
	<div class="form-group"><!-- form-group Inicio -->
	<label class="col-md-3 control-label">Titulo</label>
	<div class="col-md-6">
	<input type="text" name="cat_titulo" class="form-control">
	</div>
	</div><!-- form-group Fin -->
	<div class="form-group"><!-- form-group Inicio -->
	<label class="col-md-3 control-label">Elija Imagen</label>
	<div class="col-md-6">
	<input type="file" name="cat_imagen" class="form-control">
	</div>
	</div><!-- form-group Fin -->
	<div class="form-group"><!-- form-group Inicio -->
	<label class="col-md-3 control-label"></label>
	<div class="col-md-6">
	<input type="submit" name="submit" value="Insertar Categoria General" class="btn btn-primary form-control">
	</div>
	</div><!-- form-group Fin -->
	</form><!-- form-horizontal Fin -->
	</div><!-- panel-body Fin -->
	</div><!-- panel panel-default Fin -->
	</div><!-- col-lg-12 Fin -->
	</div><!-- 2 row Fin -->
	<?php
	if (isset($_POST['submit'])) {
		$cat_titulo = $_POST['cat_titulo'];
		$cat_imagen = $_FILES['cat_imagen']['name'];
		$temp_name = $_FILES['cat_imagen']['tmp_name'];
		move_uploaded_file($temp_name, "other_images/$cat_imagen");
		$insertar_cat = "insert into categoria (cat_titulo,cat_imagen) values ('$cat_titulo','$cat_imagen')";
		$run_cat = mysqli_query($con, $insertar_cat);
		if ($run_cat) {
			echo "<script> alert('Nueva Categoria General insertada')</script>";
			echo "<script> window.open('index.php?ver_cats','_self') </script>";
		}
	}
	?>
	<?php }?>
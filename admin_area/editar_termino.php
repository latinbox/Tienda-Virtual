<?php

if (!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

} else {

	?>

	<?php

	if (isset($_GET['editar_termino'])) {
		$editar_id = $_GET['editar_termino'];
		$get_term = "select * from terminos where termino_id='$editar_id'";
		$run_term = mysqli_query($con, $get_term);
		$row_term = mysqli_fetch_array($run_term);
		$termino_id = $row_term['termino_id'];
		$termino_titulo = $row_term['termino_titulo'];
		$termino_url = $row_term['termino_url'];
		$termino_desc = $row_term['termino_desc'];
	}
	?>
		 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		  <script>tinymce.init({ selector:'textarea' });</script>
		<div class="row"><!-- 1 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
		<ol class="breadcrumb"><!-- breadcrumb Inicio -->
		<li class="active">
		<i class="fa fa-Panel de Control"></i> Panel de Control / Editar Terminos y Condiciones
		</li>
		</ol><!-- breadcrumb Fin -->
		</div><!-- col-lg-12 Fin -->
		</div><!-- 1 row Fin -->
		<div class="row"><!-- 2 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
		<div class="panel panel-default"><!-- panel panel-default Inicio -->
		<div class="panel-heading"><!-- panel-heading Inicio -->
		<h3 class="panel-title"><!-- panel-title Inicio -->
		<i class="fa fa-money fa-fw"></i> Editar Terminos y Condiciones
		</h3><!-- panel-title Fin -->
		</div><!-- panel-heading Fin -->
		<div class="panel-body"><!-- panel-body Inicio -->
		<form class="form-horizontal" action="" method="post"><!-- form-horizontal Inicio -->
		<div class="form-group"><!-- form-group Inicio -->
		<label class="col-md-3 control-label"> Titulo </label>
		<div class="col-md-6"><!-- col-md-6 Inicio -->
		<input type="text" name="termino_titulo" class="form-control" value="<?php echo $termino_titulo;?>">
		</div><!-- col-md-6 Fin -->
		</div><!-- form-group Fin -->
		<div class="form-group"><!-- form-group Inicio -->
		<label class="col-md-3 control-label"> Descripción </label>
		<div class="col-md-6"><!-- col-md-6 Inicio -->
		<textarea name="termino_desc" class="form-control" rows="6" cols="19" >
	<?php echo $termino_desc;?>
		</textarea>
		</div><!-- col-md-6 Fin -->
		</div><!-- form-group Fin -->
		<div class="form-group"><!-- form-group Inicio -->
		<label class="col-md-3 control-label"> Link url </label>
		<div class="col-md-6"><!-- col-md-6 Inicio -->
		<input type="text" name="termino_url" class="form-control" value="<?php echo $termino_url;?>">
		</div><!-- col-md-6 Fin -->
		</div><!-- form-group Fin -->
		<div class="form-group"><!-- form-group Inicio -->
		<label class="col-md-3 control-label"> </label>
		<div class="col-md-6"><!-- col-md-6 Inicio -->
		<input type="submit" name="update" value="Actualizar Termino" class="btn btn-primary form-control" >
		</div><!-- col-md-6 Fin -->
		</div><!-- form-group Fin -->
		</form><!-- form-horizontal Fin -->
		</div><!-- panel-body Fin -->
		</div><!-- panel panel-default Fin -->
		</div><!-- col-lg-12 Fin -->
		</div><!-- 2 row Fin -->
	<?php
	if (isset($_POST['update'])) {
		$termino_titulo = $_POST['termino_titulo'];
		$termino_desc = $_POST['termino_desc'];
		$termino_url = $_POST['termino_url'];
		$update_term = "update terminos set termino_titulo='$termino_titulo',termino_url='$termino_url',termino_desc='$termino_desc' where termino_id='$termino_id'";
		$run_term = mysqli_query($con, $update_term);
		if ($run_term) {
			echo "<script>alert('Un termino ha sido actualizado')</script>";
			echo "<script>window.open('index.php?ver_terminos','_self')</script>";
		}
	}
	?>

	<?php }?>
<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
	<div class="row"><!-- 1 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
			<ol class="breadcrumb"><!-- breadcrumb Inicio -->
				<li class="active">
					<i class="fa fa-Panel de Control"></i> Panel de Control / Insertar Terminos y Condiciones
				</li>
			</ol><!-- breadcrumb Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row"><!-- 2 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
			<div class="panel panel-default"><!-- panel panel-default Inicio -->
				<div class="panel-heading"><!-- panel-heading Inicio -->
					<h3 class="panel-title"><!-- panel-title Inicio -->
						<i class="fa fa-money fa-fw"></i> Insertar Terminos y Condiciones
					</h3><!-- panel-title Fin -->
				</div><!-- panel-heading Fin -->
				<div class="panel-body"><!-- panel-body Inicio -->
					<form class="form-horizontal" action="" method="post"><!-- form-horizontal Inicio -->
						<div class="form-group"><!-- form-group Inicio -->
							<label class="col-md-3 control-label"> Titulo </label>
							<div class="col-md-6"><!-- col-md-6 Inicio -->
								<input type="text" name="termino_titulo" class="form-control" >
							</div><!-- col-md-6 Fin -->
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label class="col-md-3 control-label"> Descripción </label>
							<div class="col-md-6"><!-- col-md-6 Inicio -->
								<textarea name="termino_desc" class="form-control" rows="6" cols="19" ></textarea>
							</div><!-- col-md-6 Fin -->
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label class="col-md-3 control-label"> Link </label>
							<div class="col-md-6"><!-- col-md-6 Inicio -->
								<input type="text" name="termino_url" class="form-control" >
							</div><!-- col-md-6 Fin -->
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label class="col-md-3 control-label"> </label>
							<div class="col-md-6"><!-- col-md-6 Inicio -->
								<input type="submit" name="submit" value="Insertar" class="btn btn-primary form-control" >
							</div><!-- col-md-6 Fin -->
						</div><!-- form-group Fin -->
					</form><!-- form-horizontal Fin -->
				</div><!-- panel-body Fin -->
			</div><!-- panel panel-default Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 2 row Fin -->
	<?php
	if (isset($_POST['submit'])) {
		$termino_titulo = $_POST['termino_titulo'];
		$termino_desc = $_POST['termino_desc'];
		$termino_url = $_POST['termino_url'];
		$insertar_terminos = "insert into terminos (termino_titulo,termino_url,termino_desc) values ('$termino_titulo','$termino_url','$termino_desc')";
		$run_term = mysqli_query($con, $insertar_terminos);
		if ($run_term) {
			echo "<script>alert('Nuevos Terminos y Condiciones ingresadas exitosamente')</script>";
			echo "<script>window.open('index.php?ver_terminos','_self')</script>";
		}
	}
	?>

	<?php }?>
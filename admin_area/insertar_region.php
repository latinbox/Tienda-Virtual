<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<div class="row" ><!-- 1 row Inicio -->
		<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
			<ol class="breadcrumb"><!-- breadcrumb Inicio -->
				<li class="active">
					<i class="fa fa-Panel de Control" ></i> Panel de Control / Insertar Region
				</li>
			</ol><!-- breadcrumb Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row"><!-- 2 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
			<div class="panel panel-default"><!-- panel panel-default Inicio -->
				<div class="panel-heading"><!-- panel-heading Inicio -->
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"></i> Insertar Region de Cliente
					</h3>
				</div><!-- panel-heading Fin -->
				<div class="panel-body"><!-- panel-body Inicio -->
					<form class="form-horizontal" action="" method="post" ><!-- form-horizontal Inicio -->
						<div class="form-group"><!-- form-group Inicio -->
							<label class="col-md-3 control-label"> Nombre </label>
							<div class="col-md-6">
								<input type="text" name="region_titulo" class="form-control">
							</div>
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label class="col-md-3 control-label">  </label>
							<div class="col-md-6">
								<input type="submit" name="submit" class="btn btn-primary form-control" value="Insertar ">
							</div>
						</div><!-- form-group Fin -->
					</form><!-- form-horizontal Fin-->
				</div><!-- panel-body Fin -->
			</div><!-- panel panel-default Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 2 row Fin -->
	<?php
	if (isset($_POST['submit'])) {
		$region_titulo = $_POST['region_titulo'];
		$insert_enquiry = "insert into tipo_region (region_titulo) values ('$region_titulo')";
		$run_enquiry = mysqli_query($con, $insert_enquiry);
		if ($run_enquiry) {
			echo "<script> alert('Nuevo Tipo de Region Insertada') </script>";
			echo "<script>window.open('index.php?ver_regiones','_self')</script>";
		}
	}
	?>
	<?php }?>
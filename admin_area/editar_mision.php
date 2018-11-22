<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<?php
	if (isset($_GET['editar_mision'])) {
		$editar_mision = $_GET['editar_mision'];
		$get_mision = "select * from mision where mision_id='$editar_mision'";
		$run_mision = mysqli_query($con, $get_mision);
		$fila_mision = mysqli_fetch_array($run_mision);
		$mision_id = $fila_mision['mision_id'];
		$mision_titulo = $fila_mision['mision_titulo'];
		$mision_desc = $fila_mision['mision_desc'];
	}
	?>
	<div class="row" ><!-- 1 row Inicio -->
		<div class="col-lg-12"><!-- col-lg-12 Inicio -->
			<ol class="breadcrumb" ><!-- breadcrumb Inicio -->
				<li class="active">
					<i class="fa fa-Panel de Control"></i> Panel de Control / Editar Caja de Mision
				</li>
			</ol><!-- breadcrumb Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row" ><!-- 2 row Inicio -->
		<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
			<div class="panel panel-default"><!-- panel panel-default Inicio -->
				<div class="panel-heading"><!-- panel-heading Inicio-->
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"></i> Editar Caja de Mision
					</h3>
				</div><!-- panel-heading Fin-->
				<div class="panel-body"><!-- panel-body Inicio -->
					<form class="form-horizontal" method="post" action=""><!-- form-horizontal Inicio -->
						<div class="form-group"><!-- 1 form-group Inicio -->
							<label class="col-md-3 control-label">Titulo : </label>
							<div class="col-md-6">
								<input type="text" name="mision_titulo" class="form-control" value="<?php echo $mision_titulo;?>">
							</div>
						</div><!-- 1 form-group Fin -->
						<div class="form-group"><!-- 2 form-group Inicio -->
							<label class="col-md-3 control-label">Descripcion : </label>
							<div class="col-md-6">
								<textarea name="mision_desc" class="form-control" rows="6" cols="19">
									<?php echo $mision_desc;?>
								</textarea>
							</div>
						</div><!-- 2 form-group Fin -->

						<div class="form-group"><!-- 3 form-group Inicio -->
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" name="update" value="Actualizar" class="btn btn-primary form-control">
							</div>
						</div><!-- 3 form-group Fin -->
					</form><!-- form-horizontal Fin -->
				</div><!-- panel-body Fin -->
			</div><!-- panel panel-default Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 2 row Fin -->

	<?php
	if (isset($_POST['update'])) {
		$mision_titulo = $_POST['mision_titulo'];
		$mision_desc = $_POST['mision_desc'];
		$actualizar_mision = "update mision set mision_titulo='$mision_titulo',mision_desc='$mision_desc' where mision_id='$mision_id'";
		$run_box = mysqli_query($con, $actualizar_mision);
		echo "<script>alert('Mision actualizada exitosamente')</script>";
		echo "<script>window.open('index.php?ver_misiones','_self')</script>";
	}
	?>
	<?php }?>
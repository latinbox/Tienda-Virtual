<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<?php
	if (isset($_GET['editar_marca'])) {
		$editar_marca = $_GET['editar_marca'];
		$get_marca = "select * from marca where marca_id='$editar_marca'";
		$run_marca = mysqli_query($con, $get_marca);
		$row_marca = mysqli_fetch_array($run_marca);
		$m_id = $row_marca['marca_id'];
		$m_titulo = $row_marca['marca_titulo'];
		$m_imagen = $row_marca['marca_imagen'];
		$new_m_imagen = $row_marca['marca_imagen'];
	}

	?>

	<div class="row"><!-- 1 row Inicio -->
	<div class="col-lg-12"><!-- col-lg-12 Inicio -->
	<ol class="breadcrumb"><!-- breadcrumb Inicio -->
	<li class="active">
	<i class="fa fa-Panel de Control"></i> Panel de Control / Edit marca
	</li>
	</ol><!-- breadcrumb Fin -->
	</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row"><!-- 2 row Inicio -->
	<div class="col-lg-12"><!-- col-lg-12 Inicio -->
	<div class="panel panel-default"><!-- panel panel-default Inicio -->
	<div class="panel-heading"><!-- panel-heading Inicio -->
	<h3 class="panel-title"><!-- panel-title Inicio -->
	<i class="fa fa-money fa-fw"> </i> Editar marca
	</h3><!-- panel-title Fin -->
	</div><!-- panel-heading Fin -->
	<div class="panel-body"><!-- panel-body Inicio -->
	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Inicio -->
	<div class="form-group"><!-- form-group Inicio -->
	<label class="col-md-3 control-label"> Nombre </label>
	<div class="col-md-6">
	<input type="text" name="marca_name" class="form-control" value="<?php echo $m_titulo;?>">
	</div>
	</div><!-- form-group Fin -->
	<div class="form-group"><!-- form-group Inicio -->
	<label class="col-md-3 control-label"> Elija Foto de la Marca </label>
	<div class="col-md-6">
	<input type="file" name="marca_imagen" class="form-control" >
	<br>
	<img src="other_images/<?php echo $m_imagen;?>" width="70" height="70">
	</div>
	</div><!-- form-group Fin -->
	<div class="form-group"><!-- form-group Inicio -->
	<label class="col-md-3 control-label"> </label>
	<div class="col-md-6">
	<input type="submit" name="update" class="form-control btn btn-primary" value=" Update marca " >
	</div>
	</div><!-- form-group Fin -->
	</form><!-- form-horizontal Fin -->
	</div><!-- panel-body Fin -->
	</div><!-- panel panel-default Fin -->
	</div><!-- col-lg-12 Fin -->
	</div><!-- 2 row Fin -->
	<?php
	if (isset($_POST['update'])) {
		$marca_name = $_POST['marca_name'];
		$marca_top = $_POST['marca_top'];
		$marca_imagen = $_FILES['marca_imagen']['name'];
		$tmp_name = $_FILES['marca_imagen']['tmp_name'];
		move_uploaded_file($tmp_name, "other_images/$marca_imagen");
		if (empty($marca_imagen)) {
			$marca_imagen = $new_m_imagen;
		}
		$update_marca = "update marca set marca_titulo='$marca_name',marca_imagen='$marca_imagen' where marca_id='$m_id'";
		$run_marca = mysqli_query($con, $update_marca);
		if ($run_marca) {
			echo "<script>alert('Marca ha sido actualizada')</script>";
			echo "<script>window.open('index.php?ver_marcas','_self')</script>";
		}
	}
	?>
	<?php }?>
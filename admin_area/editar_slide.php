<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<?php
	if (isset($_GET['editar_slide'])) {
		$edit_id = $_GET['editar_slide'];
		$editar_slide = "select * from slider where slide_id='$edit_id'";
		$run_edit = mysqli_query($con, $editar_slide);
		$fila_editar = mysqli_fetch_array($run_edit);
		$slide_id = $fila_editar['slide_id'];
		$slide_nombre = $fila_editar['slide_nombre'];
		$slide_imagen = $fila_editar['slide_imagen'];
		$slide_url = $fila_editar['slide_url'];
		$new_slide_imagen = $fila_editar['slide_imagen'];
	}
	?>
	<div class="row" ><!-- 1 row Inicio -->
	<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
	<ol class="breadcrumb"><!-- breadcrumb Inicio -->
	<li class="active">
	<i class="fa fa-Panel de Control" ></i> Panel de Control / Edit Slide
	</li>
	</ol><!-- breadcrumb Fin -->
	</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row" ><!-- 2 row Inicio -->
	<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
	<div class="panel panel-default" ><!-- panel panel-default Inicio -->
	<div class="panel-heading" ><!-- panel-heading Inicio -->
	<h3 class="panel-title" >
	<i class="fa fa-money fa-fw"></i> Editar Slide
	</h3>
	</div><!-- panel-heading Fin -->
	<div class="panel-body" ><!-- panel-body Inicio -->
	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Inicio -->
	<div class="form-group" ><!-- 1 form-group Inicio -->
	<label class="col-md-3 control-label">Nombre:</label>
	<div class="col-md-6">
	<input type="text" name="slide_nombre" class="form-control" value="<?php echo $slide_nombre;?>">
	</div>
	</div><!-- 1 form-group Fin -->
	<div class="form-group" ><!-- 2 form-group Inicio -->
	<label class="col-md-3 control-label">Imagen:</label>
	<div class="col-md-6">
	<input type="file" name="slide_imagen" class="form-control" >
	<br>
	 <img src="slides_images/<?php echo $slide_imagen;?>" width="70" height="70" >
	</div>
	</div><!-- 2 form-group Fin -->
	<div class="form-group" ><!-- 3 form-group Inicio -->
	<label class="col-md-3 control-label">Url:</label>
	<div class="col-md-6">
	<input type="text" name="slide_url" value="<?php echo $slide_url;?>" class="form-control" >
	</div>
	</div><!-- 3 form-group Fin -->
	<div class="form-group" ><!-- 4 form-group Inicio -->
	<label class="col-md-3 control-label"></label>
	<div class="col-md-6">
	<input type="submit" name="update" value="Actualizar" class=" btn btn-primary form-control" >
	</div>
	</div><!-- 4 form-group Fin -->
	</form><!-- form-horizontal Fin -->
	</div><!-- panel-body Fin -->
	</div><!-- panel panel-default Fin -->
	</div><!-- col-lg-12 Fin -->
	</div><!-- 2 row Fin -->
	<?php
	if (isset($_POST['update'])) {
		$slide_nombre = $_POST['slide_nombre'];
		$slide_imagen = $_FILES['slide_imagen']['name'];
		$temp_name = $_FILES['slide_imagen']['tmp_name'];
		$slide_url = $_POST['slide_url'];
		move_uploaded_file($temp_name, "slides_images/$slide_imagen");
		if (empty($slide_imagen)) {
			$slide_imagen = $new_slide_imagen;
		}
		$update_slide = "update slider set slide_nombre='$slide_nombre',slide_imagen='$slide_imagen',slide_url='$slide_url' where slide_id='$slide_id'";
		$run_slide = mysqli_query($con, $update_slide);
		if ($run_slide) {
			echo "<script>alert('Slide Actualizado')</script>";
			echo "<script>window.open('index.php?ver_slides','_self')</script>";
		}
	}
	?>
	<?php }?>
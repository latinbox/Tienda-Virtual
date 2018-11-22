<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<?php
	if (isset($_GET['editar_cat'])) {
		$edit_id = $_GET['editar_cat'];
		$editar_cat = "select * from categoria where cat_id='$edit_id'";
		$run_edit = mysqli_query($con, $editar_cat);
		$row_edit = mysqli_fetch_array($run_edit);
		$c_id = $row_edit['cat_id'];
		$c_title = $row_edit['cat_titulo'];
		$c_image = $row_edit['cat_imagen'];
		$new_c_image = $row_edit['cat_imagen'];
	}
	?>
	<div class="row"><!-- 1 row Inicio -->
	<div class="col-lg-12"><!-- col-lg-12 Inicio -->
	<ol class="breadcrumb"><!-- breadcrumb Inicio -->
	<li>
	<i class="fa fa-Panel de Control"></i> Panel de Control / Editar Categoria
	</li>
	</ol><!-- breadcrumb Fin -->
	</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row"><!-- 2 row Inicio -->
	<div class="col-lg-12"><!-- col-lg-12 Inicio -->
	<div class="panel panel-default"><!-- panel panel-default Inicio -->
	<div class="panel-heading"><!-- panel-heading Inicio -->
	<h3 class="panel-title"><!-- panel-title Inicio -->
	<i class="fa fa-money fa-fw"></i> Editar Categoria
	</h3><!-- panel-title Fin -->
	</div><!-- panel-heading Fin -->
	<div class="panel-body"><!-- panel-body Inicio -->
	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Inicio -->
	<div class="form-group"><!-- form-group Inicio -->
	<label class="col-md-3 control-label">Titulo</label>
	<div class="col-md-6">
	<input type="text" name="cat_titulo" class="form-control" value="<?php echo $c_title;?>">
	</div>
	</div><!-- form-group Fin -->
	<div class="form-group"><!-- form-group Inicio -->
	<label class="col-md-3 control-label">Elija imagen</label>
	<div class="col-md-6">
	<input type="file" name="cat_imagen" class="form-control">
	<br>
	<img src="other_images/<?php echo $c_image;?>" width="70" height="70" >
	</div>
	</div><!-- form-group Fin -->
	<div class="form-group"><!-- form-group Inicio -->
	<label class="col-md-3 control-label"></label>
	<div class="col-md-6">
	<input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">
	</div>
	</div><!-- form-group Fin -->
	</form><!-- form-horizontal Fin -->
	</div><!-- panel-body Fin -->
	</div><!-- panel panel-default Fin -->
	</div><!-- col-lg-12 Fin -->
	</div><!-- 2 row Fin -->
	<?php
	if (isset($_POST['update'])) {
		$cat_titulo = $_POST['cat_titulo'];
		$cat_imagen = $_FILES['cat_imagen']['name'];
		$temp_name = $_FILES['cat_imagen']['tmp_name'];
		move_uploaded_file($temp_name, "other_images/$cat_imagen");
		if (empty($cat_imagen)) {
			$cat_imagen = $new_c_image;
		}
		$update_cat = "update categoria set cat_titulo='$cat_titulo',cat_imagen='$cat_imagen' where cat_id='$c_id'";
		$run_cat = mysqli_query($con, $update_cat);
		if ($run_cat) {
			echo "<script>alert('La categoria general ha sido actualizada exitosamente')</script>";
			echo "<script>window.open('index.php?ver_cats','_self')</script>";
		}
	}
	?>
	<?php }?>
<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<?php
	if (isset($_GET['perfil_usuario'])) {
		$edit_id = $_GET['perfil_usuario'];
		$get_admin = "select * from admin where admin_id='$edit_id'";
		$run_admin = mysqli_query($con, $get_admin);
		$row_admin = mysqli_fetch_array($run_admin);
		$admin_id = $row_admin['admin_id'];
		$admin_nombre = $row_admin['admin_nombre'];
		$admin_email = $row_admin['admin_email'];
		$admin_pass = $row_admin['admin_pass'];
		$admin_imagen = $row_admin['admin_imagen'];
		$new_admin_imagen = $row_admin['admin_imagen'];
		$admin_contacto = $row_admin['admin_contacto'];
	}
	?>

					<div class="row" ><!-- 1  row Inicio -->
					<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
					<ol class="breadcrumb" ><!-- breadcrumb Inicio -->
					<li class="active" >
					<i class="fa fa-Panel de Control" ></i> Panel de Control / Editar Perfil
					</li>
					</ol><!-- breadcrumb Fin -->
					</div><!-- col-lg-12 Fin -->
					</div><!-- 1  row Fin -->
					<div class="row" ><!-- 2 row Inicio -->
					<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
					<div class="panel panel-default" ><!-- panel panel-default Inicio -->
					<div class="panel-heading" ><!-- panel-heading Inicio -->
					<h3 class="panel-title" >
					<i class="fa fa-money fa-fw" ></i> Edit Perfil
					</h3>
					</div><!-- panel-heading Fin -->
					<div class="panel-body"><!-- panel-body Inicio -->
					<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Inicio -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label">Nombre </label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="text" name="admin_nombre" class="form-control" required value="<?php echo $admin_nombre;?>">
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label">Email: </label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="text" name="admin_email" class="form-control" required value="<?php echo $admin_email;?>">
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label">Password: </label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="text" name="admin_pass" class="form-control" required value="<?php echo $admin_pass;?>">
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label">Numero Contacto: </label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="text" name="admin_contacto" class="form-control" required value="<?php echo $admin_contacto;?>">
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label">Imagen: </label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="file" name="admin_imagen" class="form-control" >
					<br>
					<img src="admin_imagens/<?php echo $admin_imagen;?>" width="70" height="70" >
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label"></label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="submit" name="actualizar" value="Actualizar Admin" class="btn btn-primary form-control">
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					</form><!-- form-horizontal Fin -->
					</div><!-- panel-body Fin -->
					</div><!-- panel panel-default Fin -->
					</div><!-- col-lg-12 Fin -->
					</div><!-- 2 row Fin -->
	<?php
	if (isset($_POST['actualizar'])) {
		$admin_nombre = $_POST['admin_nombre'];
		$admin_email = $_POST['admin_email'];
		$admin_pass = $_POST['admin_pass'];
		$admin_contacto = $_POST['admin_contacto'];
		$admin_imagen = $_FILES['admin_imagen']['name'];
		$temp_admin_imagen = $_FILES['admin_imagen']['tmp_name'];
		move_uploaded_file($temp_admin_imagen, "admin_imagens/$admin_imagen");
		if (empty($admin_imagen)) {
			$admin_imagen = $new_admin_imagen;
		}
		$update_admin = "update admin set admin_nombre='$admin_nombre',admin_email='$admin_email',admin_pass='$admin_pass',admin_imagen='$admin_imagen',admin_contacto='$admin_contacto' where admin_id='$admin_id'";
		$run_admin = mysqli_query($con, $update_admin);
		if ($run_admin) {
			echo "<script>alert('Admin ha sido actualizado exitosamente, porfavor logueate nuevamente.')</script>";
			echo "<script>window.open('login.php','_self')</script>";
			session_destroy();
		}
	}
	?>
	<?php }?>
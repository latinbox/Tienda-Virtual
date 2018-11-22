<?php

if (!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

} else {

	?>
	<div class="row" ><!-- 1  row Inicio -->

					<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
					<ol class="breadcrumb" ><!-- breadcrumb Inicio -->
					<li class="active" >
					<i class="fa fa-Panel de Control" ></i> Panel de Control / Insertar Usuario
					</li>
					</ol><!-- breadcrumb Fin -->
					</div><!-- col-lg-12 Fin -->
					</div><!-- 1  row Fin -->
					<div class="row" ><!-- 2 row Inicio -->
					<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
					<div class="panel panel-default" ><!-- panel panel-default Inicio -->
					<div class="panel-heading" ><!-- panel-heading Inicio -->
					<h3 class="panel-title" >
					<i class="fa fa-money fa-fw" ></i> Insertar Usuario
					</h3>
					</div><!-- panel-heading Fin -->
					<div class="panel-body"><!-- panel-body Inicio -->
					<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Inicio -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label">Nombre Usuario: </label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="text" name="admin_nombre" class="form-control" required>
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label"> Email: </label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="text" name="admin_email" class="form-control" required>
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label">Password: </label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="password" name="admin_pass" class="form-control" required>
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label">Telefono: </label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="text" name="admin_contacto" class="form-control" required>
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label">Foto perfil: </label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="file" name="admin_imagen" class="form-control" required>
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					<div class="form-group"><!-- form-group Inicio -->
					<label class="col-md-3 control-label"></label>
					<div class="col-md-6"><!-- col-md-6 Inicio -->
					<input type="submit" name="submit" value="Insertar Admin" class="btn btn-primary form-control">
					</div><!-- col-md-6 Fin -->
					</div><!-- form-group Fin -->
					</form><!-- form-horizontal Fin -->
					</div><!-- panel-body Fin -->
					</div><!-- panel panel-default Fin -->
					</div><!-- col-lg-12 Fin -->
					</div><!-- 2 row Fin -->
	<?php

	if (isset($_POST['submit'])) {
		$admin_nombre = $_POST['admin_nombre'];
		$admin_email = $_POST['admin_email'];
		$admin_pass = $_POST['admin_pass'];
		$admin_contacto = $_POST['admin_contacto'];
		$admin_imagen = $_FILES['admin_imagen']['name'];
		$temp_admin_imagen = $_FILES['admin_imagen']['tmp_name'];

		move_uploaded_file($temp_admin_imagen, "admin_images/$admin_imagen");

		$insert_admin = "insert into admin (admin_nombre,admin_email,admin_pass,admin_imagen,admin_contacto) values ('$admin_nombre','$admin_email','$admin_pass','$admin_imagen','$admin_contacto')";

		$run_admin = mysqli_query($con, $insert_admin);

		if ($run_admin) {

			echo "<script>alert('Usuario administrador creado exitosamente')</script>";

			echo "<script>window.open('index.php?ver_usuarios','_self')</script>";

		}

	}

	?>



	<?php }?>
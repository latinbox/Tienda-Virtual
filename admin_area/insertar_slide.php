<?php

if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<div class="row" ><!-- 1 row Inicio -->
		<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
			<ol class="breadcrumb"><!-- breadcrumb Inicio -->
				<li class="active">
					<i class="fa fa-Panel de Control" ></i> Panel de Control / Insertar Slide
				</li>
			</ol><!-- breadcrumb Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 1 row Fin -->
	<div class="row" ><!-- 2 row Inicio -->
		<div class="col-lg-12" ><!-- col-lg-12 Inicio -->
			<div class="panel panel-default" ><!-- panel panel-default Inicio -->
				<div class="panel-heading" ><!-- panel-heading Inicio -->
					<h3 class="panel-title" >
						<i class="fa fa-money fa-fw"></i> Insertar Slide
					</h3>
				</div><!-- panel-heading Fin -->
				<div class="panel-body" ><!-- panel-body Inicio -->
					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Inicio -->
						<div class="form-group" ><!-- 1 form-group Inicio -->
							<label class="col-md-3 control-label">Nombre:</label>
							<div class="col-md-6">
								<input type="text" name="slide_nombre" class="form-control" >
							</div>
						</div><!-- 1 form-group Fin -->
						<div class="form-group" ><!-- 2 form-group Inicio -->
							<label class="col-md-3 control-label">Imagen:</label>
							<div class="col-md-6">
								<input type="file" name="slide_imagen" class="form-control" >
							</div>
						</div><!-- 2 form-group Fin -->
						<div class="form-group" ><!-- 3 form-group Inicio -->
							<label class="col-md-3 control-label">Url:</label>
							<div class="col-md-6">
								<input type="text" name="slide_url" class="form-control" >
							</div>
						</div><!-- 3 form-group Fin -->
						<div class="form-group" ><!-- 4 form-group Inicio -->
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" name="submit" value="Ingresar Slide" class=" btn btn-primary form-control" >
							</div>
						</div><!--4 form-group Fin -->
					</form><!-- form-horizontal Fin -->
				</div><!-- panel-body Fin -->
			</div><!-- panel panel-default Fin -->
		</div><!-- col-lg-12 Fin -->
	</div><!-- 2 row Fin -->
	<?php
if(isset($_POST['submit'])){
$slide_nombre = $_POST['slide_nombre'];
$slide_imagen = $_FILES['slide_imagen']['name'];
$temp_name = $_FILES['slide_imagen']['tmp_name'];
$slide_url = $_POST['slide_url'];
$ver_slides = "select * from slider";
$view_run_slides = mysqli_query($con,$ver_slides);
$count = mysqli_num_rows($view_run_slides);
if($count<4){
move_uploaded_file($temp_name,"slides_images/$slide_imagen");
$insert_slide = "insert into slider (slide_nombre,slide_imagen,slide_url) values ('$slide_nombre','$slide_imagen','$slide_url')";
$run_slide = mysqli_query($con,$insert_slide);
echo "<script>alert('Nuevo Slide insertado')</script>";
echo "<script>window.open('index.php?ver_slides','_self')</script>";
}
else {
echo "<script>alert('Ya tienes 4 slides insertados')</script>";
}
}
?>
	<?php }?>
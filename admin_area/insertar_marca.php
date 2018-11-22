<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_self')</script>";
}
else {
?>
<div class="row"><!-- 1 row Starts -->
<div class="col-lg-12"><!-- col-lg-12 Starts -->
<ol class="breadcrumb"><!-- breadcrumb Starts -->
<li class="active">
<i class="fa fa-dashboard"></i> Panel de Control / Insertar Marca
</li>
</ol><!-- breadcrumb Ends -->
</div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->
<div class="row"><!-- 2 row Starts -->
<div class="col-lg-12"><!-- col-lg-12 Starts -->
<div class="panel panel-default"><!-- panel panel-default Starts -->
<div class="panel-heading"><!-- panel-heading Starts -->
<h3 class="panel-title"><!-- panel-title Starts -->
<i class="fa fa-money fa-fw"> </i> Insertar Marca
</h3><!-- panel-title Ends -->
</div><!-- panel-heading Ends -->
<div class="panel-body"><!-- panel-body Starts -->
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
<div class="form-group"><!-- form-group Starts -->
<label class="col-md-3 control-label"> Nombre </label>
<div class="col-md-6">
<input type="text" name="marca_nombre" class="form-control" >
</div>
</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->
<label class="col-md-3 control-label"> Elija una imagen de Marca </label>
<div class="col-md-6">
<input type="file" name="marca_imagen" class="form-control" >
</div>
</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->
<label class="col-md-3 control-label"> </label>
<div class="col-md-6">
<input type="submit" name="submit" class="form-control btn btn-primary" value=" Insertar Marca " >
</div>
</div><!-- form-group Ends -->
</form><!-- form-horizontal Ends -->
</div><!-- panel-body Ends -->
</div><!-- panel panel-default Ends -->
</div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->
<?php
if(isset($_POST['submit'])){
$marca_nombre = $_POST['marca_nombre'];
$marca_imagen = $_FILES['marca_imagen']['name'];
$tmp_name = $_FILES['marca_imagen']['tmp_name'];
move_uploaded_file($tmp_name,"other_images/$marca_imagen");
$insertar_marca = "insert into marca (marca_titulo,marca_imagen) values ('$marca_nombre','$marca_imagen')";
$run_manufacturer = mysqli_query($con,$insertar_marca);
if($run_manufacturer){
echo "<script>alert('Nueva Marca ingresada exitosamente')</script>";
echo "<script>window.open('index.php?ver_marcas','_self')</script>";
}
}
?>
<?php } ?>
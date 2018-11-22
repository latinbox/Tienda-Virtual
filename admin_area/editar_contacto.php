<?php
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}
else {
	?>
	<?php
	$get_contacto = "select * from contacto";
	$run_contacto = mysqli_query($con,$get_contacto);
	$fila_contacto = mysqli_fetch_array($run_contacto);
	$contacto_email = $fila_contacto['contacto_email'];
	$contacto_asunto = $fila_contacto['contacto_asunto'];
	$contacto_desc = $fila_contacto['contacto_desc'];

	?>

	<div class="row" ><!-- 1 row Starts -->
		<div class="col-lg-12" ><!-- col-lg-12 Starts --> 
			<ol class="breadcrumb"><!-- breadcrumb Starts -->
				<li class="active">
					<i class="fa fa-dashboard" ></i> Panel Control / Editar Contáctanos
				</li>
			</ol><!-- breadcrumb Ends -->
		</div><!-- col-lg-12 Ends --> 
	</div><!-- 1 row Ends -->
	<div class="row"><!-- 2 row Starts -->
		<div class="col-lg-12"><!-- col-lg-12 Starts -->
			<div class="panel panel-default"><!-- panel panel-default Starts -->
				<div class="panel-heading"><!-- panel-heading Starts -->
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"></i> Editar Contáctanos  
					</h3>
				</div><!-- panel-heading Ends -->
				<div class="panel-body"><!-- panel-body Starts -->
					<form class="form-horizontal" action="" method="post"><!-- form-horizontal Starts -->
						<div class="form-group"><!-- form-group Starts -->
							<label class="col-md-3 control-label"> Email: </label>
							<div class="col-md-6">
								<input type="text" name="contacto_email" class="form-control" value="<?php echo $contacto_email; ?>">
							</div>
						</div><!-- form-group Ends -->
						<div class="form-group"><!-- form-group Starts -->
							<label class="col-md-3 control-label"> Asunto: </label>
							<div class="col-md-6">
								<input type="text" name="contacto_asunto" class="form-control" value="<?php echo $contacto_asunto; ?>">
							</div>
						</div><!-- form-group Ends -->
						<div class="form-group"><!-- form-group Starts -->
							<label class="col-md-3 control-label"> Descripción: </label>
							<div class="col-md-6">
								<textarea name="contacto_desc" class="form-control" rows="6" cols="19">
									<?php echo $contacto_desc; ?>
								</textarea>
							</div>
						</div><!-- form-group Ends -->
						<div class="form-group"><!-- form-group Starts -->
							<label class="col-md-3 control-label"> </label>
							<div class="col-md-6">
								<input type="submit" name="submit" class="btn btn-primary form-control" value=" Actualizar Contacto">
							</div>
						</div><!-- form-group Ends -->
					</form><!-- form-horizontal Ends -->
				</div><!-- panel-body Ends -->
			</div><!-- panel panel-default Ends -->
		</div><!-- col-lg-12 Ends -->
	</div><!-- 2 row Ends -->
	<?php
	if(isset($_POST['submit'])){
		$contacto_email = $_POST['contacto_email'];
		$contact_asunto = $_POST['contact_asunto'];
		$contacto_desc = $_POST['contacto_desc'];
		$update_contact_us = "update contact_us set contacto_email='$contacto_email',contacto_asunto='$contacto_asunto',contacto_desc='$contacto_desc'";
		$run_contacto = mysqli_query($con,$update_contact_us);
		if($run_contacto){
			echo "<script>alert('Pagina contacto ha sido actualizada')</script>";
			echo "<script>window.open('index.php?dashboard','_self')</script>";
		}
	}
	?>

	<?php } ?>
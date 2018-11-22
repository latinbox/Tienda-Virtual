<?php
session_start();
include ("includes/db.php");
include ("funciones/funciones.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tienda Virtual </title>
	<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >
	<link href="styles/bootstrap.min.css" rel="stylesheet">
	<link href="styles/style.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

	<div id="top"><!-- top Inicio -->
		<div class="container"><!-- container Inicio -->
			<div class="col-md-6 offer"><!-- col-md-6 offer Inicio -->
				<a href="#" class="btn btn-success btn-sm" >
<?php
if (!isset($_SESSION['cliente_email'])) {
	echo "Bienvenido :Invitado";
} else {
	echo "Bienvenido : ".$_SESSION['cliente_email']."";
}
?>
				</a>

				<a href="#">
					Total a Pagar: <?php precio_total();
?>, Total Items <?php items();
?>
</a>

			</div><!-- col-md-6 offer Fin -->

			<div class="col-md-6"><!-- col-md-6 Inicio -->
				<ul class="menu"><!-- menu Inicio -->
					<li>
						<a href="cliente_Registro.php">
							Registro
						</a>
					</li>
					<li>
<?php
if (!isset($_SESSION['cliente_email'])) {
	echo "<a href='checkout.php' >Mi Cuenta</a>";
} else {
	echo "<a href='cliente/mi_cuenta.php?mis_pedidos'>Mi Cuenta</a>";
}
?>
</li>
					<li>
						<a href="carrito.php">
							Ir al carrito
						</a>
					</li>
					<li>
<?php
if (!isset($_SESSION['cliente_email'])) {
	echo "<a href='checkout.php'> Login </a>";
} else {
	echo "<a href='logout.php'> Logout </a>";
}
?>
</li>
				</ul><!-- menu Fin -->
			</div><!-- col-md-6 Fin -->
		</div><!-- container Fin -->
	</div><!-- top Fin -->
	<div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Inicio -->
		<div class="container" ><!-- container Inicio -->
			<div class="navbar-header"><!-- navbar-header Inicio -->
				<a class="navbar-brand home" href="index.php"> <!-- Inicio navbar-brand home-->
					<img src="images/logo.png" alt="rutsitas logo" width="140px" class="hidden-xs">
					<img src="images/logo.png" alt="rutsitas logo"  width="55px" class="visible-xs">
				</a> <!-- Fin navbar-brand home-->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation"  >
					<span class="sr-only" >Toggle Navegacion </span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search" >
					<span class="sr-only" >Toggle Buscar</span>
					<i class="fa fa-search" ></i>
				</button>
			</div><!-- navbar-header Fin -->
			<div class="navbar-collapse collapse" id="navigation" ><!-- navbar-collapse collapse Inicio -->
				<div class="padding-nav" ><!-- padding-nav Inicio -->
					<ul class="nav navbar-nav navbar-left"><!-- nav navbar-nav navbar-left Inicio -->
						<li>
							<a href="index.php"> Home </a>
						</li>
						<li>
							<a href="shop.php"> Tienda </a>
						</li>
						<li>
<?php
if (!isset($_SESSION['cliente_email'])) {
	echo "<a href='checkout.php' >Mi Cuenta</a>";
} else {
	echo "<a href='cliente/mi_cuenta.php?mis_pedidos'>Mi Cuenta</a>";
}
?>
						</li>
						<li>
							<a href="carrito.php"> Carrito de Compra </a>
						</li>
						<li class="active" >
							<a href="contacto.php"> Contáctanos </a>
						</li>
					</ul><!-- nav navbar-nav navbar-left Fin -->
				</div><!-- padding-nav Fin -->
				<a class="btn btn-primary navbar-btn right" href="carrito.php"><!-- btn btn-primary navbar-btn right Inicio -->
					<i class="fa fa-Tiendaping-carrito"></i>
					<span> <?php items();?>items en carrito </span>
				</a><!-- btn btn-primary navbar-btn right Fin -->
				<div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Inicio -->
					<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle Buscar</span>
						<i class="fa fa-search"></i>
					</button>
				</div><!-- navbar-collapse collapse right Fin -->
				<div class="collapse clearfix" id="search"><!-- collapse clearfix Inicio -->
					<form class="navbar-form" method="get" action="results.php"><!-- navbar-form Inicio -->
						<div class="input-group"><!-- input-group Inicio -->
							<input class="form-control" type="text" placeholder="Search" name="user_query" required>
							<span class="input-group-btn"><!-- input-group-btn Inicio -->
								<button type="submit" value="Search" name="search" class="btn btn-primary">
									<i class="fa fa-search"></i>
								</button>
							</span><!-- input-group-btn Fin -->
						</div><!-- input-group Fin -->
					</form><!-- navbar-form Fin -->
				</div><!-- collapse clearfix Fin -->
			</div><!-- navbar-collapse collapse Fin -->
		</div><!-- container Fin -->
	</div><!-- navbar navbar-default Fin -->

	<div id="content" ><!-- content Inicio -->
		<div class="container" ><!-- container Inicio -->
			<div class="col-md-12" ><!--- col-md-12 Inicio -->
				<ul class="breadcrumb" ><!-- breadcrumb Inicio -->
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>Contáctanos</li>
				</ul><!-- breadcrumb Fin -->

			</div><!--- col-md-12 Fin -->
			<div class="col-md-12" ><!-- col-md-12 Inicio -->
				<div class="box" ><!-- box Inicio -->
					<div class="box-header" ><!-- box-header Inicio -->
						<center><!-- center Inicio -->
<?php
$get_contacto     = "select * from contacto";
$run_contacto     = mysqli_query($con, $get_contacto);
$row_contacto     = mysqli_fetch_array($run_contacto);
$contacto_heading = $row_contacto['contacto_asunto'];
$contacto_desc    = $row_contacto['contacto_desc'];
$contacto_email   = $row_contacto['contacto_email'];
?>
							<h2> <?php echo $contacto_heading;?></h2>
						<p class="text-muted" >
<?php echo $contacto_desc;?>
</p>
						</center><!-- center Fin -->
					</div><!-- box-header Fin -->
					<form action="contacto.php" method="post" ><!-- form Inicio -->
						<div class="form-group" ><!-- form-group Inicio -->
						<label>Nombre</label>
						<input type="text" class="form-control" name="name" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput" required>
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label>Email</label>
							<input type="text" class="form-control" name="email" required>
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label>Asunto</label>
							<input type="text" class="form-control" name="asunto" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput" required>
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label> Mensaje </label>
							<textarea class="form-control" name="mensaje" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput" required> </textarea>
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label> Seleccione tipo de duda </label>

							<select name="tipoduda" class="form-control"><!-- select Inicio -->
								<option> Seleccione el tema de su duda</option>
<?php
$get_tipodudas = "select * from tipo_duda";
$run_tipodudas = mysqli_query($con, $get_tipodudas);
while ($row_tipodudas = mysqli_fetch_array($run_tipodudas)) {
	$duda_titulo = $row_tipodudas['duda_titulo'];
	echo "<option> $duda_titulo </option>";
}
?>
</select><!-- select Fin -->
						</div><!-- form-group Fin -->
						<div class="text-center"><!-- text-center Inicio -->
							<button type="submit" name="registro_contacto" class="btn btn-primary">
								<i class="fa fa-user-md"></i> Enviar Mensaje
							</button>
						</div><!-- text-center Fin -->
					</form><!-- form Fin -->
<?php
if (isset($_POST['registro_contacto'])) {

	// Admin recibe email por este código
	$remitente_nombre  = $_POST['name'];
	$remitente_email   = $_POST['email'];
	$remitente_asunto  = $_POST['asunto'];
	$remitente_mensaje = $_POST['mensaje'];
	$tipoduda          = $_POST['tipoduda'];
	$new_mensaje       = "
						<h1> Este mensaje ha sido enviado por $remitente_nombre </h1>
						<p> <b> Email :  </b> <br> $remitente_email </p>
						<p> <b> Asunto :  </b> <br> $remitente_asunto </p>
						<p> <b> Tipo de duda :  </b> <br> $tipoduda </p>
						<p> <b> Mensaje :  </b> <br> $remitente_mensaje</p>
";
	$headers = "From: $remitente_email \r\n";
	$headers .= "Content-type: text/html\r\n";
	mail($contacto_email, $remitente_asunto, $new_mensaje, $headers);
	// Enviar mensaje por este código
	$email  = $_POST['email'];
	$asunto = "Bienvenido a la tienda camrú";
	$msg    = "Gracias por unirte a la tienda más visitada del norte de Chile";
	$from   = "camilo.gdonoso@gmail.com";
	mail($email, $asunto, $msg, $from);
	echo "<h2 align='center'>Tu mensaje ha sido enviado exitosamente</h2>";
}

?>
</div><!-- box Fin -->
			</div><!-- col-md-12 Fin -->
		</div><!-- container Fin -->
	</div><!-- content Fin -->
<?php
include ("includes/footer.php");
?>
	<script src="js/jquery.min.js"> </script>
	<script src="js/bootstrap.min.js"></script>
</body>
	<script>
		function soloLetras(e) {
		    key = e.keyCode || e.which;
		    tecla = String.fromCharCode(key).toLowerCase();
		    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
		    especiales = [8, 37, 39, 46];

		    tecla_especial = false
		    for(var i in especiales) {
		        if(key == especiales[i]) {
		            tecla_especial = true;
		            break;
		        }
		    }

		    if(letras.indexOf(tecla) == -1 && !tecla_especial)
		        return false;
		}
		function limpia() {
		    var val = document.getElementById("miInput").value;
		    var tam = val.length;
		    for(i = 0; i < tam; i++) {
		        if(!isNaN(val[i]))
		            document.getElementById("miInput").value = '';
		    }
		}
	</script>
</html>
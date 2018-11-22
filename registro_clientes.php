<?php
session_start();
include ("includes/db.php");
include ("funciones/funciones.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tienda Virtual </title>
	<link href="styles/bootstrap.min.css" rel="stylesheet">
	<link href="styles/style.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>
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
						<a href="registro.php">
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
				<a class="navbar-brand home" href="index.php"> <!-- navbar-brand home Inicio-->
					<img src="images/logo.png" alt="rutsitas logo" width="140px" class="hidden-xs">
					<img src="images/logo.png" alt="rutsitas logo"  width="55px" class="visible-xs">
				</a> <!-- navbar-brand home Fin-->
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
						<li>
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
					<li>Registro</li>
				</ul><!-- breadcrumb Fin -->
			</div><!--- col-md-12 Fin -->
			<div class="col-md-12" ><!-- col-md-12 Inicio -->
				<div class="box" ><!-- box Inicio -->
					<div class="box-header" ><!-- box-header Inicio -->
						<center><!-- center Inicio -->
							<h2> Registro de Nueva Cuenta </h2>
						</center><!-- center Fin -->
					</div><!-- box-header Fin -->

					<form action="registro_clientes.php" method="post" enctype="multipart/form-data" ><!-- form Inicio -->
						<div class="form-group" ><!-- form-group Inicio -->
							<label>Nombre</label>
							<input type="text" class="form-control" name="cliente_nombre" onkeypress="return soloLetras(event)" id="miInput" required>
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label> Email</label>
							<input type="email" class="form-control" name="cliente_email" id="email_contacto" required>
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label> Contraseña </label>
							<div class="input-group"><!-- input-group Inicio -->
								<span class="input-group-addon"><!-- input-group-addon Inicio -->
									<i class="fa fa-check tick1"> </i>
									<i class="fa fa-times cross1"> </i>
								</span><!-- input-group-addon Fin -->
								<input type="password" class="form-control" id="pass" name="cliente_pass" required>
								<span class="input-group-addon"><!-- input-group-addon Inicio -->
									<div id="meter_wrapper"><!-- meter_wrapper Inicio -->
										<span id="pass_type"> </span>
										<div id="meter"> </div>
									</div><!-- meter_wrapper Fin -->
								</span><!-- input-group-addon Fin -->
							</div><!-- input-group Fin -->
						</div><!-- form-group Fin -->

						<div class="form-group"><!-- form-group Inicio -->
							<label> Confirmar Contraseña </label>
							<div class="input-group"><!-- input-group Inicio -->
								<span class="input-group-addon"><!-- input-group-addon Inicio -->
									<i class="fa fa-check tick2"> </i>
									<i class="fa fa-times cross2"> </i>
								</span><!-- input-group-addon Fin -->

								<input type="password" class="form-control confirm" id="con_pass" required>
							</div><!-- input-group Fin -->
						</div><!-- form-group Fin -->

						<div class="form-group"><!-- form-group Inicio -->
							<label> Región </label>

							<select name="cliente_region" class="form-control"><!-- select Inicio -->
								<option> Elija su Region</option>
<?php
$get_tipo_region = "select * from tipo_region";
$run_tipo_region = mysqli_query($con, $get_tipo_region);
while ($row_tipodudas = mysqli_fetch_array($run_tipo_region)) {
	$region_titulo = $row_tipodudas['region_titulo'];
	echo "<option> $region_titulo </option>";
}
?>
</select><!-- select Fin -->
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label> Ciudad </label>
							<input type="text" class="form-control" name="cliente_ciudad" onkeypress="return soloLetras(event)" onblur="limpia()" id="miInput" required>
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label> Número de Contacto </label>
							<input type="text" class="form-control" name="cliente_contacto" onkeypress="solonumeros(event);" required>
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<label> Dirección </label>
							<input type="text" class="form-control" name="cliente_direccion" required>
						</div><!-- form-group Fin -->
						<div class="form-group"><!-- form-group Inicio -->
							<center>
								<label> Revisión de Captcha </label>
								<div class="g-recaptcha" data-sitekey="6Lc-WxYUAAAAAFUhTFfBEzLGmEgRXHHdsD4ECvIC"></div>
							</center>
						</div><!-- form-group Fin -->

						<div class="text-center"><!-- text-center Inicio -->
							<button type="submit" name="Registro" class="btn btn-primary">
								<i class="fa fa-user-md"></i> Registro
							</button>
						</div><!-- text-center Fin -->
					</form><!-- form Fin -->
				</div><!-- box Fin -->
			</div><!-- col-md-12 Fin -->



		</div><!-- container Fin -->
	</div><!-- content Fin -->



<?php

include ("includes/footer.php");
?>
<script src="js/jquery.min.js"> </script>
	<script src="js/bootstrap.min.js"></script>
	<script src="//oss.maxcdn.com/jquery/1.11.1/jquery.min.js"></script>


	<script>

		$(document).ready(function(){
			$('.tick1').hide();
			$('.cross1').hide();

			$('.tick2').hide();
			$('.cross2').hide();


			$('.confirm').focusout(function(){

				var password = $('#pass').val();

				var confirmPassword = $('#con_pass').val();

				if(password == confirmPassword){

					$('.tick1').show();
					$('.cross1').hide();

					$('.tick2').show();
					$('.cross2').hide();



				}
				else{

					$('.tick1').hide();
					$('.cross1').show();

					$('.tick2').hide();
					$('.cross2').show();


				}


			});


		});

	</script>
	<script>
		function solonumeros(e)
                    {
         var key = window.event ? e.which : e.keyCode;
                        if(key < 48 || key > 57)
                            e.preventDefault();
                    }
	</script>
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


	</script>

	<script>

		$(document).ready(function(){

			$("#pass").keyup(function(){

				check_pass();

			});

		});

		function check_pass() {
			var val=document.getElementById("pass").value;
			var meter=document.getElementById("meter");
			var no=0;
			if(val!="")
			{
// Si el largo del password es menor que 6 digitos
if(val.length<=6)no=1;

 // Si el largo del password es mayor que 6 digitos y contiene cualquier letra chica, numero o cualquier letras especiales.
 if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

  //  Si el largo del password es mayor que 6 digitos y contiene numeros, letras especiales
  if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

  // Si el largo del password es mayor que 6 digitos y que contenga cualquier letra del alfabeto,numeros and letras especiales
  if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

  if(no==1)
  {
  	$("#meter").animate({width:'50px'},300);
  	meter.style.backgroundColor="red";
  	document.getElementById("pass_type").innerHTML="Muy Debil";
  }

  if(no==2)
  {
  	$("#meter").animate({width:'100px'},300);
  	meter.style.backgroundColor="#F5BCA9";
  	document.getElementById("pass_type").innerHTML="Debil";
  }

  if(no==3)
  {
  	$("#meter").animate({width:'150px'},300);
  	meter.style.backgroundColor="#FF8000";
  	document.getElementById("pass_type").innerHTML="Buena";
  }

  if(no==4)
  {
  	$("#meter").animate({width:'200px'},300);
  	meter.style.backgroundColor="#00FF40";
  	document.getElementById("pass_type").innerHTML="Fuerte";
  }
}

else
{
	meter.style.backgroundColor="";
	document.getElementById("pass_type").innerHTML="";
}
}

</script>

</body>

</html>

<?php

if (isset($_POST['Registro'])) {
	$secret   = "6Lc-WxYUAAAAAN5j2OdDsryWwGfREg5eeuZFpKMv";
	$response = $_POST['g-recaptcha-response'];
	$remoteip = $_SERVER['REMOTE_ADDR'];
	$url      = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
	$result   = json_decode($url, TRUE);
	if ($result['success'] == 1) {
		$cliente_nombre    = $_POST['cliente_nombre'];
		$cliente_email     = $_POST['cliente_email'];
		$cliente_pass      = $_POST['cliente_pass'];
		$cliente_region    = $_POST['cliente_region'];
		$cliente_ciudad    = $_POST['cliente_ciudad'];
		$cliente_contacto  = $_POST['cliente_contacto'];
		$cliente_direccion = $_POST['cliente_direccion'];
		$c_ip              = getRealUserIp();
		$get_email         = "select * from cliente where cliente_email='$cliente_email'";
		$run_email         = mysqli_query($con, $get_email);
		$check_email       = mysqli_num_rows($run_email);
		if ($check_email == 1) {
			echo "<script>alert('Este email ya ha sido registrado, intenta con otro')</script>";
			exit();
		}
		$cliente_confirmar_codigo = mt_rand();
		$subject                  = "Mensaje de confirmación";
		$from                     = "camilo.gdonoso@gmail.com";
		$message                  = "
		<h2>
		Confirmación de correo de rutsitas $cliente_nombre
		</h2>
		<a href='localhost/tienda_virtual_actual/cliente/mi_cuenta.php?$cliente_confirmar_codigo'>
		Presione aqui para confirmar correo
		</a>
";
		$headers = "From: $from \r\n";
		$headers .= "Content-type: text/html\r\n";
		mail($cliente_email, $subject, $message, $headers);
		$insert_cliente = "insert into cliente (cliente_nombre,cliente_email,cliente_pass,cliente_region,cliente_ciudad,cliente_contacto,cliente_direccion,cliente_ip,cliente_confirmar_codigo) values ('$cliente_nombre','$cliente_email','$cliente_pass','$cliente_region','$cliente_ciudad','$cliente_contacto','$cliente_direccion','$c_ip','$cliente_confirmar_codigo')";

		$run_cliente   = mysqli_query($con, $insert_cliente);
		$sel_carrito   = "select * from carrito where ip_add='$c_ip'";
		$run_carrito   = mysqli_query($con, $sel_carrito);
		$check_carrito = mysqli_num_rows($run_carrito);
		if ($check_carrito > 0) {
			$_SESSION['cliente_email'] = $cliente_email;
			echo "<script>alert('Has sido registrado exitosamente')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
		} else {
			$_SESSION['cliente_email'] = $cliente_email;
			echo "<script>alert('Has sido registrado exitosamente')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	} else {
		echo "<script>alert('Porfavor seleccione captcha, Intente nuevamente')</script>";
	}
}
?>
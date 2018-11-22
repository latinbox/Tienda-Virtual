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

	echo "Bienvenido :Bienvenido";

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

<a class="navbar-brand home" href="index.php" ><!--- navbar navbar-brand home Inicio -->

<img src="images/logo.png" alt="rutsitas logo" width="140px" class="hidden-xs">
					<img src="images/logo.png" alt="rutsitas logo"  width="55px" class="visible-xs">

</a><!--- navbar navbar-brand home Fin -->

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
<a href="about.php"> Nosotros </a>
</li>

<li>

<a href="services.php"> Services </a>

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

<div class="box"><!-- box Inicio -->

<div class="box-header"><!-- box-header Inicio -->

<center>

<h3> Enter Your Email Below , We Will Send You , Your Password </h3>

</center>

</div><!-- box-header Fin -->

<div align="center"><!-- center div Inicio -->

<form action="" method="post"><!-- form Inicio -->

<input type="text" class="form-control" name="c_email" placeholder="Enter Your Email">

<br>

<input type="submit" name="forgot_pass" class="btn btn-primary" value="Send My Password">

</form><!-- form Fin -->

</div><!-- center div Fin -->

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
</html>

<?php

if (isset($_POST['forgot_pass'])) {

	$c_email = $_POST['c_email'];

	$sel_c = "select * from clientes where cliente_email='$c_email'";

	$run_c = mysqli_query($con, $sel_c);

	$count_c = mysqli_num_rows($run_c);

	$row_c = mysqli_fetch_array($run_c);

	$c_name = $row_c['cliente_name'];

	$c_pass = $row_c['cliente_pass'];

	if ($count_c == 0) {

		echo "<script> alert('Sorry, We do not have your email') </script>";

		exit();

	} else {

		$message = "

<h1 align='center'> Your Password Has Been Sent To You </h1>

<h2 align='center'> Dear $c_name </h2>

<h3 align='center'>

Your Password is : <span> <b>$c_pass</b> </span>

</h3>

<h3 align='center'>

<a href='localhost/ecom_store/checkout.php'>

Click Here To Login Your Account

</a>

</h3>

";

		$from = "sad.ahmed22224@gmail.com";

		$subject = "Your Password";

		$headers = "From: $from\r\n";

		$headers .= "Content-type: text/html\r\n";

		mail($c_email, $subject, $message, $headers);

		echo "<script> alert('Your Password has been sent to you, check your inbox ') </script>";

		echo "<script>window.open('checkout.php','_self')</script>";

	}

}

?>


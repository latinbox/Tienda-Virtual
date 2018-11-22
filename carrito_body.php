<?php
session_start();
include ("includes/db.php");
include ("funciones/funciones.php");
?>
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
					Por Pagar: <?php precio_total();
?>, Total de Items <?php items();
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
							Ir al Carrito
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
						<li class="active" >
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
					<li>carrito</li>
				</ul><!-- breadcrumb Fin -->
			</div><!--- col-md-12 Fin -->
			<div class="col-md-9" id="carrito" ><!-- col-md-9 Inicio -->
				<div class="box" ><!-- box Inicio -->
					<form action="carrito.php" method="post" enctype="multipart-form-data" ><!-- form Inicio -->
						<h1> Carrito de Compra </h1>
<?php
$ip_add         = getRealUserIp();
$select_carrito = "select * from carrito where ip_add='$ip_add'";
$run_carrito    = mysqli_query($con, $select_carrito);
$count          = mysqli_num_rows($run_carrito);
?>

						<p class="text-muted" > Tienes <?php echo $count;?>item(s) in tu carrito. </p>
						<div class="table-responsive" ><!-- table-responsive Inicio -->
							<table class="table" ><!-- table Inicio -->
								<thead><!-- thead Inicio -->
									<tr>
										<th colspan="2" >Producto</th>
										<th>Cantidad</th>
										<th>Precio Unidad</th>
										<th>Tamaño</th>
										<th colspan="1">Borrar</th>
										<th colspan="2"> Sub Total </th>
									</tr>
								</thead><!-- thead Fin -->
								<tbody><!-- tbody Inicio -->
<?php

$total = 0;

while ($row_carrito = mysqli_fetch_array($run_carrito)) {
	$pro_id       = $row_carrito['p_id'];
	$pro_size     = $row_carrito['tamano'];
	$pro_cantidad = $row_carrito['cantidad'];
	$only_price   = $row_carrito['p_precio'];

	$get_Productos = "select * from producto where producto_id='$pro_id'";
	$run_Productos = mysqli_query($con, $get_Productos);
	while ($row_Productos = mysqli_fetch_array($run_Productos)) {
		$product_title            = $row_Productos['producto_titulo'];
		$product_img1             = $row_Productos['producto_img1'];
		$sub_total                = $only_price*$pro_cantidad;
		$_SESSION['pro_cantidad'] = $pro_cantidad;
		$total += $sub_total;

		?>

															<tr><!-- tr Inicio -->
																<td>
																	<img src="admin_area/product_images/<?php echo $product_img1;?>" >
																</td>
																<td>
																	<a href="#" > <?php echo $product_title;?> </a>
																</td>
																<td>
																	<input type="text" name="cantidad" value="<?php echo $_SESSION['pro_cantidad'];?>" data-product_id="<?php echo $pro_id;?>" class="quantity form-control">
																</td>
																<td>
																	$<?php echo $only_price;?>.00
																</td>
																<td>
		<?php echo $pro_size;?>
																</td>
																<td>
																	<input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>">
																</td>

																<td>

																	$<?php echo $sub_total;?>.00

																</td>

															</tr><!-- tr Fin -->

		<?php }}?>
									</tbody><!-- tbody Fin -->
									<tfoot><!-- tfoot Inicio -->
										<tr>
											<th colspan="5"> Total </th>
											<th colspan="2"> $<?php echo $total;?>.00 </th>
										</tr>
									</tfoot><!-- tfoot Fin -->
								</table><!-- table Fin -->
								<div class="form-inline pull-right"><!-- form-inline pull-right Inicio -->
									<div class="form-group"><!-- form-group Inicio -->
										<label>Coupon Code : </label>
										<input type="text" name="code" class="form-control">
									</div><!-- form-group Fin -->
									<input class="btn btn-primary" type="submit" name="apply_coupon" value="Apply Coupon Code" >
								</div><!-- form-inline pull-right Fin -->
							</div><!-- table-responsive Fin -->
							<div class="box-footer"><!-- box-footer Inicio -->
								<div class="pull-left"><!-- pull-left Inicio -->
									<a href="index.php" class="btn btn-default">
										<i class="fa fa-chevron-left"></i> Continue Tiendaping
									</a>
								</div><!-- pull-left Fin -->
								<div class="pull-right"><!-- pull-right Inicio -->
									<button class="btn btn-default" type="submit" name="update" value="Update carrito">
										<i class="fa fa-refresh"></i> Update carrito
									</button>
									<a href="checkout.php" class="btn btn-primary">
										Proceed to checkout <i class="fa fa-chevron-right"></i>
									</a>
								</div><!-- pull-right Fin -->
							</div><!-- box-footer Fin -->
						</form><!-- form Fin -->
					</div><!-- box Fin -->

<?php

function update_carrito() {
	global $con;
	if (isset($_POST['update'])) {
		foreach ($_POST['remove'] as $remove_id) {
			$delete_product = "delete from carrito where p_id='$remove_id'";
			$run_delete     = mysqli_query($con, $delete_product);
			if ($run_delete) {
				echo "<script>window.open('carrito.php','_self')</script>";
			}
		}
	}
}
echo @$up_carrito = update_carrito();
?>
<div id="row same-height-row"><!-- row same-height-row Inicio -->
						<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Inicio -->
							<div class="box same-height headline"><!-- box same-height headline Inicio -->
								<h3 class="text-center"> También te podrían gustar estos productos </h3>
							</div><!-- box same-height headline Fin -->
						</div><!-- col-md-3 col-sm-6 Fin -->
<?php
$get_Productos = "select * from producto order by rand() LIMIT 0,3";
$run_Productos = mysqli_query($con, $get_Productos);
while ($row_Productos = mysqli_fetch_array($run_Productos)) {
	$pro_id       = $row_Productos['producto_id'];
	$pro_titulo   = $row_Productos['producto_titulo'];
	$pro_precio   = $row_Productos['producto_precio'];
	$pro_img1     = $row_Productos['producto_img1'];
	$marca_id     = $row_Productos['marca_id'];
	$get_marca    = "select * from marca where marca_id='$marca_id'";
	$run_marca    = mysqli_query($db, $get_marca);
	$row_marca    = mysqli_fetch_array($run_marca);
	$marca_nombre = $row_marca['marca_titulo'];
	$pro_url      = $row_Productos['producto_url'];
	echo "
							<div class='col-md-3 col-sm-6 center-responsive' >
							<div class='product' >
							<a href='$pro_url' >
							<img src='admin_area/product_images/$pro_img1' class='img-responsive' >
							</a>
							<div class='text' >
							<center>
							<p class='btn btn-primary'> $marca_nombre </p>
							</center>
							<hr>
							<h3><a href='$pro_url' >$pro_titulo</a></h3>
							<p class='price' > $pro_precio </p>
							<p class='buttons' >
							<a href='$pro_url' class='btn btn-default' >Ver detalles</a>
							<a href='$pro_url' class='btn btn-primary'>
							<i class='fa fa-Tiendaping-carrito'></i> Agregar al carrito
							</a>
							</p>
							</div>
							</div>
							</div>

";

}

?>


					</div><!-- row same-height-row Fin -->
				</div><!-- col-md-9 Fin -->
				<div class="col-md-3"><!-- col-md-3 Inicio -->
					<div class="box" id="order-summary"><!-- box Inicio -->
						<div class="box-header"><!-- box-header Inicio -->
							<h3>Order Summary</h3>
						</div><!-- box-header Fin -->
						<p class="text-muted">
							Shipping and additional costs are calculated based on the values you have entered.
						</p>
						<div class="table-responsive"><!-- table-responsive Inicio -->
							<table class="table"><!-- table Inicio -->
								<tbody><!-- tbody Inicio -->
									<tr>
										<td> Order Subtotal </td>
										<th> $<?php echo $total;?>.00 </th>
									</tr>
									<tr>
										<td> Shipping and handling </td>
										<th>$0.00</th>
									</tr>
									<tr>
										<td>Tax</td>
										<th>$0.00</th>
									</tr>
									<tr class="total">
										<td>Total</td>
										<th>$<?php echo $total;?>.00</th>
									</tr>
								</tbody><!-- tbody Fin -->
							</table><!-- table Fin -->
						</div><!-- table-responsive Fin -->
					</div><!-- box Fin -->
				</div><!-- col-md-3 Fin -->
			</div><!-- container Fin -->
		</div><!-- content Fin -->


<?php
include ("includes/footer.php");
?>
		<script src="js/jquery.min.js"> </script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(data){
				$(document).on('keyup', '.cantidad', function(){
					var id = $(this).data("product_id");
					var cantidad = $(this).val();
					if(cantidad  != ''){
						$.ajax({
							url:"change.php",
							method:"POST",
							data:{id:id, cantidad:cantidad},
							success:function(data){
								$("body").load('carrito_body.php');
							}
						});
					}

				});

			});

		</script>

	</body>
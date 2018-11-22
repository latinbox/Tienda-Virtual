<?php

$db = mysqli_connect("localhost", "root", "", "tienda_virtual_actual");

/// IP address code Inicio /////
function getRealUserIp() {
	switch (true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP'])):return $_SERVER['HTTP_X_REAL_IP'];
		case (!empty($_SERVER['HTTP_CLIENT_IP'])):return $_SERVER['HTTP_CLIENT_IP'];
		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):return $_SERVER['HTTP_X_FORWARDED_FOR'];
		default:return $_SERVER['REMOTE_ADDR'];
	}
}
/// IP address code Fin /////

// items function Inicio ///

function items() {
	global $db;
	$ip_add = getRealUserIp();
	$get_items = "select * from carrito where ip_add='$ip_add'";
	$run_items = mysqli_query($db, $get_items);
	$count_items = mysqli_num_rows($run_items);
	echo $count_items;
}

// items function Fin ///

// precio_total function Inicio //

function precio_total() {
	global $db;
	$ip_add = getRealUserIp();
	$total = 0;
	$select_carrito = "select * from carrito where ip_add='$ip_add'";
	$run_carrito = mysqli_query($db, $select_carrito);
	while ($record = mysqli_fetch_array($run_carrito)) {
		$pro_id = $record['p_id'];
		$pro_qty = $record['cantidad'];
		$get_price = "select * from producto where producto_id='$pro_id'";
		$run_price = mysqli_query($db, $get_price);
		while ($row_price = mysqli_fetch_array($run_price)) {
			$sub_total = $row_price['producto_precio']*$pro_qty;
			$total += $sub_total;
		}
	}

	echo "$".$total;

}

// precio_total function Fin //

function getPro() {
	global $db;
	$get_Productos = "select * from producto order by 1 DESC LIMIT 0,8";
	$run_Productos = mysqli_query($db, $get_Productos);
	while ($row_Productos = mysqli_fetch_array($run_Productos)) {
		$pro_id = $row_Productos['producto_id'];
		$pro_title = $row_Productos['producto_titulo'];
		$pro_price = $row_Productos['producto_precio'];
		$pro_img1 = $row_Productos['producto_img1'];
		echo "
<div class='col-md-4 col-sm-6 single' >
<div class='product' >
<a href='details.php?pro_id=$pro_id' >
<img src='admin_area/product_images/$pro_img1' class='img-responsive' >
</a>
<div class='text' >
<h3><a href='details.php?pro_id=$pro_id' >$pro_title</a></h3>
<p class='price' >$ $pro_price</p>
<p class='buttons' >
<a href='details.php?pro_id=$pro_id' class='btn btn-default' >Ver detalles</a>
<a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
<i class='fa fa-Tiendaping-carrito'></i> Agregar al carrito
</a>
</p>
</div>

</div>
</div>

";

	}

}

?>
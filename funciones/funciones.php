<?php

$db = mysqli_connect("localhost", "root", "", "tienda_virtual_actual");

/// IP address codigo Inicio /////
function getRealUserIp() {
	switch (true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP'])):return $_SERVER['HTTP_X_REAL_IP'];
		case (!empty($_SERVER['HTTP_CLIENT_IP'])):return $_SERVER['HTTP_CLIENT_IP'];
		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):return $_SERVER['HTTP_X_FORWARDED_FOR'];
		default:return $_SERVER['REMOTE_ADDR'];
	}
}
/// IP address codigo Fin /////

//  Inicio Función items ///

function items() {
	global $db;
	$ip_add      = getRealUserIp();
	$get_items   = "select * from carrito where ip_add='$ip_add'";
	$run_items   = mysqli_query($db, $get_items);
	$count_items = mysqli_num_rows($run_items);
	echo $count_items;
}

function CantidadFinalDisponible() {
	global $db;
	$get_productos = "select * from producto where ip_add='$ip_add'";
	$run_productos = mysqli_query($db, $get_productos);
	while ($fila_productos = mysqli_fetch_array($run_productos)) {
		$pro_cantidad = $fila_productos['cantidad_ingresada'];
		$sub_total    = $fila_productos['cantidad']-$pro_cantidad;
	}

}

// Fin Función items///

//  Inicio Función precio_total //

function precio_total() {
	global $db;
	$ip_add         = getRealUserIp();
	$total          = 0;
	$select_carrito = "select * from carrito where ip_add='$ip_add'";
	$run_carrito    = mysqli_query($db, $select_carrito);
	while ($record = mysqli_fetch_array($run_carrito)) {
		$pro_id       = $record['p_id'];
		$pro_cantidad = $record['cantidad'];
		$sub_total    = $record['p_precio']*$pro_cantidad;
		$total += $sub_total;
	}

	echo "$".$total;

}

//  Fin de Función precio_total //

//  Inicio función getPro//

function getPro() {

	global $db;
	$get_productos = "select * from producto order by 1 DESC LIMIT 0,8";
	$run_productos = mysqli_query($db, $get_productos);
	while ($fila_productos = mysqli_fetch_array($run_productos)) {
		$pro_id          = $fila_productos['producto_id'];
		$pro_titulo      = $fila_productos['producto_titulo'];
		$pro_precio      = $fila_productos['producto_precio'];
		$pro_img1        = $fila_productos['producto_img1'];
		$marca_id        = $fila_productos['marca_id'];
		$get_marca       = "select * from marca where marca_id='$marca_id'";
		$run_marca       = mysqli_query($db, $get_marca);
		$fila_marca      = mysqli_fetch_array($run_marca);
		$marca_nombre    = $fila_marca['marca_titulo'];
		$pro_url         = $fila_productos['producto_url'];
		$producto_precio = " $$pro_precio ";

		echo "
<div class='col-md-4 col-sm-6 single' >
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
<p class='price' > $producto_precio </p>
<p class='buttons' >
<a href='$pro_url' class='btn btn-default' >Ver detalles</a>
<a href='$pro_url' class='btn btn-primary'>
<i class='fa fa-shopping-cart'></i> Agregar al carrito
</a>
</p>
</div>
</div>
</div>
";
	}

}

// Fin de función getPro //

///  Inicio de función getProductos ///

function getProductos() {

	/// Comienzo de codigo getProductos ///

	global $db;

	$aWhere = array();
	/// Inicio de Codigo Marca ///
	if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {
		foreach ($_REQUEST['man'] as $sKey => $sVal) {
			if ((int) $sVal != 0) {
				$aWhere[] = 'marca_id='.(int) $sVal;
			}
		}
	}
	/// Fin de Codigo Marca ///

	/// Inicio de Codigo producto_categoria ///
	if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {
		foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {
			if ((int) $sVal != 0) {
				$aWhere[] = 'p_cat_id='.(int) $sVal;
			}
		}
	}
	/// Fin de Codigo producto_categoria ///

	/// Inicio de Categorias ///

	if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {
		foreach ($_REQUEST['cat'] as $sKey => $sVal) {
			if ((int) $sVal != 0) {
				$aWhere[] = 'cat_id='.(int) $sVal;
			}
		}
	}

	/// Fin de Codigo Categoria ///
	$por_pagina = 6;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	$empezar_por   = ($page-1)*$por_pagina;
	$sLimit        = " order by 1 DESC LIMIT $empezar_por,$por_pagina";
	$sWhere        = (count($aWhere) > 0?' WHERE '.implode(' or ', $aWhere):'').$sLimit;
	$get_productos = "select * from producto  ".$sWhere;
	$run_productos = mysqli_query($db, $get_productos);
	while ($fila_productos = mysqli_fetch_array($run_productos)) {
		$pro_id       = $fila_productos['producto_id'];
		$pro_titulo   = $fila_productos['producto_titulo'];
		$pro_price    = $fila_productos['producto_precio'];
		$pro_img1     = $fila_productos['producto_img1'];
		$marca_id     = $fila_productos['marca_id'];
		$get_marca    = "select * from marca where marca_id='$marca_id'";
		$run_marca    = mysqli_query($db, $get_marca);
		$fila_marca   = mysqli_fetch_array($run_marca);
		$marca_nombre = $fila_marca['marca_titulo'];
		$pro_url      = $fila_productos['producto_url'];

		$producto_precio = "$$pro_price";

		echo "
<div class='col-md-4 col-sm-6 center-responsive' >
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
<p class='price' > $producto_precio </p>
<p class='buttons' >
<a href='$pro_url' class='btn btn-default' >Ver detalles</a>
<a href='$pro_url' class='btn btn-primary'>
<i class='fa fa-shopping-cart'></i> Agregar al carrito
</a>
</p>
</div>
</div>
</div>
";

	}
	/// Fin de codigo GetProductos ///

}

/// Inicio de función getPaginator ///

function getPaginator() {

	/// Inicio código getPaginator///

	$por_pagina = 6;
	global $db;
	$aWhere = array();
	$aPath  = '';

	/// Inicio codigo marcas///

	if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {
		foreach ($_REQUEST['man'] as $sKey => $sVal) {
			if ((int) $sVal != 0) {
				$aWhere[] = 'marca_id='.(int) $sVal;
				$aPath .= 'man[]='.(int) $sVal.'&';
			}
		}
	}

	/// Fin codigo marcas///

	/// Inicio de codigo categoria productos ///

	if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {
		foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {
			if ((int) $sVal != 0) {
				$aWhere[] = 'p_cat_id='.(int) $sVal;
				$aPath .= 'p_cat[]='.(int) $sVal.'&';
			}
		}
	}
	/// Fin del codigo categoria productos ///

	///  Inicio codigo categoria///
	if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {
		foreach ($_REQUEST['cat'] as $sKey => $sVal) {
			if ((int) $sVal != 0) {
				$aWhere[] = 'cat_id='.(int) $sVal;
				$aPath .= 'cat[]='.(int) $sVal.'&';
			}
		}
	}

	/// Fin codigo categoria ///

	$sWhere        = (count($aWhere) > 0?' WHERE '.implode(' or ', $aWhere):'');
	$query         = "select * from producto ".$sWhere;
	$resultado     = mysqli_query($db, $query);
	$total_records = mysqli_num_rows($resultado);
	$total_paginas = ceil($total_records/$por_pagina);
	echo "<li><a href='shop.php?page=1";
	if (!empty($aPath)) {echo "&".$aPath;}
	echo "' >".'Primera página'."</a></li>";
	for ($i = 1; $i <= $total_paginas; $i++) {
		echo "<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";
	};
	echo "<li><a href='shop.php?page=$total_paginas";
	if (!empty($aPath)) {echo "&".$aPath;}
	echo "' >".'Ultima pagina'."</a></li>";
	/// Fin de codigo getPaginator  ///
}

/// Fin de la funcion codepaginator ///

?>
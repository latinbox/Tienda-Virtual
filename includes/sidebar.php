<?php
$aMan = array();

$aPCat = array();

$aCat = array();



?>
<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Inicio -->
<div class="panel-heading"><!-- panel-heading Inicio -->
<h3 class="panel-title"><!-- panel-title Inicio -->
Marcas
<div class="pull-right"><!-- pull-right Inicio -->
<a href="#" style="color:black;">
<span class="nav-toggle hide-show">
Esconder
</span>
</a>
</div><!-- pull-right Fin -->
</h3><!-- panel-title Fin -->
</div><!-- panel-heading Fin -->
<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Inicio -->
<div class="panel-body"><!-- panel-body Inicio -->
<div class="input-group"><!-- input-group Inicio -->
<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-marca" placeholder="Filtrar Marcas">

<a class="input-group-addon"> <i class="fa fa-search"></i> </a>
</div><!-- input-group Fin -->
</div><!-- panel-body Fin -->
<div class="panel-body scroll-menu"><!-- panel-body scroll-menu Inicio -->
<ul class="nav nav-pills nav-stacked category-menu" id="dev-marca"><!-- nav nav-pills nav-stacked category-menu Inicio -->
<?php
$get_marca = "select * from marca";
$run_marca = mysqli_query($con, $get_marca);
while ($fila_marca = mysqli_fetch_array($run_marca)) {
	$marca_id = $fila_marca['marca_id'];
	$marca_titulo = $fila_marca['marca_titulo'];
	$marca_imagen = $fila_marca['marca_imagen'];
	if ($marca_imagen == "") {
	} else {
		$marca_imagen = "
<img src='admin_area/other_images/$marca_imagen' width='20px'> &nbsp;
";
	}
	echo "
<li class='checkbox checkbox-primary'>
<a>
<label>
<input ";
	if (isset($aMan[$marca_id])) {echo "checked='checked'";}
	echo " type='checkbox' value='$marca_id' name='marca' class='get_marca'>
<span>
$marca_imagen
$marca_titulo</span>
</label>
</a>
</li>
";
}
?>
</ul><!-- nav nav-pills nav-stacked category-menu Fin -->
</div><!-- panel-body scroll-menu Fin -->
</div><!-- panel-collapse collapse-data Fin -->
</div><!-- panel panel-default sidebar-menu Fin -->
<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Inicio -->
<div class="panel-heading"><!-- panel-heading Inicio -->
<h3 class="panel-title"><!-- panel-title Inicio -->
Categoría de Productos
<div class="pull-right"><!-- pull-right Inicio -->
<a href="#" style="color:black;">
<span class="nav-toggle hide-show">
Esconder
</span>
</a>
</div><!-- pull-right Fin -->
</h3><!-- panel-title Fin -->
</div><!-- panel-heading Fin -->
<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Inicio -->
<div class="panel-body"><!-- panel-body Inicio -->
<div class="input-group"><!-- input-group Inicio -->
<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Filtrar categoria de productos">
<a class="input-group-addon"> <i class="fa fa-search"></i> </a>
</div><!-- input-group Fin -->
</div><!-- panel-body Fin -->
<div class="panel-body scroll-menu"><!-- panel-body scroll-menu Inicio -->
<ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats"><!-- nav nav-pills nav-stacked category-menu Inicio -->

<?php

$get_p_cats = "select * from producto_categoria";
$run_p_cats = mysqli_query($con, $get_p_cats);
while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
	$p_cat_id = $row_p_cats['p_cat_id'];
	$p_cat_titulo = $row_p_cats['p_cat_titulo'];
	$p_cat_imagen = $row_p_cats['p_cat_imagen'];
	if ($p_cat_imagen == "") {
	} else {
		$p_cat_imagen = "<img src='admin_area/other_images/$p_cat_imagen' width='20'> &nbsp;";

	}

	echo "

<li class='checkbox checkbox-primary' >

<a>

<label>

<input ";
	if (isset($aPCat[$p_cat_id])) {echo "checked='checked'";}
	echo " type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat' >
<span>
$p_cat_imagen
$p_cat_titulo</span>
</label>
</a>
</li>
";
}
?>
</ul><!-- nav nav-pills nav-stacked category-menu Fin -->
</div><!-- panel-body scroll-menu Fin -->
</div><!-- panel-collapse collapse-data Fin -->
</div><!--- panel panel-default sidebar-menu Fin -->
<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Inicio -->
<div class="panel-heading"><!-- panel-heading Inicio -->
<h3 class="panel-title"><!-- panel-title Inicio -->
Categorias
<div class="pull-right"><!-- pull-right Inicio -->
<a href="#" style="color:black;">
<span class="nav-toggle hide-show">
Esconder
</span>
</a>
</div><!-- pull-right Fin -->
</h3><!-- panel-title Fin -->
</div><!-- panel-heading Fin -->
<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Inicio -->
<div class="panel-body"><!-- panel-body Inicio -->
<div class="input-group"><!-- input-group Inicio -->
<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" placeholder="Filter Categories">
<a class="input-group-addon"> <i class="fa fa-search"> </i> </a>
</div><!-- input-group Fin -->
</div><!-- panel-body Fin -->
<div class="panel-body scroll-menu"><!-- panel-body scroll-menu Inicio -->
<ul class="nav nav-pills nav-stacked category-menu" id="dev-cats"><!-- nav nav-pills nav-stacked category-menu Inicio -->
<?php
$get_cat = "select * from categoria";
$run_cat = mysqli_query($con, $get_cat);
while ($row_cat = mysqli_fetch_array($run_cat)) {
	$cat_id = $row_cat['cat_id'];
	$cat_titulo = $row_cat['cat_titulo'];
	$cat_imagen = $row_cat['cat_imagen'];
	if ($cat_imagen == "") {
	} else {
		$cat_imagen = "<img src='admin_area/other_images/$cat_imagen' width='20'>&nbsp;";
	}
	echo "

<li class='checkbox checkbox-primary'>
<a>
<label>
<input ";
	if (isset($aCat[$cat_id])) {echo "checked='checked'";}
	echo " type='checkbox' value='$cat_id' name='cat' class='get_cat' id='cat'>
<span>
$cat_imagen
$cat_titulo</span>
</label>
</a>
</li>
";
}
?>
</ul><!-- nav nav-pills nav-stacked category-menu Fin -->
</div><!-- panel-body scroll-menu Fin -->
</div><!-- panel-collapse collapse-data Fin -->
</div><!--- panel panel-default sidebar-menu Fin -->

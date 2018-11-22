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
          <a href="registro_clientes.php">
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
          <li class="active" >
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
        <li>Tienda</li>
      </ul><!-- breadcrumb Fin -->
    </div><!--- col-md-12 Fin -->
    <div class="col-md-3"><!-- col-md-3 Inicio -->
<?php include ("includes/sidebar.php");?>
</div><!-- col-md-3 Fin -->
    <div class="col-md-9" ><!-- col-md-9 Inicio --->
      <div class='box'>
        <h1>Tienda</h1>
        <p><strong>Bienvenidos a la tienda Camrú</strong>.Tenemos el perfecto balance entre precio y calidad en lo que a ropa deportiva se refiere. Somos pioneros en la segunda región en ofrecer un servicio flexible para el cliente.Podrás pedir tu producto online mediante paypal. Si quieres igualmente nos puedes solicitar el producto que necesites. Para más información accede al menú contacto. </p>
      </div>
      <div class="row" id="Productos" ><!-- row Inicio -->
<?php getProductos();?>
</div><!-- row Fin -->
      <center><!-- center Inicio -->
        <ul class="pagination" ><!-- pagination Inicio -->
<?php getPaginator();?>
</ul><!-- pagination Fin -->
      </center><!-- center Fin -->
    </div><!-- col-md-9 Fin --->
    <div id="wait" style="position:absolute;top:40%;left:45%;padding:100px;padding-top:200px;"><!--- wait Inicio -->
    </div><!--- wait Fin -->
  </div><!-- container Fin -->
</div><!-- content Fin -->
<?php
include ("includes/footer.php");
?>
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
/// Inicio de Esconder y Mostrar Codigo///
$('.nav-toggle').click(function(){
  $(".panel-collapse,.collapse-data").slideToggle(700,function(){
    if($(this).css('display')=='none'){
      $(".hide-show").html('Mostrar');
    }
    else{
      $(".hide-show").html('Esconder');
    }
  });
});
/// Fin Esconder y Mostrar ///
/// Inicio de Filtros de búsqueda  ///
$(function(){
  $.fn.extend({
    filterTable: function(){
      return this.each(function(){
        $(this).on('keyup', function(){
          var $this = $(this),
          search = $this.val().toLowerCase(),
          target = $this.attr('data-filters'),
          handle = $(target),
          rows = handle.find('li a');
          if(search == '') {
            rows.show();
          } else {
            rows.each(function(){
              var $this = $(this);
              $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
            });
          }
        });
      });
    }
  });
  $('[data-action="filter"][id="dev-table-filter"]').filterTable();
});
/// Search Filters code Fin ///
});
</script>
<script>
  $(document).ready(function(){
  // getProductos Function Code Inicio
  function getProductos(){
  // marcas Code Inicio
  var sPath = '';
  var aInputs = $('li').find('.get_marca');
  var aKeys = Array();
  var aValues = Array();
  iKey = 0;
  $.each(aInputs,function(key,oInput){
    if(oInput.checked){
      aKeys[iKey] =  oInput.value
    };
    iKey++;
  });
  if(aKeys.length>0){
    var sPath = '';
    for(var i = 0; i < aKeys.length; i++){
      sPath = sPath + 'man[]=' + aKeys[i]+'&';
    }
  }
// marcas Code Fin
// Inicio de Categoria de Productos
var aInputs = Array();
var aInputs = $('li').find('.get_p_cat');
var aKeys = Array();
var aValues = Array();
iKey = 0;
$.each(aInputs,function(key,oInput){
  if(oInput.checked){
    aKeys[iKey] =  oInput.value
  };
  iKey++;
});
if(aKeys.length>0){
  for(var i = 0; i < aKeys.length; i++){
    sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';
  }
}
// Fin de Categoria de Productos
   // Categories Code Inicio
   var aInputs = Array();
   var aInputs = $('li').find('.get_cat');
   var aKeys  = Array();
   var aValues = Array();
   iKey = 0;
   $.each(aInputs,function(key,oInput){
    if(oInput.checked){
      aKeys[iKey] =  oInput.value
    };
    iKey++;
  });
   if(aKeys.length>0){
    for(var i = 0; i < aKeys.length; i++){
      sPath = sPath + 'cat[]=' + aKeys[i]+'&';
    }
  }
   // Categories Code Fin
   // Inicio de Loader
   $('#wait').html('<img src="images/load.gif">');
// Fin de Loader
// Inicio de ajax
$.ajax({
  url:"load.php",
  method:"POST",
  data: sPath+'sAction=getProductos',
  success:function(data){
   $('#Productos').html('');
   $('#Productos').html(data);
   $("#wait").empty();
 }
});
$.ajax({
  url:"load.php",
  method:"POST",
  data: sPath+'sAction=getPaginator',
  success:function(data){
    $('.pagination').html('');
    $('.pagination').html(data);
  }
});
// Fin de ajax
}
   // getProductos Function Code Fin
   $('.get_marca').click(function(){
    getProductos();
  });
   $('.get_p_cat').click(function(){
    getProductos();
  });
   $('.get_cat').click(function(){
    getProductos();
  });
 });
</script>
</body>
</html>
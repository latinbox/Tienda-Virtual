<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Inicio -->
<div class="panel-heading"><!-- panel-heading Inicio -->
<?php
$cliente_session = $_SESSION['cliente_email'];
$get_cliente = "select * from cliente where cliente_email='$cliente_session'";
$run_cliente = mysqli_query($con, $get_cliente);
$row_cliente = mysqli_fetch_array($run_cliente);
$cliente_name = $row_cliente['cliente_nombre'];
if (!isset($_SESSION['cliente_email'])) {
} else {
	echo "
<br>
<h3 align='center' class='panel-title'> Bienvenido : $cliente_name</h3>
";
}
?>
</div><!-- panel-heading Fin -->
<div class="panel-body"><!-- panel-body Inicio -->
<ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Inicio -->
<li class="<?php if (isset($_GET['mis_pedidos'])) {echo "active";}?>">
<a href="mi_cuenta.php?mis_pedidos"> <i class="fa fa-list"> </i> Mis Pedidos </a>
<li class="<?php if (isset($_GET['editar_cuenta'])) {echo "active";}?>">
<a href="mi_cuenta.php?editar_cuenta"> <i class="fa fa-pencil"></i> Editar Cuenta </a>
</li>
<li class="<?php if (isset($_GET['cambiar_pass'])) {echo "active";}?>">
<a href="mi_cuenta.php?cambiar_pass"> <i class="fa fa-user"></i> Cambiar Password </a>
</li>
<li class="<?php if (isset($_GET['mi_lista_deseos'])) {echo "active";}?>">
<a href="mi_cuenta.php?mi_lista_deseos"> <i class="fa fa-heart"></i> Mi lista de deseos </a>
</li>
<li class="<?php if (isset($_GET['borrar_cuenta'])) {echo "active";}?>">
<a href="mi_cuenta.php?borrar_cuenta"> <i class="fa fa-trash-o"></i> Borrar Cuenta </a>
</li>
<li>
<a href="logout.php"> <i class="fa fa-sign-out"></i> Cerrar sesión </a>
</li>


</ul><!-- nav nav-pills nav-stacked Fin -->
</div><!-- panel-body Fin -->
</div><!-- panel panel-default sidebar-menu Fin -->
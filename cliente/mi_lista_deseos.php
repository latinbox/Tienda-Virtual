<center><!-- center Inicio -->
<h1> My Lista de deseos </h1>
<p class="lead"> Tus deseos en un solo sitio </p>
</center><!-- center Fin -->
<hr>
<div class="table-responsive"><!-- table-responsive Inicio -->
<table class="table table-bordered table-hover"><!-- table table-bordered table-hover Inicio -->
<thead>
<tr>
<th> Nr: </th>
<th> Producto </th>
<th> Borrar lista de deseos </th>
</tr>
</thead>
<tbody>
<?php
$cliente_session = $_SESSION['cliente_email'];
$get_cliente = "select * from cliente where cliente_email='$cliente_session'";
$run_cliente = mysqli_query($con, $get_cliente);
$row_cliente = mysqli_fetch_array($run_cliente);
$cliente_id = $row_cliente['cliente_id'];
$i = 0;
$get_wishlist = "select * from lista_deseos where cliente_id='$cliente_id'";
$run_wishlist = mysqli_query($con, $get_wishlist);
while ($fila_listadeseos = mysqli_fetch_array($run_wishlist)) {
	$lista_deseos_id = $fila_listadeseos['lista_deseos_id'];
	$producto_id = $fila_listadeseos['producto_id'];
	$get_productos = "select * from producto where producto_id='$producto_id'";
	$run_Productos = mysqli_query($con, $get_productos);
	$row_Productos = mysqli_fetch_array($run_Productos);
	$producto_titulo = $row_Productos['producto_titulo'];
	$producto_url = $row_Productos['producto_url'];
	$producto_img1 = $row_Productos['producto_img1'];
	$i++;
	?>
				<tr>
				<td width="100"> <?php echo $i;?> </td>
				<td>
				<img src="../admin_area/product_images/<?php echo $producto_img1;?>" width="60" height="60">
				&nbsp;
				&nbsp;
				&nbsp;

				<a href="../<?php echo $producto_url;?>">
	<?php echo $producto_titulo;?>
				</a>
				</td>
				<td>
				<a href="mi_cuenta.php?borrar_lista_deseos=<?php echo $lista_deseos_id;?>" class="btn btn-primary">
				<i class="fa fa-trash-o"> </i> Borrar
				</a>
				</td>
				</tr>
	<?php }?>
</tbody>
</table><!-- table table-bordered table-hover Fin -->
</div><!-- table-responsive Fin -->
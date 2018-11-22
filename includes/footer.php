<div id="footer"><!-- footer Inicio -->
	<div class="container"><!-- container Inicio -->
		<div class="row" ><!-- row Inicio -->
			<div class="col-md-3 col-sm-6" ><!-- col-md-3 col-sm-6 Inicio -->
				<h4>Páginas</h4>
				<ul><!-- ul Inicio -->
					<li><a href="carrito.php">Carrito de Compra</a></li>
					<li><a href="contacto.php">Contáctanos</a></li>
					<li><a href="shop.php">Tienda</a></li>
					<li>
						<?php
						if (!isset($_SESSION['cliente_email'])) {
							echo "<a href='checkout.php' >Mi Cuenta</a>";
						} else {
							echo "<a href='cliente/mi_cuenta.php?mis_pedidos'>Mi Cuenta</a>";
						}
						?>
					</li>
				</ul><!-- ul Fin -->
				<hr>
				<h4>Sección Usuario</h4>
				<ul><!-- ul Inicio -->
					<li>
						<?php
						if (!isset($_SESSION['cliente_email'])) {
							echo "<a href='checkout.php' >Login</a>";
						} else {
							echo "<a href='cliente/mi_cuenta.php?mis_pedidos'>Mi Cuenta</a>";
						}
						?>
					</li>
					<li><a href="registro_clientes.php">Registro</a></li>
					<li><a href="terminos.php">Terminos y Condiciones </a></li>
				</ul><!-- ul Fin -->
				<hr class="hidden-md hidden-lg hidden-sm" >
			</div><!-- col-md-3 col-sm-6 Fin -->
			<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Inicio -->
				<h4> Categoría de productos  </h4>
				<ul><!-- ul Inicio -->
					<?php
					$get_p_cats = "select * from producto_categoria";
					$run_p_cats = mysqli_query($con, $get_p_cats);
					while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
						$p_cat_id = $row_p_cats['p_cat_id'];
						$p_cat_title = $row_p_cats['p_cat_titulo'];
						echo "<li> <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a> </li>";
					}
					?>
				</ul><!-- ul Fin -->

				<hr class="hidden-md hidden-lg">

			</div><!-- col-md-3 col-sm-6 Fin -->


			<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Inicio -->

				<h4>Dónde encontrarnos</h4>
				<p><!--Comienzo de p -->
					<strong>Rutsita store</strong>
					<br>Antilhue 31
					<br>Antofagasta
					<br>93872939
					<br>
					<strong>María Ruth Urquieta</strong>
				</p><!--Fin de p -->

				<a href="contacto.php">Ir a página Contáctanos</a>
				<hr class="hidden-md hidden-lg">
			</div><!-- col-md-3 col-sm-6 Fin -->
			<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Inicio -->
				<h4>Noticias
				</h4>
				<p class="text-muted">
					Ingresa tu email para informarte acerca de las novedades que tenemos para ti
				</p>
				<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=rutsitastore', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><!-- form Inicio -->
					<div class="input-group"><!-- input-group Inicio -->
						<input type="text" class="form-control" name="email">
						<input type="hidden" value="rutsita" name="uri"/>
						<input type="hidden" name="loc" value="en_US"/>
						<span class="input-group-btn"><!-- input-group-btn Inicio -->
							<input type="submit" value="suscribirse" class="btn btn-default">
						</span><!-- input-group-btn Fin -->
					</div><!-- input-group Fin -->
				</form><!-- form Fin -->
				<hr>
				<h4> Estamos en contactoo </h4>
				<p class="social"><!-- social Inicio --->
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-google-plus"></i></a>
					<a href="#"><i class="fa fa-envelope"></i></a>
				</p><!-- social Fin --->
			</div><!-- col-md-3 col-sm-6 Fin -->
		</div><!-- row Fin -->
	</div><!-- container Fin -->
</div><!-- footer Fin -->
<div id="copyright"><!-- copyright Inicio -->
	<div class="container" ><!-- container Inicio -->
		<div class="col-md-6" ><!-- col-md-6 Inicio -->
			<p class="pull-left"> &copy; 2018 Camilo González </p>
		</div><!-- col-md-6 Fin -->
		<div class="col-md-6" ><!-- col-md-6 Inicio -->
			<p class="pull-right" >
				Desarrollado por <a href="http://www.camru-store.cl" >Camilo González</a>
			</p>
		</div><!-- col-md-6 Fin -->
	</div><!-- container Fin -->
</div><!-- copyright Fin -->



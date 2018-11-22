<?php
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php','_self')</script>";
} else {
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Inicio -->
		<div class="navbar-header" ><!-- navbar-header Inicio -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Inicio -->
				<span class="sr-only" >Toggle Navegacion</span>
				<span class="icon-bar" ></span>
				<span class="icon-bar" ></span>
				<span class="icon-bar" ></span>
			</button><!-- navbar-ex1-collapse Fin -->
			<a class="navbar-brand" href="index.php?Panel de Control" >Panel de Control</a>
		</div><!-- navbar-header Fin -->
		<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Inicio -->
			<li class="dropdown" ><!-- dropdown Inicio -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Inicio -->
					<i class="fa fa-user" ></i>
					<?php echo $admin_name;?> <b class="caret" ></b>
				</a><!-- dropdown-toggle Fin -->
				<ul class="dropdown-menu" ><!-- dropdown-menu Inicio -->
					<li><!-- li Inicio -->
						<a href="index.php?perfil_usuario=<?php echo $admin_id;?>" >
							<i class="fa fa-fw fa-user" ></i> Perfil
						</a>
					</li><!-- li Fin -->
					<li><!-- li Inicio -->
						<a href="index.php?ver_productos" >
							<i class="fa fa-fw fa-envelope" ></i> Productos
							<span class="badge" ><?php echo $contar_productos;?></span>
						</a>
					</li><!-- li Fin -->
					<li><!-- li Inicio -->
						<a href="index.php?ver_clientes" >
							<i class="fa fa-fw fa-gear" ></i> Clientes
							<span class="badge" ><?php echo $contar_clientes;?></span>
						</a>
					</li><!-- li Fin -->
					<li><!-- li Inicio -->
						<a href="index.php?ver_p_cats" >
							<i class="fa fa-fw fa-gear" ></i> Categoria de Productos
							<span class="badge" ><?php echo $contar_p_categorias;?></span>
						</a>
					</li><!-- li Fin -->
					<li class="divider"></li>
					<li><!-- li Inicio -->
						<a href="logout.php">
							<i class="fa fa-fw fa-power-off"> </i> Cerrar Sesión
						</a>
					</li><!-- li Fin -->
				</ul><!-- dropdown-menu Fin -->
			</li><!-- dropdown Fin -->
		</ul><!-- nav navbar-right top-nav Fin -->
		<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Inicio -->
			<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Inicio -->
				<li><!-- li Inicio -->
					<a href="index.php?panel_control">
						<i class="fa fa-fw fa-Panel de Control"></i> Panel admin
					</a>
				</li><!-- li Fin -->
				<li><!-- Productos li Inicio -->
					<a href="#" data-toggle="collapse" data-target="#Productos">
						<i class="fa fa-fw fa-table"></i> Productos
						<i class="fa fa-fw fa-caret-down"></i>
					</a>
					<ul id="Productos" class="collapse">
						<li>
							<a href="index.php?insertar_producto"> Insertar Productos </a>
						</li>
						<li>
							<a href="index.php?ver_productos"> Ver Productos </a>
						</li>
					</ul>
				</li><!-- Productos li Fin -->
				<li><!-- marca li Inicio -->
					<a href="#" data-toggle="collapse" data-target="#marcas"><!-- anchor Inicio -->
						<i class="fa fa-fw fa-briefcase"></i> Marcas
						<i class="fa fa-fw fa-caret-down"></i>
					</a><!-- anchor Fin -->
					<ul id="marcas" class="collapse"><!-- ul collapse Inicio -->
						<li>
							<a href="index.php?insertar_marca"> Insertar Marca </a>
						</li>
						<li>
							<a href="index.php?ver_marcas"> Ver Marcas </a>
						</li>
					</ul><!-- ul collapse Fin -->
				</li><!-- marca li Fin -->
				<li><!-- li Inicio -->
					<a href="#" data-toggle="collapse" data-target="#p_cat">
						<i class="fa fa-fw fa-pencil"></i> Categoría de Productos
						<i class="fa fa-fw fa-caret-down"></i>
					</a>
					<ul id="p_cat" class="collapse">
						<li>
							<a href="index.php?insertar_p_cat"> Insertar Categoría de Productos </a>
						</li>
						<li>
							<a href="index.php?ver_p_cats"> Ver Categoría de Productos </a>
						</li>
					</ul>
				</li><!-- li Fin -->
				<li><!-- li Inicio -->
					<a href="#" data-toggle="collapse" data-target="#cat">
						<i class="fa fa-fw fa-arrows-v"></i> Categorias Generales
						<i class="fa fa-fw fa-caret-down"></i>
					</a>
					<ul id="cat" class="collapse">
						<li>
							<a href="index.php?insertar_cat"> Insertar Categoria General</a>
						</li>
						<li>
							<a href="index.php?ver_cats"> Ver Categorias Generales </a>
						</li>
					</ul>
				</li><!-- li Fin -->
				<li><!-- boxes section li Inicio -->
					<a href="#" data-toggle="collapse" data-target="#boxes"><!-- anchor Inicio -->
						<i class="fa fa-fw fa-arrows"></i> Misión estratégica
						<i class="fa fa-fw fa-caret-down"></i>
					</a><!-- anchor Fin -->
					<ul id="boxes" class="collapse">
						<li>
							<a href="index.php?insertar_mision"> Insertar Mision </a>
						</li>
					
						<li>
							<a href="index.php?ver_misiones"> Ver Caja mision </a>
						</li>
					</ul>
				</li><!--boxes section li Fin -->
				<li><!-- Contáctanos li Inicio -->
					<a href="#" data-toggle="collapse" data-target="#contacto_us"><!-- anchor Inicio -->
						<i class="fa fa-fw fa-pencil"> </i> Contáctanos 
						<i class="fa fa-fw fa-caret-down"></i>
					</a><!-- anchor Fin -->
					<ul id="contacto_us" class="collapse">
						<li>
							<a href="index.php?editar_contacto"> Editar Contáctanos </a>
						</li>
						<li>
							<a href="index.php?insertar_duda"> Insertar Tipo de Duda </a>
						</li>
						<li>
							<a href="index.php?ver_dudas"> Ver Tipo de Dudas </a>
						</li>
					</ul>
				</li><!-- Contáctanos li Fin -->
				<li><!-- slide li Inicio -->
					<a href="#" data-toggle="collapse" data-target="#slides">
						<i class="fa fa-fw fa-gear"></i> Slides
						<i class="fa fa-fw fa-caret-down"></i>
					</a>
					<ul id="slides" class="collapse">
						<li>
							<a href="index.php?insertar_slide"> Insertar Slide </a>
						</li>
						<li>
							<a href="index.php?ver_slides"> Ver Slides </a>
						</li>
					</ul>
				</li><!-- slide li Fin -->
				<li><!-- terms li Inicio -->
					<a href="#" data-toggle="collapse" data-target="#terms" ><!-- anchor Inicio -->
						<i class="fa fa-fw fa-table"></i> Terminos y Condiciones
						<i class="fa fa-fw fa-caret-down"></i>
					</a><!-- anchor Fin -->
					<ul id="terms" class="collapse"><!-- ul collapse Inicio -->
						<li>
							<a href="index.php?insertar_termino"> Insertar Termino </a>
						</li>

						<li>
							<a href="index.php?ver_terminos"> Ver Termino </a>
						</li>
					</ul><!-- ul collapse Fin -->
				</li><!-- terms li Fin -->
				<li>
					<a href="#" data-toggle="collapse" data-target=#clients>
						<i class="fa fa-fw fa-table"></i> Clientes
						<i class="fa fa-fw fa-caret-down"></i>
					</a>
					<ul id="clients" class="collapse"><!-- ul collapse Inicio -->
						<li>
							<a href="index.php?ver_clientes">Ver Clientes</a>
						</li>
						<li>
							<a href="index.php?ver_regiones"> Ver Regiones de Clientes </a>
						</li>
						<li>
							<a href="index.php?insertar_region"> Insertar Region </a>
						</li>
					</ul>		
				</li>
				<li>
					<a href="index.php?ver_pedidos">
						<i class="fa fa-fw fa-list"></i> Ver Pedidos
					</a>
				</li>
				<li><!-- li Inicio -->
					<a href="#" data-toggle="collapse" data-target="#users">
						<i class="fa fa-fw fa-gear"></i> Administradores
						<i class="fa fa-fw fa-caret-down"></i>
					</a>
					<ul id="users" class="collapse">
						<li>
							<a href="index.php?insertar_usuario"> Insertar Usuario Admin </a>
						</li>
						<li>
							<a href="index.php?ver_usuarios"> Ver Usuarios Admin </a>
						</li>
						<li>
							<a href="index.php?perfil_usuario=<?php echo $admin_id;?>"> Editar Perfil </a>
						</li>
					</ul>
				</li><!-- li Fin -->
				<li><!-- li Inicio -->
					<a href="logout.php">
						<i class="fa fa-fw fa-power-off"></i> Cerrar Sesión
					</a>
				</li><!-- li Fin -->
			</ul><!-- nav navbar-nav side-nav Fin -->
		</div><!-- collapse navbar-collapse navbar-ex1-collapse Fin -->
	</nav><!-- navbar navbar-inverse navbar-fixed-top Fin -->
	<?php }?>
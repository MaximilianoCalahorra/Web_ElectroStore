<!DOCTYPE html>
<html lang="es">
    <head>
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_tienda.css">   
    </head>
	<body class="body"> 	
		<!-- Barra de navegación de la página web -->
		<nav class="nav-pagina-web">
			<ul class="nav-pagina-web__ul">
				<!-- Ícono con el que se accede a la barra de navegación -->
				<div class="nav-pagina-web__button-container">
					<div class="nav-pagina-web__button"><i class="fa-solid fa-list"></i></div>
				</div>
				<!-- Opciones de la barra de navegación -->
				<div class="nav-pagina-web__li-container">
					<li class="nav-pagina-web__li"><i class="fa-solid fa-mobile"></i><a href="#celulares">Celulares</a></li>
					<li class="nav-pagina-web__li"><i class="fa-solid fa-laptop"></i></i><a href="#computadoras">Computadoras</a></li>
					<li class="nav-pagina-web__li"><i class="fa-solid fa-tablet"></i><a href="#tablets">Tablets</a></li>
				</div>
			</ul>
		</nav>
		<!-- Contenido principal (Galería de productos) -->
        <main class="main">
			<section class="main__section-form">
				<form action="<?= base_url();?>AdministrarProducto/cargarVistaAgregarProducto" method="POST">
					<input class="boton-agregar" type="submit" value="Agregar producto">
				</form>
			</section>
			<!-- Celulares -->
			<section class="main__section" id="celulares">
				<h4 class="section__h4 titulos">Celulares</h4>
				<?php
					foreach ($catalogo->result() as $producto)
					{
						if ($producto->tipo_producto == 1)
						{
							?>
							<article class="article__producto">
								<img class="producto__imagen" src="<?= base_url();?>assets/imagenes/productos/<?=$producto->nombre_imagen?>" alt='Foto <?= $producto->modelo?>' title='<?= $producto->modelo?>'>
								<h5 class="producto__marca"><?= $producto->marca?></h5>
								<h6 class="producto__modelo"><?= $producto->modelo?></h6>
								<b class="producto__precio">$<?= $producto->precio?></b>
								<h6 class="producto__stock">Stock disponible: <?= $producto->stock?></h6>
								<h6 class="producto__titulo-descripcion">Especificaciones técnicas</h6>
								<p class="producto__descripcion"><?= $producto->descripcion?></p>
								<form name="cambio_producto" method="POST" action="<?= base_url();?>AdministrarProducto/cambiosAlProducto/<?= $producto->id_producto?>">
									<label><input type="radio" name="cambiar_producto" value="modificar" required> Modificar</label>
									<label><input type="radio" name="cambiar_producto" value="eliminar" required> Eliminar</label>
									<input type="submit" class="boton" value="Elegir">
								</form>
							</article>
					 		<?php
					    }
					}
					?>
			</section>
			<!-- Computadoras -->
			<section class="main__section" id="computadoras">
				<h4 class="section__h4 titulos">Computadoras</h4>
				<?php
					foreach ($catalogo->result() as $producto)
					{
						if ($producto->tipo_producto == 2)
						{
							?>
							<article class="article__producto">
								<img class="producto__imagen" src="<?= base_url();?>assets/imagenes/productos/<?=$producto->nombre_imagen?>" alt='Foto <?= $producto->modelo?>' title='<?= $producto->modelo?>'>
								<h5 class="producto__marca"><?= $producto->marca?></h5>
								<h6 class="producto__modelo"><?= $producto->modelo?></h6>
								<b class="producto__precio">$<?= $producto->precio?></b>
								<h6 class="producto__stock">Stock disponible: <?= $producto->stock?></h6>
								<h6 class="producto__titulo-descripcion">Especificaciones técnicas</h6>
								<p class="producto__descripcion"><?= $producto->descripcion?></p>
								<form name="cambio_producto" method="POST" action="<?= base_url();?>AdministrarProducto/cambiosAlProducto/<?= $producto->id_producto?>">
									<label><input type="radio" name="cambiar_producto" value="modificar" required> Modificar</label>
									<label><input type="radio" name="cambiar_producto" value="eliminar" required> Eliminar</label>
									<input type="submit" class="boton" value="Elegir">
								</form>
							</article>
					 <?php
					    }
					}
					?>
			</section>
			<!-- Tablets -->
			<section class="main__section" id="tablets">
				<h4 class="section__h4 titulos">Tablets</h4>
					<?php
					foreach ($catalogo->result() as $producto)
					{
						if ($producto->tipo_producto == 3)
						{
							?>
							<article class="article__producto">
								<img class="producto__imagen" src="<?= base_url();?>assets/imagenes/productos/<?=$producto->nombre_imagen?>" alt='Foto <?= $producto->modelo?>' title='<?= $producto->modelo?>'>
								<h5 class="producto__marca"><?= $producto->marca?></h5>
								<h6 class="producto__modelo"><?= $producto->modelo?></h6>
								<b class="producto__precio">$<?= $producto->precio?></b>
								<h6 class="producto__stock">Stock disponible: <?= $producto->stock?></h6>
								<h6 class="producto__titulo-descripcion">Especificaciones técnicas</h6>
								<p class="producto__descripcion"><?= $producto->descripcion?></p>
								<form name="cambio_producto" method="POST" action="<?= base_url();?>AdministrarProducto/cambiosAlProducto/<?= $producto->id_producto?>">
									<label><input type="radio" name="cambiar_producto" value="modificar" required> Modificar</label>
									<label><input type="radio" name="cambiar_producto" value="eliminar" required> Eliminar</label>
									<input class="boton" type="submit" value="Elegir">
								</form>
							</article>
					 <?php
					    }
					}
					?>
			</section>
		</main>
	</body>
</html>

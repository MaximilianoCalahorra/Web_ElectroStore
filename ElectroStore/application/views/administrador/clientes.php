<!DOCTYPE html>
<html lang="es">
    <head>
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_clientes.css">   
    </head>
	<body class="body"> 	
		<!-- Contenido principal (Clientes) -->
        <main class="main">
			<section class="main__section-form">
				<form action="<?= base_url();?>AdministrarCliente/cargarVistaAgregarCliente/Administrador" method="POST">
					<input class="boton-agregar" type="submit" value="Agregar cliente">
				</form>
			</section>
			<section class="main__section">
				<h4 class="section__h4 titulos">Clientes</h4>
				<?php
				foreach ($listado->result() as $cliente)
				{
				?>
					<article class="article__cliente">
						<p class="cliente__usuario">Usuario: <?= $cliente->usuario ?></p>
						<p class="cliente__contraseña">Contraseña: <?= $cliente->contraseña ?></p>
						<p class="cliente__nombre">Nombre: <?= $cliente->nombre ?></p>
						<p class="cliente__apellido">Apellido: <?= $cliente->apellido ?></p>
						<p class="cliente__mail">Mail: <?= $cliente->mail ?></p>
						<form class="cliente__form" name="cambio_cliente" method="POST" action="<?= base_url();?>AdministrarCliente/cambiosAlCliente/<?= $cliente->id_cliente?>">
							<label><input type="radio" name="cambiar_cliente" value="modificar"> Modificar</label>
							<label><input type="radio" name="cambiar_cliente" value="eliminar"> Eliminar</label>
							<input class="boton" type="submit" value="Elegir">
						</form>
					</article>
				<?php
				}
				?>
			</section>
		</main>
	</body>
</html>
<!DOCTYPE html>
<html lang="es">
    <head>
		<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_sucursales.css">     
    </head>
	<body class="body"> 
		<!-- Contenido principal (Sucursales) -->
        <main class="main">
			<section class="main__section">
				<h4 class="section__h4 titulos">Sucursales</h4>
				<?php
				foreach ($listado->result() as $sucursal)
				{
				?>
					<article class="article__sucursal">
					<img class="sucursal__imagen" src="<?= base_url();?>assets/imagenes/sucursales/<?=$sucursal->nombre_imagen?>" alt="Foto <?= $sucursal->id_sucursal?>" title="Sucursal <?= $sucursal->id_sucursal?>">
					<p class="sucursal__data">Dirección: <?= $sucursal-> direccion?><br>
					Días y horario de atención: <?= $sucursal->dia_horario_atencion?></p>
				</article>
				<?php
				}
				?>
			</section>
		</main>
	</body>
</html>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= base_url();?>assets/imagenes/ElectroStore.ico"> <!-- Ícono de la pestaña en el navegador -->
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_operaciones.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_generales.css">
        <title>ElectroStore | Cliente</title>
    </head>
    <body class="body">
        <!-- Encabezado -->
		<header class="header">
			<h1 class="header__h1">ElectroStore</h1>
		</header>
        <main class="main">
            <h2 class="main__h2 titulos">Pago realizado con éxito. ¡Disfrute de su nuevo producto!</h2>
            <div class="main__div">
                <form class="main__form" action="<?=base_url();?>AdministrarCliente/cargarVistaSiguienteAlMensajeCompra" method="POST">
                    <label><input class="input" type="radio" name="siguiente_vista" value="preguntas_frecuentes" required> Preguntas frecuentes</label>
                    <label><input class="input" type="radio" name="siguiente_vista" value="inicio"> Volver al inicio</label>
                    <input class="boton" type="submit" value="Continuar">
                </form>
            </div>
        </main>
    </body>
</html>
        
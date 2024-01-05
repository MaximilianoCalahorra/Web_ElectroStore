<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="celulares, computadoras, tablets, ElectroStore, tienda">
		<meta name="author" content="Maximiliano Calahorra">
		<meta name="copyright" content="ElectroStore">
		<link rel="icon" href="<?= base_url();?>assets/imagenes/ElectroStore.ico"> <!-- Ícono de la pestaña en el navegador -->
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_operaciones.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_generales.css">
        <title>ElectroStore | Logueo</title>
    </head>
    <body class="body">
        <!-- Encabezado -->
		<header class="header">
			<h1 class="header__h1">ElectroStore</h1>
		</header>
        <!-- Contenido principal de la vista -->
        <main class="main">
            <h2 class="main__h2 titulos">¡Bienvenido/a al sitio web de ElectroStore!</h2>
            <h3 class="main__h3 titulos">Ingresar como</h3>
            <div class="main__div">
                <form class="main__form" action="<?= base_url();?>Iniciar/cargarLogueo" method="POST">
                    <label><input class="input" type="radio" name="logueo" value="administrador" required>Administrador</label>
                    <label><input class="input" type="radio" name="logueo" value="cliente">Cliente</label>
                    <label><input class="input" type="radio" name="logueo" value="visitante">Visitante</label>
                    <input class="boton" type="submit" value="Ingresar">
                </form>
            </div>
        </main>
    </body>
</html>
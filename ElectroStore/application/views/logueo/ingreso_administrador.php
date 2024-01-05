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
        <title>ElectroStore | Logueo Administrador</title>
    </head>
    <body class="body">
        <!-- Encabezado -->
		<header class="header">
			<h1 class="header__h1">ElectroStore</h1>
		</header>
        <!-- Logueo para los administradores -->
        <main class="main">
            <h2 class="main__h2 titulos">Logueo para administradores</h2>
            <div class="main__div">
                <form class="main__form" action="<?= base_url(); ?>Iniciar/validarAdministrador" method="POST">                   
                    <input class="input" type="text" name="usuario" placeholder="Ingrese su usuario" required>
                    <input class="input" type="password" name="contraseña" placeholder="Ingrese su contraseña" required>
                    <input class="boton" type="submit" value="Ingresar">
                </form>
            </div>
            <h4 class="main__h4 titulos"><?php echo($mensaje_al_administrador);?></h4>
        </main>
    </body>
</html>
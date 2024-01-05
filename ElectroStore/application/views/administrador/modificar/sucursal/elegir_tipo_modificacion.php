<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= base_url();?>assets/imagenes/ElectroStore.ico"> <!-- Ícono de la pestaña en el navegador -->
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_operaciones.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_generales.css">
        <script src="https://kit.fontawesome.com/322decf065.js" crossorigin="anonymous"></script> <!--Agregamos el kit de íconos-->
        <title>ElectroStore | Administrador</title>
    </head>
    <body class="body">
        <header class="header">
			<h1 class="header__h1">ElectroStore</h1>
		</header>
        <main class="main">
            <h2 class="main__h2 titulos">Elija qué modificar de la sucursal con ID #<?=$id_sucursal?></h2>
            <div class="main__div">
                <form class="main__form" action="<?=base_url();?>AdministrarSucursal/modificacionALaSucursal/<?=$id_sucursal?>" method="POST">
                    <label><input class="input" type="radio" name="modificacion_sucursal" value="direccion" required>Nueva dirección</label>
                    <label><input class="input" type="radio" name="modificacion_sucursal" value="dia_horario_atencion">Día y horario de atención</label>
                    <label><input class="input" type="radio" name="modificacion_sucursal" value="imagen">Imagen</label>
                    <label><input class="input" type="radio" name="modificacion_sucursal" value="todo">Todo</label>
                    <input class="boton" type="submit" value="Modificar">
                </form>
            </div>
        </main>
    </body>
</html>
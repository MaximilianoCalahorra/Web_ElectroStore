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
            <h2 class="main__h2 titulos">Modificando todo de la sucursal con ID #<?= $id ?>...</h2>
            <div class="main__div">
                <form class="main__form" method="POST" enctype="multipart/form-data" action="<?= base_url(); ?>AdministrarSucursal/modificarSucursal/<?= $id ?>">
                    <div class="form__div">      
                        <label>Dirección:<input class="input" type="text" name="nueva_direccion" value="<?=$sucursal->direccion?>" autocomplete="off" required></label>
                    </div>
                    <div class="form__div">  
                        <label>Día y horario de atención:<input class="input" type="text" name="nuevo_dia_horario_atencion" value="<?=$sucursal->dia_horario_atencion?>" autocomplete="off" required></label>
                    </div>
                    <div class="form__div">  
                        <label>Imagen:<input class="input" type="file" name="imagen" accept="image/*" required></label>
                    </div>
                    <input class="boton" type="submit" value="Modificar">
                </form>
            </div>       
        </main>
    </body>
</html>
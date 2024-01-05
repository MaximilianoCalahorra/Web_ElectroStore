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
            <h2 class="main__h2 titulos">Registro de nuevo producto</h2>
            <div class="main__div">
                <form class="main__form" action="<?= base_url();?>AdministrarProducto/agregarProducto" method="POST" enctype="multipart/form-data">
                    <select class="input" name="tipo_producto" required>
                        <option value=1>Celular</option>
                        <option value=2>Computadora</option>
                        <option value=3>Tablet</option>
                    </select>
                    <input class="input" type="text" name="marca" placeholder="Marca" autocomplete="off" required>
                    <input class="input" type="text" name="modelo" placeholder="Modelo" autocomplete="off" required>
                    <input class="input" type="number" name="precio" placeholder="Precio ($)" min=1 autocomplete="off" required>
                    <input class="input" type="number" name="stock" placeholder="Stock disponible" min=0 autocomplete="off" required>            
                    <input class="input" type="text" name="descripcion" placeholder="Descripción" autocomplete="off" required>
                    <label>Imagen:<input class="input" type="file" name="imagen" accept="image/*" required></label>
                    <input class="boton" type="submit" value="Registrar">
                </form>
            </div>
            <p class="main__p"><?php echo($resultado);?></p>
        </main>
    </body>
</html>
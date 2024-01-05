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
            <h2 class="main__h2 titulos">Modificando todo del producto con ID #<?= $id ?>...</h2>
            <div class="main__div">
                <form class="main__form" method="POST" enctype="multipart/form-data" action="<?= base_url(); ?>AdministrarProducto/modificarProducto/<?= $id ?>">
                    <div class="form__div">      
                        <label>Marca:<input class="input" type="text" name="nueva_marca" value="<?=$producto->marca?>" autocomplete="off" required></label>
                    </div>
                    <div class="form__div">  
                        <label>Modelo:<input class="input" type="text" name="nuevo_modelo" value="<?=$producto->modelo?>" autocomplete="off" required></label>
                    </div>
                    <div class="form__div">  
                        <label>Precio ($):<input class="input" type="number" name="nuevo_precio" value="<?=$producto->precio?>" min=1 autocomplete="off" required></label>
                    </div>
                    <div class="form__div">  
                        <label>Stock disponible:<input class="input" type="number" name="nuevo_stock" value="<?=$producto->stock?>" min=0 autocomplete="off" required></label>
                    </div>
                    <div class="form__div">  
                        <label>Descripción:<input class="input" type="text" name="nueva_descripcion" value="<?=$producto->descripcion?>" autocomplete="off" required></label>
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
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
            <h2 class="main__h2 titulos"><?= $titulo ?> con ID # <?= $id?>...</h2>
            <div class="main__div">
                <form class="main__form" method="POST" enctype="multipart/form-data" action="<?= base_url(); ?><?=$controlador?>/<?=$metodo?>/<?=$id?>">
                    <?=$select?>
                    <?=$input?>
                    <input type="submit" class="boton" value="Modificar">
                </form>   
            </div>     
        </main>
        <h4 class="main__h4 titulos"><?php echo($resultado);?></h4>
    </body>
</html>
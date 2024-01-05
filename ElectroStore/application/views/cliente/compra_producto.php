<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= base_url();?>assets/imagenes/ElectroStore.ico"> <!-- Ícono de la pestaña en el navegador -->
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_operaciones.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_generales.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_compra_producto.css">
        <title>ElectroStore | Cliente</title>
    </head>
    <body class="body">
		<header class="header">
			<h1 class="header__h1">ElectroStore</h1>
		</header>
        <main class="main">
            <section class="main__section">
                <h2 class="main__h2 titulos">Producto elegido</h2>
                <article class="article__producto">
                    <img class="producto__imagen" src="<?= base_url();?>assets/imagenes/productos/<?= $producto->nombre_imagen?>" alt='Foto <?= $producto->modelo?>' title='<?= $producto->modelo?>'>
                    <?php
                        $producto_tipo = "";
                        if ($producto->tipo_producto == 1)
                        {
                            $producto_tipo = "Celular";
                        }
                        else if ($producto->tipo_producto == 2)
                        {
                            $producto_tipo = "Computadora";
                        }
                        else if ($producto->tipo_producto == 3)
                        {
                            $producto_tipo = "Tablet";
                        }
                    ?>
                    <h4 class="producto__tipo"><?= $producto_tipo?></h4>
                    <h5 class="producto__marca"><?= $producto->marca?></h5>
                    <h6 class="producto__modelo"><?= $producto->modelo?></h6>
                    <b class="producto__precio">$<?= $producto->precio?></b>
                    <h6 class="producto__titulo-descripcion">Especificaciones técnicas</h6>
                    <p class="producto__descripcion"><?= $producto->descripcion?></p>
                </article>
            </section>
            <section class="main_section">
                <h4 class="section__h4 titulos">Complete los siguientes datos para realizar el pago</h4>
                <div class="main__div">
                    <form class="main__form" action="<?=base_url();?>AdministrarCliente/cargarVistaMensajeFinalizacionCompra" method="POST">
                        <div class="form__div">    
                            <label class="label">Precio ($):<input class="input" type="number" name="importe" value="<?=$producto->precio?>" readonly></label>
                        </div>
                        <div class="form__div">
                            <label class="label">Número de tarjeta de débito:<input class="input" type="number" name="numero_tarjeta" placeholder="Número de tarjeta de débito" min=1 autocomplete="off" required></label>
                        </div>
                        <div class="form__div">
                            <label class="label">Titular de la tarjeta:<input class="input" type="text" name="nombre_apellido_dueño_tarjeta" placeholder="Nombre y apellido" autocomplete="off" required></label>
                        </div>
                        <div class="form__div">
                            <label class="label">Fecha de vencimiento:<input class="input" type="date" name="fecha_vencimiento_tarjeta" autocomplete="off" required></label>
                        </div>
                        <div class="form__div">
                            <label class="label">Codigo de seguridad<input class="input" type="number" name="codigo_seguridad_tarjeta" placeholder="Código de seguridad" min=1 autocomplete="off" required></label>
                        </div>
                        <input type="number" name="id_producto" value="<?=$producto->id_producto?>" hidden>
                        <input type="number" name="stock_actual" value="<?=$producto->stock?>" hidden>
                        <input class="boton" type="submit" value="Pagar">
                    </form>
                </div>
            </section>
        </main>
    </body>
</html>
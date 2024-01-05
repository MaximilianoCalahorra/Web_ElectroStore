<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= base_url();?>assets/imagenes/ElectroStore.ico"> <!-- Ícono de la pestaña en el navegador -->
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/estilos_generales.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/normalize.css">
        <script src="https://kit.fontawesome.com/322decf065.js" crossorigin="anonymous"></script> <!--Agregamos el kit de íconos-->
        <title>ElectroStore | Cliente</title>
    </head>
    <body class="body">
        <!-- Encabezado -->
		<header class="header">
			<h1 class="header__h1"><a href="<?= base_url();?>Iniciar/cargarInicioCliente">ElectroStore</a></h1>
		</header>
        <!-- Barra de navegación -->
        <nav class="nav-sitio-web">
            <ul class="nav-sitio-web__ul">
                <!-- Ícono con el que se accede a la barra de navegación en pantallas de menos ancho -->
                <div class="nav-sitio-web__button-container">
					<div class="nav-sitio-web__button"><i class="fa-solid fa-bars"></i></div>
				</div>
                <!-- Opciones de la barra de navegación -->
                <div class="nav-sitio-web__li-container">
                    <li class="nav-sitio-web__li"><i class="fa-solid fa-house-chimney"></i><a href="<?= base_url();?>Iniciar/cargarInicioCliente">Inicio</a></li>
                    <li class="nav-sitio-web__li"><i class="fa-solid fa-cart-shopping"></i><a href="<?= base_url();?>AdministrarProducto/cargarTiendaCliente/cliente">Tienda</a></li>
                    <li class="nav-sitio-web__li"><i class="fa-solid fa-shop"></i><a href="<?= base_url();?>AdministrarSucursal/cargarSucursalesCliente/cliente">Sucursales</a></li>
                    <li class="nav-sitio-web__li"><i class="fa-solid fa-circle-question"></i><a href="<?= base_url();?>Iniciar/cargarAyudaCliente/cliente">Ayuda</a></li>
                    <li class="nav-sitio-web__li"><i class="fa-solid fa-door-open"></i><a href="<?= base_url();?>Iniciar">Salir</a></li>
                </div>
            </ul>
        </nav>
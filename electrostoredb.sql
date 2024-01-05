-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 30-10-2023 a las 18:04:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electrostoredb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `contraseña` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `mail` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `usuario`, `contraseña`, `nombre`, `apellido`, `mail`) VALUES
(1, 45191340, 45191340, 'Maximiliano', 'Calahorra', 'maximilianocalahorra@ElectroStore.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `contraseña` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `mail` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `usuario`, `contraseña`, `nombre`, `apellido`, `mail`) VALUES
(1, 27910341, 27910341, 'Carlos', 'Gutiérrez', 'carlosgutierrez@gmail.com'),
(2, 37600112, 37600112, 'Estefanía', 'López', 'estafanialopez@gmail.com'),
(3, 30991658, 30991658, 'Pablo', 'Martínez', 'pablomartinez@gmail.com'),
(4, 40142267, 40142267, 'Luciana', 'Sánchez', 'lucianasanchez@gmail.com'),
(5, 42801332, 42801332, 'Esteban', 'Cáceres', 'estebancaceres@gmail.com'),
(6, 31880021, 31880021, 'Nahuel', 'Sosa', 'nahuelsosa@gmail.com'),
(7, 27128743, 27128743, 'Marcela', 'Pérez', 'marcelaperez@gmail.com'),
(8, 17097723, 17097723, 'Marcelo', 'Fernández', 'marcelofernandez@gmail.com'),
(9, 43817221, 43817221, 'Nicolás', 'Álvarez', 'nicolasalvarez@gmail.com'),
(10, 25133771, 25133771, 'Gonzalo', 'González', 'gonzalogonzalez@gmail.com'),
(11, 12690114, 12690114, 'Samuel', 'Estévez', 'samuelestevez@gmail.com'),
(12, 43890097, 43890097, 'Micaela', 'Rodríguez', 'micaelarodriguez@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `tipo_producto` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(80) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `nombre_imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `tipo_producto`, `marca`, `modelo`, `precio`, `stock`, `descripcion`, `nombre_imagen`) VALUES
(1, 1, 'Apple', 'iPhone 13 128GB Midnight', 522999, 10, 'Cámara principal: 12Mpx, Cámara frontal: 12Mpx, Memoria interna (ROM): 128GB, Memoria RAM: 4GB, Red: 5G, Sistema operativo: iOS 15, Procesador: Apple A15 Bionic.', '1.jpg'),
(2, 1, 'Apple', 'iPhone 13 Pro 256GB Gold', 724999, 10, 'Cámara principal: 12Mpx, Cámara frontal: 12Mpx, Memoria interna (ROM): 256GB, Memoria RAM: 4GB, Red: 5G, Sistema operativo: iOS 15, Procesador: Apple A15 Bionic.', '2.jpg'),
(3, 1, 'Samsung', 'Samsung Galaxy A04 32GB Green', 44999, 30, 'Cámara principal: 50MP + 2MP, Cámara frontal: 5MP, Memoria interna (ROM): 32GB, Memoria RAM: 3GB, Red: 4G, Sistema operativo: Android 12, Procesador: Octa Core.', '3.jpg'),
(4, 1, 'Samsung', 'Samsung Galaxy A13 64GB Negro', 57999, 30, 'Cámara principal: 50MP + 5MP + 2MP + 2MP, Cámara frontal: 8MP, Memoria interna (ROM): 64GB, Memoria RAM: 4GB, Red: 4G, Sistema operativo: Android 12, Procesador: Octa Core.', '4.jpg'),
(5, 1, 'Samsung', 'Samsung Galaxy M13 4GB RAM 128GB Light Blue', 74999, 30, 'Cámara principal: 50MP + 5MP + 2MP, Cámara frontal: 8MP, Memoria interna (ROM): 128GB, Memoria RAM: 4GB, Red: 4G, Sistema operativo: Android 12, Procesador: Octa Core.', '5.jpg'),
(6, 1, 'Samsung', 'Samsung Galaxy M235 5G 4GB RAM 128GB Green', 104999, 30, 'Cámara principal: 50MP + 8MP + 2MP, Cámara frontal: 8MP, Memoria interna (ROM): 128GB, Memoria RAM: 4GB, Red: 5G, Sistema operativo: Android 12, Procesador: Octa Core.', '6.jpg'),
(7, 1, 'Samsug', 'Samsung Galaxy S21 FE 8GB 256GB Negro', 234999, 30, 'Cámara principal: 12MP + 12MP + 8MP, Cámara frontal: 32MP, Memoria interna (ROM): 256GB, Memoria RAM: 8GB, Red: 5G, Sistema operativo: Android 12, Procesador: Octa Core.', '7.jpg'),
(8, 1, 'Motorola', 'Motorola E22 32GB Azul', 39999, 25, 'Cámara principal: 16MP + 2MP, Cámara frontal: 5MP, Memoria interna (ROM): 32GB, Memoria RAM: 3GB, Red: 4G, Sistema operativo: Android 12, Procesador: Mediatek Helio G37.', '8.jpg'),
(9, 1, 'Motorola', 'Motorola E32 Xt2227-1 4GB RAM 64GB Gris', 54999, 25, 'Cámara principal: 16MP + 2MP + 2MP, Cámara frontal: 8MP, Memoria interna (ROM): 64GB, Memoria RAM: 4GB, Red: 4G, Sistema operativo: Android 11, Procesador: Octa Core.', '9.jpg'),
(10, 1, 'Motorola', 'Motorola G41 128GB Dorado', 57999, 25, 'Cámara principal: 48MP + 8MP + 2MP, Cámara frontal: 13MP, Memoria interna (ROM): 128GB, Memoria RAM: 4GB, Red: 4G+, Sistema operativo: Android 12, Procesador: Octa Core.', '10.jpg'),
(11, 1, 'Motorola', 'Motorola Edge 30 128GB Gris', 119999, 25, 'Cámara principal: 50MP + 50MP + 2MP, Cámara frontal: 32MP, Memoria interna (ROM): 128GB, Memoria RAM: 8GB, Red: 5G, Sistema operativo: Android 12, Procesador: Qualcomm Snapdragon 778G+.', '11.jpg'),
(12, 1, 'Motorola', 'Motorola Edge 30 Fusion 256GB Blanco', 189999, 25, 'Cámara principal: 50MP + 13MP + 2MP, Cámara frontal: 32MP, Memoria interna (ROM): 256GB, Memoria RAM: 12GB, Red: 5G, Sistema operativo: Android 12, Procesador: Octa core 2.84 GHz / Qualcomm Snapdragon 888+z.', '12.jpg'),
(13, 2, 'Apple', 'Apple MacBook Air A2337 13\" M1 Chip 8-core CPU 7-core GPU 256GB Silver', 499999, 10, 'Capacidad del SSD: 256GB, Tarjeta gráfica: Apple M1 7-Core GPU, Procesador: Apple M1 8 núcleos 3.1GHz, Sistema operativo: macOS 10.14, Memoria RAM: DDR3 8GB, Memoria de video: 4GB, Resolución de la pantalla: 2560px x 1600px.', '13.jpg'),
(14, 2, 'Apple', 'Apple MacBook Air A2337 13\" M1 Chip 8-core CPU 8-core GPU 512GB Silver', 529999, 10, 'Capacidad del SSD: 512GB, Tarjeta gráfica: Apple M1 8-Core GPU, Procesador: Apple M1 8 núcleos 3.1GHz, Sistema operativo: macOS 10.14, Memoria RAM: DDR3 8GB, Memoria de video: 4GB, Resolución de la pantalla: 2560px x 1600px.', '14.jpg'),
(15, 2, 'Apple', 'Apple MacBook Pro 14\" M1 Pro Chip 10-Core CPU 16-Core GPU 1TB SSD Space Grey', 1299999, 10, 'Capacidad del SSD: 1TB, Procesador: Apple M1 Max 10 núcleos, Sistema operativo: macOS, Memoria RAM: 16GB, Resolución de la pantalla: 3024 x 1964 a 254px.', '15.jpg'),
(16, 2, 'Apple', 'Apple MacBook Pro 16\" M1 Max Chip 10-Core CPU 32-Core GPU 1TB SDD Silver', 2099999, 10, 'Capacidad del SSD: 1TB, Procesador: Apple Chip M1 PRO 10 núcleos, Sistema operativo: macOS, Memoria RAM: 32GB, Resolución de la pantalla: 3456 x 2234 a 254px.', '16.jpg'),
(17, 2, 'HP', 'Notebook HP DS11 14\"', 109999, 15, 'SSD: 64GB emmC, Procesador: AMD A6-9220e 2.4GHz, Sistema operativo: Windows 10 Home 64, Memoria RAM: 4GB, Resolución de la pantalla: 1366 x 768, Placa de video: AMD Radeon™ R4 Graphics.', '17.jpg'),
(18, 2, 'HP', 'Notebook HP Stream Pro 11 G5', 149999, 15, 'SSD: 128GB, Procesador: Intel Celeron N4000 1.10GHz, Sistema operativo: Windows 10 Home en modo S, Memoria RAM: 4GB, Resolución de la pantalla: 1366 x 768, Placa de video: Intel UHD 600 Graphics.', '18.jpg'),
(19, 2, 'HP', 'Notebook HP Pavilion 13-bb0003la 13.3\"', 289999, 15, 'Disco rígido: 256GB, Procesador: Intel Core i5 1135G7 11.ª generación, Sistema operativo: Windows 10 Home 64, Memoria RAM: 8GB, Resolución de la pantalla: 1920 x 1080, Placa de video: Gráficos Intel Iris X.', '19.jpg'),
(20, 2, 'HP', 'Notebook HP EH70 15.6\"', 599999, 15, 'SSD: 1TB, Procesador: AMD Ryzen 7 8 núcleos 4.3GHz, Sistema operativo: Windows 10 Home, Memoria RAM: 32GB, Resolución de la pantalla: 1920px x 1080px, Placa de video: AMD Radeon Graphics.', '20.jpg'),
(21, 2, 'EXO', 'Notebook EXO Smart T33', 130999, 20, 'Sistema operativo: Windows 11 Home, Procesador: Intel Celeron N4020 2 núcleos de 1.10GHz - 2.80GHz, Placa de video: UHD Intel 600, Memoria RAM: 4GB DDR4, Almacenamiento: 64GB EMMC, Pantalla: 14\" 1366 x 768 HD.', '21.jpg'),
(22, 2, 'EXO', 'Notebook EXO Smart P37 Plus', 159999, 20, 'Sistema operativo: Windows 11 Home, Software incluido: Windows Defender, Procesador: Intel Celeron N4020 2 núcleos de 1.10GHz - 2.80GHz, Placa de video: UHD Intel Graphics, Memoria RAM: 4GB DDR4, Almacenamiento: 64GB y 1TB; SDD + HDD, Pantalla: 14\" 1920 x 1080 FullHD.', '22.jpg'),
(23, 2, 'EXO', 'Notebook EXO Smart XQ3K-S3882', 255999, 20, 'Sistema operativo: Windows 11 Home, Software incluido: Windows Defender, Procesador: Intel Core I3-8130U 2 Núcleos y 4 Hilos De 2.20 GHz Up To 3.40 GHz, Placa de video: Intel UHD Graphics 620, Memoria RAM: 8GB DDR4, Almacenamiento: 256GB SDD, Pantalla: 15.6\" 1920 x 1080 FullHD.', '23.jpg'),
(24, 2, 'EXO', 'Notebook EXO Smart XQ5E-S5315', 408999, 20, 'Sistema operativo: Windows 11 Home, Software incluido: Windows Defender, Procesador: Intel Core I5-1135G7 4 Núcleos y 8 Hilos De 2.40 GHz - (Up To 4.20 GHz), Placa de video: Intel Iris X, Memoria RAM: 16GB DDR4 2666Mhz, Almacenamiento: 480GB SDD, Pantalla: 15.6\" 1920 x 1080 FullHD.', '24.jpg'),
(25, 3, 'Apple', 'Tablet iPad 10.2\" Wi-Fi 64GB (9na Gen) - Silver', 154999, 10, 'Sistema operativo: iPadOS 15, Procesador: Chip A13 Bionic con arquitectura de 64 bits (Neural Engine), Almacenamiento: 64GB, Pantalla: 10.2\" 2160 x 1620.', '25.jpg'),
(26, 3, 'Apple', 'Tablet iPad Air 11\" Wi-Fi 256GB (4ta Generacion)', 354999, 10, 'Sistema operativo: iPadOS 14, Procesador: Chip A14 Bionic con arquitectura de 64 bits (Neural Engine), Memoria RAM: 4GB,Almacenamiento: 256GB, Pantalla: 11\" 2360 x 1640.', '26.jpg'),
(27, 3, 'Apple', 'Tablet iPad Pro 11\" Wi-Fi 512GB (2nda Generacion-2020) Silver', 369999, 10, 'Sistema operativo: iOS 13.4, Procesador: Apple A12Z Bionic Octa-Core 8 núcleos, Almacenamiento: 512GB, Pantalla: 2388 x 1668.', '27.jpg'),
(28, 3, '', 'Tablet Apple iPad Pro MXAY2LE/A 12.9\" 4ta Gen', 779999, 10, 'Sistema operativo: iOS 13.4, Procesador: Chip A12Z Bionic con arquitectura de 64 bits, Memoria RAM: 6GB, Almacenamiento: 1TB, Pantalla: 12.9\" 2732 x 2048.', '28.jpg'),
(29, 3, 'Samsug', 'Tablet Samsung Galaxy Tab A7 Dark Gris', 54999, 15, 'Sistema operativo: Android, Procesador: Octa-Core 2.3GHz, Memoria RAM: 3GB, Almacenamiento: 32GB, Pantalla: 8.7\" 1340 x 800.', '29.jpg'),
(30, 3, 'Samsung', 'Tablet Samsung Galaxy Tab A8 Gray', 89999, 15, 'Sistema operativo: Android, Procesador: UniSOC T618 (Dual 2.0GHz + Hexa 2.0GHz), Memoria RAM: 4GB, Almacenamiento: 64GB, Pantalla: 10.5\" 1920 x 1200.', '30.jpg'),
(31, 3, 'Samsung', 'Tablet Samsung Galaxy Tab S6 Lite Blue', 136999, 15, 'Sistema operativo: Android, Procesador: Octa-Core 2.3GHz, 1.8GHz, Memoria RAM: 4GB, Almacenamiento: 64GB, Pantalla: 10.4\" 2000 x 1200.', '31.jpg'),
(32, 3, 'Samsung', 'Tablet Samsung Galaxy Tab S7 FE Black', 209999, 15, 'Sistema operativo: Android, Procesador: Octa-Core 2.4GHz, 1.8GHz, Memoria RAM: 6GB, Almacenamiento: 128GB, Pantalla: 12.4\" 2560 x 1600.', '32.jpg'),
(33, 3, 'Samsung', 'Tablet Samsung Galaxy Tab S8 SM-X700 Silver', 229999, 15, 'Sistema operativo: Android, Procesador: Octa-Core 2.99GHz, 2.4GHz, 1.7GHz, Memoria RAM: 8GB, Almacenamiento: 128GB, Pantalla: 11\" 2560 x 1600.', '33.jpg'),
(34, 3, 'EXO', 'Tablet EXO Wave i726', 43999, 20, 'Sistema operativo: Android 12 (Go Edition), Procesador: Allwinner A133 Quad Core de 1.5GHz, Placa de video: GPU PowerVR GE8300, Memoria RAM: 2GB, Almacenamiento: 16GB, Pantalla: 7\" 1024 x 600.', '34.jpg'),
(35, 3, 'EXO', 'Tablet EXO WAVE I101 T1 4G LTE', 79999, 20, 'Sistema operativo: Android 11 GMS, Procesador: Tiger T310 Quad Core Up To 2.0 GHz, Placa de video: GPU PowerVR GE8300, Memoria RAM: 4GB, Almacenamiento: 64GB EMMC, Pantalla: 10.1\" 1280 x 800.', '35.jpg'),
(36, 3, 'EXO', 'Tablet EXO Rugged R9 - 4G | NFC | GPS | Waterproof | IP66', 196999, 20, 'Sistema operativo: Android 11 GMS, Procesador: MT6765 Octa Core Up To 2.3 GHz, Memoria RAM: 4GB, Almacenamiento: 64GB, Pantalla: 10.1\" 1280 x 800 HD, Batería: 10.000MAh. Resistente al polvo, al agua (durante 30\' a 1m de profundidad), caídas, compresión y presión atmosférica, con chip de navegación militar, intercomunicador en tiempo real y ubicación de máxima presición.', '36.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id_sucursal` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `dia_horario_atencion` varchar(30) NOT NULL,
  `nombre_imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id_sucursal`, `direccion`, `dia_horario_atencion`, `nombre_imagen`) VALUES
(1, 'Esteban Adrogué 1082 entre Bartolomé Mitre y Samuel Miguel Spiro.', 'Lunes a sábado de 9hs a 21hs.', '1.jpg'),
(2, 'Alto Avellaneda Shopping, Gral. Güemes 897, Avellaneda, Provincia de Buenos Aires, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '2.jpg'),
(3, 'Las Toscas Canning Shopping, Formosa 653, Canning, Provincia de Buenos Aires, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '3.jpg'),
(4, 'C. Libertad 837 entre 25 de Mayo y Del Carmen, Cañuelas, Provincia de Buenos Aires, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '4.jpg'),
(5, 'Miguel Cané 169 entre Alfonsina Storni y Belisario Roldán, Ezeiza, Provincia de Buenos Aires, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '5.jpg'),
(6, 'Av. 9 de Julio 1152 entre Anatole France y Gral. Bernardo O\'Higgins, Lanús, Provincia de Buenos Aires, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '6.jpg'),
(7, 'Laprida 262 entre España e Italia, Lomas de Zamora, Provincia de Buenos Aires, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '7.jpg'),
(8, 'Av. Rivadavia 2719 entre Av. Pueyrredón y Castelli, Balvanera, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '8.jpg'),
(9, 'Av. Cabildo 2166 entre Av. Juramento y Mendoza, Belgrano, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '9.jpg'),
(10, 'Caballito Shopping Center, Av. Rivadavia 5108, Caballito, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '10.jpg'),
(11, 'Av. Corrientes 6413 entre Santos Dumont y Concepción Arenal, Chacarita, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '11.jpg'),
(12, 'Av. San Juan 1333 entre San José y Santiago del Estero, Constitución, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '12.jpg'),
(13, 'Av. Larrazábal 230 entre Tonelero y Caaguazú, Liniers, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '13.jpg'),
(14, 'Alto Palermo Shopping, Av. Santa Fe 3253, Palermo, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '14.jpg'),
(15, 'Juana Manso 1641 entre Encarnación Ezcurra y Rosario Vera Peñaloza, Puerto Madero, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '15.jpg'),
(16, 'Av. Pueyrredón 1663 entre Juncal y Beruti, Recoleta, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '16.jpg'),
(17, 'Marcelo Torcuato de Alvear 820 entre Esmeralda y Suipacha, Retiro, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '17.jpg'),
(18, 'Av. Álvarez Thomas 3072 entre Av. Monroe y Blanco Encalada, Villa Urquiza, CABA, Argentina.', 'Lunes a sábado de 9hs a 21hs.', '18.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

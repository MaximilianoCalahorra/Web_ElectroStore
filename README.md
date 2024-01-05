# Descripción del sitio web
**Consiste en un e-commerce de celulares, tables y computadoras desarrollado mediante HTML, CSS, PHP y CodeIgniter siguiendo la idea del Modelo-Vista-Controlador (MVC) como resolución a un 
trabajo práctico de la materia de Seminario de Lenguajes (PHP) de la carrera de Sistemas de la UNLa.**

**El enlace al sitio web es [electrostoreweb](https://electrostoreweb.000webhostapp.com). También se encuentra en la descripción del repositorio.**

**En el repositorio también se incluye el script de la base de datos y un diagrama que representa la organización del proyecto en relación a las carpetas y archivos que contiene**.

El sitio web cumple con las consignas de ese trabajo práctico, aunque me permití darle algunas funcionalidades extras que consideré que enriquecían el proyecto:
- División del sitio web en modelos, vistas y controladores.
- Conexión con una base de datos con tablas de administradores, clientes, productos y sucursales.
- Roles de administrador, cliente y visitante:
  - Un **administrador** tiene acceso a una parte del sistema donde puede realizar sus **tareas de gestión de la información del sitio web. Por lo tanto, puede realizar altas, bajas y modificaciones de productos, clientes y sucursales**. Para esto tiene disponible las siguientes **secciones**:
    - ***Inicio***: la primera página en cargarse, como una presentación de lo demás.
    - ***Productos***: su contenido principal consta de un listado de productos con botones en cada uno para realizar esas operaciones.
    - ***Clientes***: su contenido principal consta de un listado de clientes con botones en cada uno para realizar esas operaciones.
    - ***Sucursales***: su contenido principal consta de un listado de sucursales con botones en cada uno para realizar esas operaciones.
  - Un **cliente** tiene acceso a la parte comercial del sistema donde se presentan las siguientes **secciones**:
    - ***Inicio***: su contenido principal consta de las novedades del negocio.
    - ***Tienda***: su contenido principal consta de un listado de productos con un botón de compra cada uno.
    - ***Sucursales***: su contenido principal consta de un listado de sucursales.
    - ***Ayuda***: su contenido principal consta de una serie de preguntas frecuentes con sus respectivas respuestas.
  - **Un visitante tiene acceso a una parte del sistema muy parecida a la del cliente**. Sin embargo, mediante un botón en la barra de navegación o al querer comprar un producto, es redirigido a una vista para que se registre y pase a ser un cliente. Por lo tanto, accede a las siguientes **secciones**:
    - ***Inicio***.
    - ***Tienda***.
    - ***Sucursales***.
    - ***Registrarse***.
    - ***Ayuda***.
- De un administrador se registra un identificador (autoincrementable), un usuario y una contraseña (ambas el DNI de la persona), nombre, apellido y mail.
- De un cliente se registra un identificador (autoincrementable), un usuario y una contraseña (ambas el DNI de la persona), nombre, apellido y mail.
- De un producto se registra un identificador (autoincrementable), su tipo de producto, modelo, marca, precio, stock disponible, especificaciones técnicas e imagen.
- De una sucursal se registra un identificador (autoincrementable), su dirección, días y horario de atención e imagen.
- **Las imágenes tanto de los productos como de las sucursales no se encuentran almacenadas directamente en la base de datos para no afectar el rendimiento del sitio web, sino que están subidas al servidor en ubicaciones determinadas y en la base de datos en cada registro solo se guarda el nombre de la imagen con su extensión, logrando de esa forma recuperarlas cuando es solicitada su carga en la pantalla**.
- **Con respecto a los productos, una aclaración importante es que se guardan todos en la misma tabla (productos) de la base de datos en vez de tablas separadas según el tipo de producto. Por lo tanto, por cuestiones de diseño de la vista de los productos decidí agregar un campo numérico a esa tabla que especifica qué tipo de producto es el de ese registro. Se debe guardar el valor 1 para celulares, 2 para computadoras y 3 para tablets. Sin embargo, esto se hace automáticamente: el administrador solo debe indicar si el nuevo producto es celular, computadora o tablet seleccionando la opción correspondiente**.
- Producto de que el usuario y la contraseña de un cliente son lo mismo, **el administrador al agregar un cliente solo indica la contraseña que tendrá y, por defecto, el usuario será el mismo, y al modificar el usuario o contraseña de un cliente modifica ambos campos a la vez**.
- **El sistema cuenta con validaciones para el ingreso de clientes y administradores**, de forma que sólo entrarán al sistema si el usuario y contraseña indicados se corresponden con algún registro de la base de datos. **Esto no sucede con los visitantes porque no están registrados**.
- **El sistema no permite que haya más de un cliente con igual usuario/contraseña**. Por lo tanto, cuando un visitante quiere registrarse como cliente o cuando un administrador agrega o modifica un cliente, se realizan están validaciones.
- **Los productos sin stock disponible no son visibles para los clientes y visitantes, pero sí para los administradores justamente para que puedan actualizar el stock**.
- **Cuando un cliente acciona el botón de compra de algún producto es redirigido a una página que presenta el producto en primer plano junto a un formulario de compra que incluye distintos campos que deben ser completados antes de realizar el pago**. Estos campos no incluyen validaciones acerca de la información ingresada, solo los desarrollé para darle un poco más de profundidad a la función de la compra. Lo que sí implementé es que el importe es completado automáticamente con el del producto elegido.
- **Por cada compra realizada**, como solo desarrollé las funcionalidades necesarias para comprar de a una unidad, **el stock disponible del producto comprado disminuye en una unidad**.

*Gracias por interesarte en visitar este repositorio y leer acerca de él*.

¡Saludos!

Maximiliano Calahorra.




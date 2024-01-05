<?php
defined('BASEPATH') OR exit('No direct script access allowed');

///Clase AdministrarProducto:
class AdministrarProducto extends CI_Controller
{
    //Agregar:
    public function cargarVistaAgregarProducto()
    {
        $dato['resultado'] = "";
        $this->load->view('administrador/agregar/agregar_producto', $dato);
    }
    public function agregarProducto()
    {
        $tipo_producto = $_POST['tipo_producto'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $descripcion = $_POST['descripcion'];
        $ruta = '/xampp/htdocs/ElectroStore/assets/imagenes/productos/'; //Defino en qué carpeta se guardará la imagen enviada.
        $nombre_imagen = $_FILES['imagen']['name']; //Obtengo el nombre y la extensión de la imagen enviada.
        move_uploaded_file($_FILES['imagen']['tmp_name'],  $ruta.$nombre_imagen); //Guardo la imagen envíada en la ruta definida anteriormente.
        $this->load->model('GestionarProducto');
        $resultado = $this->GestionarProducto->insertarProducto($tipo_producto, $marca, $modelo, $precio, $stock, $descripcion, $nombre_imagen); //Insertamos el producto con toda su info, incluido el nombre y la extensión de la imagen.
        if ($resultado == null)
        {
            $dato['tipo_usuario'] = 'Administrador';
            $dato['categoria_cambio'] = 'Producto agregado';
            $dato['controlador'] = 'AdministrarProducto';
            $dato['metodo'] = 'cargarProductosAdministrador';
            $this->load->view('administrador/mensaje_resultado', $dato);
        }
        else
        {
            $dato['resultado'] = "El producto no pudo ser agregado.";
            $this->load->view('administrador/agregar/agregar_producto', $dato);
        }
    }

    //Actualizar:
    public function cambiosAlProducto($id_producto_cambios)
    {
        $tipo_cambio = $_POST['cambiar_producto'];
        if ($tipo_cambio == 'modificar')
        {
            $this->cargarVistaInicialModificarProducto($id_producto_cambios);
        }
        else if ($tipo_cambio == 'eliminar')
        {
            $this->eliminarProducto($id_producto_cambios);
        }
    }

    public function cargarVistaInicialModificarProducto($id_producto_modificar)
    {
        $dato['id_producto'] = $id_producto_modificar;
        $this->load->view('administrador/modificar/producto/elegir_tipo_modificacion', $dato);
    }
    public function modificacionAlProducto($id_producto_modificar)
    {
        $tipo_modificacion = $_POST['modificacion_producto'];
        $dato['id'] = $id_producto_modificar;
        $dato['controlador'] = "AdministrarProducto";
        $this->load->model('GestionarProducto');
        $producto = $this->GestionarProducto->getProducto($id_producto_modificar);
        $dato['producto'] = $producto;
        $dato['select'] = "";
        $dato['resultado'] = "";
        if ($tipo_modificacion == 'marca')
        {
            $dato['titulo'] = 'Modificando la marca del producto';
            $dato['metodo'] = 'modificarMarcaProducto';
            $input = '<input class="input" type="text" name="nueva_marca" value=';
            $input .= '"';
            $input .= $producto->marca;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input;
            $this->cargarVistaModificarMarcaProducto($dato);
        }
        else if ($tipo_modificacion == 'modelo')
        {
            $dato['titulo'] = 'Modificando el modelo del producto';
            $dato['metodo'] = 'modificarModeloProducto';
            $input = '<input class="input" type="text" name="nuevo_modelo" value=';
            $input .= '"';
            $input .= $producto->modelo;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input;
            $this->cargarVistaModificarModeloProducto($dato);
        }
        else if ($tipo_modificacion == 'precio')
        {
            $dato['titulo'] = 'Modificando el precio ($) del producto';
            $dato['metodo'] = 'modificarPrecioProducto';
            $input = '<input class="input" type="number" name="nuevo_precio" value=';
            $input .= '"';
            $input .= $producto->precio;
            $input .= '"';
            $input .= "min=1 autocomplete='off' required>"; 
            $dato['input'] = $input;
            $this->cargarVistaModificarPrecioProducto($dato);
        }
        else if ($tipo_modificacion == 'stock')
        {
            $dato['titulo'] = 'Modificando el stock disponible del producto';
            $dato['metodo'] = 'modificarStockProducto';
            $input = '<input class="input" type="number" name="nuevo_stock" value=';
            $input .= '"';
            $input .= $producto->stock;
            $input .= '"';
            $input .= "min=0 autocomplete='off' required>"; 
            $dato['input'] = $input;
            $this->cargarVistaModificarStockProducto($dato);
        }
        else if ($tipo_modificacion == 'descripcion')
        {
            $dato['titulo'] = 'Modificando la descripción del producto';
            $dato['metodo'] = 'modificarDescripcionProducto';
            $input = '<input class="input" type="text" name="nueva_descripcion" value=';
            $input .= '"';
            $input .= $producto->descripcion;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input;
            $this->cargarVistaModificarDescripcionProducto($dato);
        }
        else if ($tipo_modificacion == 'imagen')
        {
            $dato['titulo'] = "Modificando la imagen del producto";
            $dato['metodo'] = "modificarImagenProducto";
            $dato['input'] = '<input class="input" type="file" accept="image/*" name="imagen" required>';
            $this->cargarVistaModificarImagenProducto($dato);
        }
        else if ($tipo_modificacion == 'todo')
        {
            $this->cargarVistaModificarProducto($dato);
        }
    }

    //Marca:
    public function cargarVistaModificarMarcaProducto($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarMarcaProducto($id_producto_modificar)
    {
        $nueva_marca = $_POST['nueva_marca'];
        $this->load->model('GestionarProducto');
        $resultado = $this->GestionarProducto->actualizarMarcaProducto($id_producto_modificar, $nueva_marca);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarProducto';
        $dato['metodo'] = 'cargarProductosAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Producto modificado en su marca';
        }
        else
        {
            $dato['categoria_cambio'] = 'El producto no pudo ser modificado en su marca';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Modelo:
    public function cargarVistaModificarModeloProducto($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarModeloProducto($id_producto_modificar)
    {
        $nuevo_modelo = $_POST['nuevo_modelo'];
        $this->load->model('GestionarProducto');
        $resultado = $this->GestionarProducto->actualizarModeloProducto($id_producto_modificar, $nuevo_modelo);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarProducto';
        $dato['metodo'] = 'cargarProductosAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Producto modificado en su modelo';
        }
        else
        {
            $dato['categoria_cambio'] = 'El producto no pudo ser modificado en su modelo';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Precio:
    public function cargarVistaModificarPrecioProducto($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarPrecioProducto($id_producto_modificar)
    {
        $nuevo_precio = $_POST['nuevo_precio'];
        $this->load->model('GestionarProducto');
        $resultado = $this->GestionarProducto->actualizarPrecioProducto($id_producto_modificar, $nuevo_precio);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarProducto';
        $dato['metodo'] = 'cargarProductosAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Producto modificado en su precio';
        }
        else
        {
            $dato['categoria_cambio'] = 'El producto no pudo ser modificado en su precio';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Stock:
    public function cargarVistaModificarStockProducto($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarStockProducto($id_producto_modificar)
    {
        $nuevo_stock = $_POST['nuevo_stock'];
        $this->load->model('GestionarProducto');
        $resultado = $this->GestionarProducto->actualizarStockProducto($id_producto_modificar, $nuevo_stock);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarProducto';
        $dato['metodo'] = 'cargarProductosAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Producto modificado en su stock disponible';
        }
        else
        {
            $dato['categoria_cambio'] = 'El producto no pudo ser modificado en su stock disponible';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }
    
    //Descripción:
    public function cargarVistaModificarDescripcionProducto($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarDescripcionProducto($id_producto_modificar)
    {
        $nueva_descripcion = $_POST['nueva_descripcion'];
        $this->load->model('GestionarProducto');
        $resultado = $this->GestionarProducto->actualizarDescripcionProducto($id_producto_modificar, $nueva_descripcion);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarProducto';
        $dato['metodo'] = 'cargarProductosAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Producto modificado en su descripción';
        }
        else
        {
            $dato['categoria_cambio'] = 'El producto no pudo ser modificado en su descripción';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Imagen:
    public function cargarVistaModificarImagenProducto($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarImagenProducto($id_producto_modificar)
    {
        $ruta = '/xampp/htdocs/ElectroStore/assets/imagenes/productos/';
        $nuevo_nombre_imagen = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'],  $ruta.$nuevo_nombre_imagen);
        $this->load->model('GestionarProducto');
        $resultado = $this->GestionarProducto->actualizarImagenProducto($id_producto_modificar, $nuevo_nombre_imagen);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarProducto';
        $dato['metodo'] = 'cargarProductosAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Producto modificado en su imagen';
        }
        else
        {
            $dato['categoria_cambio'] = 'El producto no pudo ser modificado en su imagen';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Producto por completo:
    public function cargarVistaModificarProducto($dato)
    {
        $this->load->view('administrador/modificar/producto/modificar_completo', $dato);
    }
    public function modificarProducto($id_producto_modificar)
    {   
        $nueva_marca = $_POST['nueva_marca'];
        $nuevo_modelo = $_POST['nuevo_modelo'];
        $nuevo_precio = $_POST['nuevo_precio'];
        $nuevo_stock = $_POST['nuevo_stock'];
        $nueva_descripcion = $_POST['nueva_descripcion'];
        $ruta = '/xampp/htdocs/ElectroStore/assets/imagenes/productos/';
        $nuevo_nombre_imagen = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'],  $ruta.$nuevo_nombre_imagen);
        $this->load->model('GestionarProducto');
        $producto = $this->GestionarProducto->getProducto($id_producto_modificar);
        $resultado = $this->GestionarProducto->actualizarProducto($id_producto_modificar, $producto->tipo_producto, $nueva_marca, $nuevo_modelo, $nuevo_precio, $nuevo_stock, $nueva_descripcion, $nuevo_nombre_imagen);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarProducto';
        $dato['metodo'] = 'cargarProductosAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Producto modificado por completo';
        }
        else
        {
            $dato['categoria_cambio'] = 'El producto no pudo ser modificado por completo';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Eliminar:
    public function eliminarProducto($id_producto_eliminar)
    {
        $this->load->model('GestionarProducto');
        $resultado = $this->GestionarProducto->removerProducto($id_producto_eliminar);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarProducto';
        $dato['metodo'] = 'cargarProductosAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Producto eliminado';
        }
        else
        {
            $dato['categoria_cambio'] = 'El producto no pudo ser eliminado';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Obtener:
    public function obtenerProductos($tipo_usuario)
    {
        $this->load->model('GestionarProducto');
        $data_productos['catalogo'] = $this->GestionarProducto->getProductos($tipo_usuario);
        return $data_productos;
    }

    //Cargar productos para el administrador:
    public function cargarProductosAdministrador()
    {
        $data_productos = $this->obtenerProductos("administrador");
        $this->load->view('administrador/barra_navegacion');
        $this->load->view('administrador/productos', $data_productos);
    }

    //Cargar tienda para el cliente:
    public function cargarTiendaCliente($tipo_usuario)
    {
        $data = $this->obtenerProductos($tipo_usuario);
        $data['tipo_usuario'] = $tipo_usuario;
        $data['metodo'] = "";
        $data['parametro'] = "";
        if ($data['tipo_usuario'] == 'cliente')
        {
            $this->load->view('cliente/barra_navegacion');
            $data['metodo'] = 'cargarVistaComprarProductoCliente';
            $data['parametro'] = "";
        }
        else if ($data['tipo_usuario'] == 'visitante')
        {
            $this->load->view('visitante/barra_navegacion');
            $data['metodo'] = 'cargarVistaAgregarCliente';
            $data['parametro'] = "Visitante";
        }
        $this->load->view('cliente-visitante/main_tienda', $data);
        $this->load->view('cliente-visitante/footer');
    }
}
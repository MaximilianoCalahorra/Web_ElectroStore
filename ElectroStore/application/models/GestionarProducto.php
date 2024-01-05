<?php
///Clase GestionarProducto:
class GestionarProducto extends CI_Model
{
    //Constructor del modelo y su "padre":
    function __construct() 
    { 
        parent::__construct();
    }

    //Insertar:
    public function insertarProducto($tipo_producto, $marca, $modelo, $precio, $stock, $descripcion, $imagen_nombre)
    {
        $this->db->query("INSERT INTO productos (tipo_producto, marca, modelo, precio, stock, descripcion, nombre_imagen) VALUES ($tipo_producto, '$marca', '$modelo', $precio, $stock, '$descripcion', '$imagen_nombre')");
    }

    //Actualizar:
    public function actualizarTipoProducto($id_producto_modificar, $nuevo_tipo)
    {
        $this->db->query("UPDATE productos SET tipo_producto = $nuevo_tipo WHERE id_producto = $id_producto_modificar");
    }
    public function actualizarMarcaProducto($id_producto_modificar, $nueva_marca)
    {
        $this->db->query("UPDATE productos SET marca = '$nueva_marca' WHERE id_producto = $id_producto_modificar");
    }
    public function actualizarModeloProducto($id_producto_modificar, $nuevo_modelo)
    {
        $this->db->query("UPDATE productos SET modelo = '$nuevo_modelo' WHERE id_producto = $id_producto_modificar");
    }
    public function actualizarPrecioProducto($id_producto_modificar, $nuevo_precio)
    {
        $this->db->query("UPDATE productos SET precio = $nuevo_precio WHERE id_producto = $id_producto_modificar");
    }
    public function actualizarStockProducto($id_producto_modificar, $nuevo_stock)
    {
        $this->db->query("UPDATE productos SET stock = $nuevo_stock WHERE id_producto = $id_producto_modificar");
    }
    public function actualizarDescripcionProducto($id_producto_modificar, $nueva_descripcion)
    {
        $this->db->query("UPDATE productos SET descripcion = '$nueva_descripcion' WHERE id_producto = $id_producto_modificar");
    }
    public function actualizarImagenProducto($id_producto_modificar, $nuevo_nombre_imagen)
    {
        $this->db->query("UPDATE productos SET nombre_imagen = '$nuevo_nombre_imagen' WHERE id_producto = $id_producto_modificar");   
    }
    public function actualizarProducto($id_producto_modificar, $nuevo_tipo, $nueva_marca, $nuevo_modelo, $nuevo_precio, $nuevo_stock, $nueva_descripcion, $nuevo_nombre_imagen)
    {
        $this->actualizarTipoProducto($id_producto_modificar, $nuevo_tipo);
        $this->actualizarMarcaProducto($id_producto_modificar, $nueva_marca);
        $this->actualizarModeloProducto($id_producto_modificar, $nuevo_modelo);
        $this->actualizarPrecioProducto($id_producto_modificar, $nuevo_precio);
        $this->actualizarStockProducto($id_producto_modificar, $nuevo_stock);
        $this->actualizarDescripcionProducto($id_producto_modificar, $nueva_descripcion);
        $this->actualizarImagenProducto($id_producto_modificar, $nuevo_nombre_imagen);
    }

    //Remover:
    public function removerProducto($id_producto_eliminar)
    {
        $this->db->query("DELETE FROM productos WHERE id_producto = $id_producto_eliminar");
    }

    //Obtener:
    public function getProductos($tipo_usuario)
    {
        //$resultado = $this->db->get('productos');
        if ($tipo_usuario == 'cliente' || $tipo_usuario == 'visitante')
        {
            $resultado = $this->db->query("SELECT * FROM productos WHERE stock > 0");
        }
        else if ($tipo_usuario == 'administrador')
        {
            $resultado = $this->db->get('productos');
        }
        if ($resultado->num_rows() > 0)
        {
            return $resultado;
        }
        else
        {
            return false;
        }
    }
    public function getProducto($id_producto_buscado)
    {
        $resultado = $this->db->query("SELECT * FROM productos WHERE id_producto = $id_producto_buscado");
        if ($resultado->num_rows() > 0)
        {
            return $resultado->row();
        }
        else
        {
            return false;
        }
    }
}
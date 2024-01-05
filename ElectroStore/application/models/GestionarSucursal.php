<?php
///Clase GestionarSucursal:
class GestionarSucursal extends CI_Model
{
    //Constructor del modelo y su "padre":
    function __construct() 
    { 
        parent::__construct();
    }

    //Insertar:
    public function insertarSucursal($direccion, $dia_horario_atencion, $nombre_imagen)
    {
        $this->db->query("INSERT INTO sucursales (direccion, dia_horario_atencion, nombre_imagen) VALUES ('$direccion', '$dia_horario_atencion', '$nombre_imagen')");
    }

    //Actualizar:
    public function actualizarDireccionSucursal($id_sucursal_modificar, $nueva_direccion)
    {
        $this->db->query("UPDATE sucursales SET direccion = '$nueva_direccion' WHERE id_sucursal = $id_sucursal_modificar");
    }
    public function actualizarDiaHorarioAtencionSucursal($id_sucursal_modificar, $nuevo_dia_horario_atencion)
    {
        $this->db->query("UPDATE sucursales SET dia_horario_atencion = '$nuevo_dia_horario_atencion' WHERE id_sucursal = $id_sucursal_modificar");
    }
    public function actualizarImagenSucursal($id_sucursal_modificar, $nuevo_nombre_imagen)
    {
        $this->db->query("UPDATE sucursales SET nombre_imagen = '$nuevo_nombre_imagen' WHERE id_sucursal = $id_sucursal_modificar");   
    }
    public function actualizarSucursal($id_sucursal_modificar, $nueva_direccion, $nuevo_dia_horario_atencion, $nuevo_nombre_imagen)
    {
        $this->actualizarDireccionSucursal($id_sucursal_modificar, $nueva_direccion);
        $this->actualizarDiaHorarioAtencionSucursal($id_sucursal_modificar, $nuevo_dia_horario_atencion);
        $this->actualizarImagenSucursal($id_sucursal_modificar, $nuevo_nombre_imagen);
    }

    //Remover:
    public function removerSucursal($id_sucursal_eliminar)
    {
        $this->db->query("DELETE FROM sucursales WHERE id_sucursal = $id_sucursal_eliminar");
    }

    //Obtener:
    public function getSucursales()
    {
        $resultado = $this->db->get('sucursales');
        if ($resultado->num_rows() > 0)
        {
            return $resultado;
        }
        else
        {
            return false;
        }
    }
    public function getSucursal($id_sucursal_buscada)
    {
        $resultado = $this->db->query("SELECT * FROM sucursales WHERE id_sucursal = $id_sucursal_buscada");
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
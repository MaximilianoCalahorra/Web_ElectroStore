<?php
///Clase ModeloLogueo:
class ModeloLogueo extends CI_Model
{
    //Constructor del modelo y su "padre":
    function __construct() 
    { 
        parent::__construct();
    }

    //Validar ingreso del cliente:
    function validarIngresoCliente($usuario, $contraseña)
    {
        $consulta = $this->db->query("SELECT usuario, contraseña FROM clientes WHERE usuario = $usuario AND contraseña = $contraseña");
        //$consulta tiene la cantidad de registros que cumplen la condición.
        if ($consulta->num_rows() == 1) 
        {  
            return $consulta->row();
        }
        else
        {
            return false;
        }
    }
    
    //Validar ingreso del administrador:
    function validarIngresoAdministrador($usuario, $contraseña)
    {
        $consulta = $this->db->query("SELECT usuario, contraseña FROM administradores WHERE usuario = $usuario AND contraseña = $contraseña");
        //$consulta tiene la cantidad de registros que cumplen la condición.
        if ($consulta->num_rows() == 1) 
        {  
            return $consulta->row();
        }
        else
        {
            return false;
        }
    }
}
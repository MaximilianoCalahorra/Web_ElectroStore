<?php
///Clase GestionarCliente:
class GestionarCliente extends CI_Model
{
    //Constructor del modelo y su "padre":
    function __construct() 
    { 
        parent::__construct();
    }

    //Insertar:
    public function insertarCliente($usuario, $contraseña, $nombre, $apellido, $mail)
    {
        $this->db->query("INSERT INTO clientes (usuario, contraseña, nombre, apellido, mail) VALUES ($usuario, $contraseña, '$nombre', '$apellido', '$mail')");
    }

    //Actualizar:
    public function actualizarUsuarioCliente($id_cliente_modificar, $nuevo_usuario, $contraseña_actualizada)
    {
        //Si se modifica el usuario también se modifica la contraseña.
        $this->db->query("UPDATE clientes SET usuario = $nuevo_usuario WHERE id_cliente = $id_cliente_modificar");
        $nueva_contraseña = $nuevo_usuario;
        if ($contraseña_actualizada == false)
        {
            $this->actualizarContraseñaCliente($id_cliente_modificar, $nueva_contraseña, true);  //No actualiza el usuario porque ya se hizo. 
        }
    }
    public function actualizarContraseñaCliente($id_cliente_modificar, $nueva_contraseña, $usuario_actualizado)
    {
        //Si se modifica la contraseña también se modifica el usuario.
        $this->db->query("UPDATE clientes SET contraseña = $nueva_contraseña WHERE id_cliente = $id_cliente_modificar");
        $nuevo_usuario = $nueva_contraseña;
        if ($usuario_actualizado == false)
        {
            $this->actualizarUsuarioCliente($id_cliente_modificar, $nuevo_usuario, true); //No actualiza la contraseña porque ya se hizo.
        }
    }
    public function actualizarNombreCliente($id_cliente_modificar, $nuevo_nombre)
    {
        $this->db->query("UPDATE clientes SET nombre = '$nuevo_nombre' WHERE id_cliente = $id_cliente_modificar");
    }
    public function actualizarApellidoCliente($id_cliente_modificar, $nuevo_apellido)
    {
        $this->db->query("UPDATE clientes SET apellido = '$nuevo_apellido' WHERE id_cliente = $id_cliente_modificar");
    }
    public function actualizarMailCliente($id_cliente_modificar, $nuevo_mail)
    {
        $this->db->query("UPDATE clientes SET mail = '$nuevo_mail' WHERE id_cliente = $id_cliente_modificar");
    }
    public function actualizarCliente($id_cliente_modificar, $nuevo_usuario, $nuevo_nombre, $nuevo_apellido, $nuevo_mail)
    {
        $this->actualizarUsuarioCliente($id_cliente_modificar, $nuevo_usuario, false);
        $this->actualizarNombreCliente($id_cliente_modificar, $nuevo_nombre);
        $this->actualizarApellidoCliente($id_cliente_modificar, $nuevo_apellido);
        $this->actualizarMailCliente($id_cliente_modificar, $nuevo_mail);
        //No llamo a actualizarContraseñaCliente porque lo llama actualizarUsuarioCliente.
    }

    //Remover:
    public function removerCliente($id_cliente_eliminar)
    {
        $this->db->query("DELETE FROM clientes WHERE id_cliente = $id_cliente_eliminar");
    }

    //Obtener:
    public function getClientes()
    {
        $resultado = $this->db->get('clientes');
        if ($resultado->num_rows() > 0)
        {
            return $resultado;
        }
        else
        {
            return false;
        }
    }
    public function getCliente($id_cliente_buscado)
    {
        $resultado = $this->db->query("SELECT * FROM clientes WHERE id_cliente = $id_cliente_buscado");
        if ($resultado->num_rows() > 0)
        {
            return $resultado->row();
        }
        else
        {
            return false;
        }
    }
    public function getClientePorContraseña($contraseña_buscada)
    {
        $resultado = $this->db->query("SELECT * FROM clientes WHERE contraseña = $contraseña_buscada");
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
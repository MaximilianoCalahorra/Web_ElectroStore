<?php
defined('BASEPATH') OR exit('No direct script access allowed');

///Clase AdministrarCliente:
class AdministrarCliente extends CI_Controller
{
    //Agregar:
    public function cargarVistaAgregarCliente($tipo_registrador)
    {
        $dato['tipo_registrador'] = $tipo_registrador;
        $dato['resultado'] = "";
        $this->load->view('administrador/agregar/agregar_cliente', $dato);
    }
    public function agregarCliente($tipo_registrador)
    {
        $contraseña = $_POST['contraseña'];
        $this->load->model('GestionarCliente');
        $cliente_con_igual_contraseña = $this->GestionarCliente->getClientePorContraseña($contraseña);
        if ($cliente_con_igual_contraseña == null)
        {
            $usuario = $contraseña; //El usuario será el mismo que la contraseña.
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $mail = $_POST['mail'];
            $this->load->model('GestionarCliente');
            $resultado = $this->GestionarCliente->insertarCliente($usuario, $contraseña, $nombre, $apellido, $mail);
            $dato['tipo_usuario'] = $tipo_registrador;
            $dato['categoria_cambio'] = 'Cliente agregado';
            if ($tipo_registrador == 'Administrador')
            {
                $dato['controlador'] = 'AdministrarCliente';
                $dato['metodo'] = 'cargarClientesAdministrador';
            }
            else if ($tipo_registrador == 'Visitante')
            {
                $dato['controlador'] = 'Iniciar';
                $dato['metodo'] = 'index';
            }        
            $this->load->view('administrador/mensaje_resultado', $dato);   
        }
        else
        {
            $dato['tipo_registrador'] = $tipo_registrador;
            $dato['resultado'] = "Ya existe un cliente con ese usuario y contraseña.";
            $this->load->view('administrador/agregar/agregar_cliente', $dato);
        }
    }

    //Actualizar:
    public function cambiosAlCliente($id_cliente_cambios)
    {
        $tipo_cambio = $_POST['cambiar_cliente'];
        if ($tipo_cambio == 'modificar')
        {
            $this->cargarVistaInicialModificarCliente($id_cliente_cambios);
        }
        else if ($tipo_cambio == 'eliminar')
        {
            $this->eliminarCliente($id_cliente_cambios);
        }
    }

    public function cargarVistaInicialModificarCliente($id_cliente_modificar)
    {
        $dato['id_cliente'] = $id_cliente_modificar;
        $this->load->view('administrador/modificar/cliente/elegir_tipo_modificacion', $dato);
    }

    public function modificacionAlCliente($id_cliente_modificar)
    {
        $tipo_modificacion = $_POST['modificacion_cliente'];
        $dato['id'] = $id_cliente_modificar;
        $dato['controlador'] = "AdministrarCliente";
        $this->load->model('GestionarCliente');
        $cliente = $this->GestionarCliente->getCliente($id_cliente_modificar);
        $dato['cliente'] = $cliente;
        $dato['select'] = "";
        $dato['resultado'] = "";
        if ($tipo_modificacion == 'usuario')
        {
            $dato['titulo'] = 'Modificando el usuario del cliente';
            $dato['metodo'] = 'modificarUsuarioCliente';
            $input = '<input class="input" type="text" name="nuevo_usuario" value=';
            $input .= '"';
            $input .= $cliente->usuario;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input; 
            $this->cargarVistaModificarUsuarioCliente($dato);
        }
        else if ($tipo_modificacion == 'contraseña')
        {
            $dato['titulo'] = 'Modificando la contraseña del cliente';
            $dato['metodo'] = 'modificarContraseniaCliente';
            $input = '<input class="input" type="text" name="nueva_contraseña" value=';
            $input .= '"';
            $input .= $cliente->contraseña;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input; 
            $this->cargarVistaModificarContraseñaCliente($dato);
        }
        else if ($tipo_modificacion == 'nombre')
        {
            $dato['titulo'] = 'Modificando el nombre del cliente';
            $dato['metodo'] = 'modificarNombreCliente';
            $input = '<input class="input" type="text" name="nuevo_nombre" value=';
            $input .= '"';
            $input .= $cliente->nombre;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input; 
            $this->cargarVistaModificarNombreCliente($dato);
        }
        else if ($tipo_modificacion == 'apellido')
        {
            $dato['titulo'] = 'Modificando el apellido del cliente';
            $dato['metodo'] = 'modificarApellidoCliente';
            $input = '<input class="input" type="text" name="nuevo_apellido" value=';
            $input .= '"';
            $input .= $cliente->apellido;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input; 
            $this->cargarVistaModificarApellidoCliente($dato);
        }
        else if ($tipo_modificacion == 'mail')
        {
            $dato['titulo'] = 'Modificando el mail del cliente';
            $dato['metodo'] = 'modificarMailCliente';
            $input = '<input class="input" type="email" name="nuevo_mail" value=';
            $input .= '"';
            $input .= $cliente->mail;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input; 
            $this->cargarVistaModificarMailCliente($dato);
        }
        else if ($tipo_modificacion == 'todo')
        {
            $dato['resultado'] = "";
            $this->cargarVistaModificarCliente($dato);
        }
    }

    //Usuario:
    public function cargarVistaModificarUsuarioCliente($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarUsuarioCliente($id_cliente_modificar)
    {
        $nuevo_usuario = $_POST['nuevo_usuario'];
        $this->load->model('GestionarCliente');
        $cliente_con_igual_contraseña = $this->GestionarCliente->getClientePorContraseña($nuevo_usuario); //La contraseña es lo mismo que el usuario, por eso reutilizo.
        if ($cliente_con_igual_contraseña == null)
        {
            $this->GestionarCliente->actualizarUsuarioCliente($id_cliente_modificar, $nuevo_usuario, false);
            $dato['tipo_usuario'] = 'Administrador';
            $dato['controlador'] = 'AdministrarCliente';
            $dato['metodo'] = 'cargarClientesAdministrador';
            $dato['categoria_cambio'] = 'Cliente modificado en su usuario';
            $this->load->view('administrador/mensaje_resultado', $dato);
        }
        else
        {
            $dato['id'] = $id_cliente_modificar;
            $dato['controlador'] = "AdministrarCliente";
            $this->load->model('GestionarCliente');
            $cliente = $this->GestionarCliente->getCliente($id_cliente_modificar);
            $dato['select'] = "";
            $dato['titulo'] = 'Modificando el usuario del cliente';
            $dato['metodo'] = 'modificarUsuarioCliente';
            $input = '<input class="input" type="text" name="nuevo_usuario" value=';
            $input .= '"';
            $input .= $cliente->usuario;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input; 
            $dato['resultado'] = "Ya existe un cliente con ese usuario y contraseña.";
            $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
        }
    }

    //Contraseña:
    public function cargarVistaModificarContraseñaCliente($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarContraseniaCliente($id_cliente_modificar)
    {
        $nueva_contraseña = $_POST['nueva_contraseña'];
        $this->load->model('GestionarCliente');
        $cliente_con_igual_contraseña = $this->GestionarCliente->getClientePorContraseña($nueva_contraseña); 
        if ($cliente_con_igual_contraseña == null)
        {
            $this->GestionarCliente->actualizarContraseñaCliente($id_cliente_modificar, $nueva_contraseña, false);
            $dato['tipo_usuario'] = 'Administrador';
            $dato['controlador'] = 'AdministrarCliente';
            $dato['metodo'] = 'cargarClientesAdministrador';
            $dato['categoria_cambio'] = 'Cliente modificado en su contraseña';
            $this->load->view('administrador/mensaje_resultado', $dato);
        }
        else
        {
            $dato['id'] = $id_cliente_modificar;
            $dato['controlador'] = "AdministrarCliente";
            $this->load->model('GestionarCliente');
            $cliente = $this->GestionarCliente->getCliente($id_cliente_modificar);
            $dato['select'] = "";
            $dato['titulo'] = 'Modificando la contraseña del cliente';
            $dato['metodo'] = 'modificarContraseniaCliente';
            $input = '<input class="input" type="text" name="nueva_contraseña" value=';
            $input .= '"';
            $input .= $cliente->usuario;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input; 
            $dato['resultado'] = "Ya existe un cliente con ese usuario y contraseña.";
            $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
        }
    }

    //Nombre:
    public function cargarVistaModificarNombreCliente($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarNombreCliente($id_cliente_modificar)
    {
        $nuevo_nombre = $_POST['nuevo_nombre'];
        $this->load->model('GestionarCliente');
        $resultado = $this->GestionarCliente->actualizarNombreCliente($id_cliente_modificar, $nuevo_nombre);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarCliente';
        $dato['metodo'] = 'cargarClientesAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Cliente modificado en su nombre';
        }
        else
        {
            $dato['categoria_cambio'] = 'El cliente no pudo ser modificado en su nombre';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Apellido:
    public function cargarVistaModificarApellidoCliente($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarApellidoCliente($id_cliente_modificar)
    {
        $nuevo_apellido = $_POST['nuevo_apellido'];
        $this->load->model('GestionarCliente');
        $resultado = $this->GestionarCliente->actualizarApellidoCliente($id_cliente_modificar, $nuevo_apellido);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarCliente';
        $dato['metodo'] = 'cargarClientesAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Cliente modificado en su apellido';
        }
        else
        {
            $dato['categoria_cambio'] = 'El cliente no pudo ser modificado en su apellido';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Mail:
    public function cargarVistaModificarMailCliente($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarMailCliente($id_cliente_modificar)
    {
        $nuevo_mail = $_POST['nuevo_mail'];
        $this->load->model('GestionarCliente');
        $resultado = $this->GestionarCliente->actualizarMailCliente($id_cliente_modificar, $nuevo_mail);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarCliente';
        $dato['metodo'] = 'cargarClientesAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Cliente modificado en su mail';
        }
        else
        {
            $dato['categoria_cambio'] = 'El cliente no pudo ser modificado en su mail';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Cliente por completo:
    public function cargarVistaModificarCliente($dato)
    {
        $this->load->view('administrador/modificar/cliente/modificar_completo', $dato);
    }
    public function modificarCliente($id_cliente_modificar)
    {
        $nueva_contraseña = $_POST['nueva_contraseña'];
        $this->load->model('GestionarCliente');
        $cliente_con_igual_contraseña = $this->GestionarCliente->getClientePorContraseña($nueva_contraseña); 
        if ($cliente_con_igual_contraseña == null)
        {
            $nuevo_usuario = $nueva_contraseña;
            $nuevo_nombre = $_POST['nuevo_nombre'];
            $nuevo_apellido = $_POST['nuevo_apellido'];
            $nuevo_mail = $_POST['nuevo_mail'];
            $this->GestionarCliente->actualizarCliente($id_cliente_modificar, $nuevo_usuario, $nuevo_nombre, $nuevo_apellido, $nuevo_mail);
            $dato['tipo_usuario'] = 'Administrador';
            $dato['controlador'] = 'AdministrarCliente';
            $dato['metodo'] = 'cargarClientesAdministrador';
            $dato['categoria_cambio'] = 'Cliente modificado por completo';
            $this->load->view('administrador/mensaje_resultado', $dato);
        }
        else
        {
            $dato['id'] = $id_cliente_modificar;
            $cliente = $this->GestionarCliente->getCliente($id_cliente_modificar);
            $dato['cliente'] = $cliente;
            $dato['resultado'] = "Ya existe un cliente con ese usuario y contraseña.";
            $this->load->view('administrador/modificar/cliente/modificar_completo', $dato);
        }
    }

    //Eliminar:
    public function eliminarCliente($id_cliente_eliminar)
    {
        $this->load->model('GestionarCliente');
        $resultado = $this->GestionarCliente->removerCliente($id_cliente_eliminar);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarCliente';
        $dato['metodo'] = 'cargarClientesAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Cliente eliminado';
        }
        else
        {
            $dato['categoria_cambio'] = 'El cliente no pudo ser eliminado';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Obtener:
    public function obtenerClientes()
    {
        $this->load->model('GestionarCliente');
        $data_clientes['listado'] = $this->GestionarCliente->getClientes();
        return $data_clientes;
    }

    //Cargar clientes para el administrador:
    public function cargarClientesAdministrador()
    {
        $data_clientes = $this->obtenerClientes();
        $this->load->view('administrador/barra_navegacion');
        $this->load->view('administrador/clientes', $data_clientes);
    }

    //Compra:
    public function cargarVistaComprarProductoCliente()
    {
        $id_producto_comprar = $_POST['producto_comprar'];
        $this->load->model('GestionarProducto');
        $data['producto'] = $this->GestionarProducto->getProducto($id_producto_comprar);
        $this->load->view('cliente/compra_producto.php', $data); 
    }
    public function cargarVistaMensajeFinalizacionCompra()
    {
        $id_producto_modificar = $_POST['id_producto'];
        $stock_actual = $_POST['stock_actual'];
        $nuevo_stock = $stock_actual - 1;
        $this->load->model('GestionarProducto');
        $resultado = $this->GestionarProducto->actualizarStockProducto($id_producto_modificar, $nuevo_stock);
        $this->load->view('cliente/mensaje_finalizacion_compra');
    }
    public function cargarVistaSiguienteAlMensajeCompra()
    {
        $eleccion_cliente = $_POST['siguiente_vista'];
        if ($eleccion_cliente == 'preguntas_frecuentes')
        {
            $this->load->view('cliente/barra_navegacion');
            $this->load->view('cliente-visitante/main_ayuda');
            $this->load->view('cliente-visitante/footer');
        }
        else if ($eleccion_cliente == 'inicio')
        {
            $this->load->view('cliente/barra_navegacion');
            $this->load->view('cliente-visitante/main_inicio');
            $this->load->view('cliente-visitante/aside');
            $this->load->view('cliente-visitante/footer');
        }
    }
}
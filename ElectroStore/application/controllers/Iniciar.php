<?php
defined('BASEPATH') OR exit('No direct script access allowed');

///Controlador Iniciar:
class Iniciar extends CI_Controller
{
    //Inicio del sitio web:
    public function index()
    {
        $this->load->view("logueo/ingreso_al_sistema");
    }
    public function cargarLogueo()
    {
        $tipo_usuario = $_POST['logueo'];
        if ($tipo_usuario == 'administrador')
        {
            $this->cargarLogueoAdministrador();
        }
        else if ($tipo_usuario == 'cliente')
        {
            $this->cargarLogueoCliente();
        }
        else if ($tipo_usuario == 'visitante')
        {
            $this->cargarInicioVisitante();
        }
    }
    public function cargarLogueoAdministrador()
    {
        $dato['mensaje_al_administrador'] = "";
        $this->load->view('logueo/ingreso_administrador', $dato);
    }
    public function cargarLogueoCliente()
    {
        $dato['mensaje_al_cliente'] = "";
        $this->load->view('logueo/ingreso_cliente', $dato);
    }

    //Validar cliente:
    public function validarCliente()
    {
        $usuario = $_POST['usuario']; //Obtenemos el usuario ingresado.
        $contraseña = $_POST['contraseña']; //Obtenemos la contraseña ingresada.
        $this->load->model('ModeloLogueo'); //Cargamos el modelo.
        $resultado = $this->ModeloLogueo->validarIngresoCliente($usuario, $contraseña); //Validamos los datos ingresados.
        if ($resultado != null) //Si la consulta encontró un cliente con ese usuario y contraseña...
        {
            $this->cargarInicioCliente();
        }
        else //Si no hay coincidencia...
        {
            $dato['mensaje_al_cliente'] = "Usuario y/o contraseña incorrectos. Revise la información ingresada e intente nuevamente.";
            $this->load->view('logueo/ingreso_cliente', $dato);
        }
    }

    //Validar administrador:
    public function validarAdministrador()
    {
        $usuario = $_POST['usuario']; //Obtenemos el usuario ingresado.
        $contraseña = $_POST['contraseña']; //Obtenemos la contraseña ingresada.
        $this->load->model('ModeloLogueo'); //Cargamos el modelo.
        $resultado = $this->ModeloLogueo->validarIngresoAdministrador($usuario, $contraseña); //Validamos los datos ingresados.
        if ($resultado != null) //Si la consulta encontró un administrador con ese usuario y contraseña...
        {
            $this->cargarInicioAdministrador();
        }
        else //Si no hay coincidencia...
        {
            $dato['mensaje_al_administrador'] = "Usuario y/o contraseña incorrectos. Revise la información ingresada e intente nuevamente.";
            $this->load->view('logueo/ingreso_administrador', $dato);
        }
    }

    //Cargar vista del administrador:
    public function cargarInicioAdministrador()
    {
        $this->load->view('administrador/barra_navegacion');
        $this->load->view('administrador/inicio');
    }
    
    //Cargar vistas del cliente:
    public function cargarInicioCliente()
    {
        $this->load->view('cliente/barra_navegacion');
        $this->load->view('cliente-visitante/main_inicio');
        $this->load->view('cliente-visitante/aside');
        $this->load->view('cliente-visitante/footer');
    }
    public function cargarAyudaCliente($tipo_usuario)
    {
        $dato['tipo_usuario'] = $tipo_usuario;
        if ($dato['tipo_usuario'] == 'cliente')
        {
            $this->load->view('cliente/barra_navegacion');
        }
        else if ($dato['tipo_usuario'] == 'visitante')
        {
            $this->load->view('visitante/barra_navegacion');
        }
        $this->load->view('cliente-visitante/main_ayuda');
        $this->load->view('cliente-visitante/footer');
    }

    //Cargar vistas del visitante:
    public function cargarInicioVisitante()
    {
        $this->load->view('visitante/barra_navegacion');
        $this->load->view('cliente-visitante/main_inicio');
        $this->load->view('cliente-visitante/aside');
        $this->load->view('cliente-visitante/footer');
    }
}
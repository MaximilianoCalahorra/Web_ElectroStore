<?php
defined('BASEPATH') OR exit('No direct script access allowed');

///Clase AdministrarSucursal:
class AdministrarSucursal extends CI_Controller
{
    //Agregar:
    public function cargarVistaAgregarSucursal()
    {
        $dato['resultado'] = "";
        $this->load->view('administrador/agregar/agregar_sucursal', $dato);
    }
    public function agregarSucursal()
    {
        $direccion = $_POST['direccion'];
        $dia_horario_atencion = $_POST['dia_horario_atencion'];
        $ruta = '/xampp/htdocs/ElectroStore/assets/imagenes/sucursales/';
        $nombre_imagen = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'],  $ruta.$nombre_imagen);
        $this->load->model('GestionarSucursal');
        $resultado = $this->GestionarSucursal->insertarSucursal($direccion, $dia_horario_atencion, $nombre_imagen);
        if ($resultado == null)
        {
            $dato['tipo_usuario'] = 'Administrador';
            $dato['categoria_cambio'] = 'Sucursal agregada';
            $dato['controlador'] = 'AdministrarSucursal';
            $dato['metodo'] = 'cargarSucursalesAdministrador';
            $this->load->view('administrador/mensaje_resultado', $dato);
        }
        else
        {
            $dato['resultado'] = "La sucursal no pudo ser agregada.";
            $this->load->view('administrador/agregar/agregar_sucursal', $dato);
        }
    }

    //Actualizar:
    public function cambiosALaSucursal($id_sucursal_cambios)
    {
        $tipo_cambio = $_POST['cambiar_sucursal'];
        if ($tipo_cambio == 'modificar')
        {
            $this->cargarVistaInicialModificarSucursal($id_sucursal_cambios);
        }
        else if ($tipo_cambio == 'eliminar')
        {
            $this->eliminarSucursal($id_sucursal_cambios);
        }
    }

    public function cargarVistaInicialModificarSucursal($id_sucursal_modificar)
    {
        $dato['id_sucursal'] = $id_sucursal_modificar;
        $this->load->view('administrador/modificar/sucursal/elegir_tipo_modificacion', $dato);
    }

    public function modificacionALaSucursal($id_sucursal_modificar)
    {
        $tipo_modificacion = $_POST['modificacion_sucursal'];
        $dato['id'] = $id_sucursal_modificar;
        $dato['controlador'] = "AdministrarSucursal";
        $this->load->model('GestionarSucursal');
        $sucursal = $this->GestionarSucursal->getSucursal($id_sucursal_modificar);
        $dato['sucursal'] = $sucursal;
        $dato['select'] = "";
        $dato['resultado'] = "";
        if ($tipo_modificacion == 'direccion')
        {
            $dato['titulo'] = 'Modificando la dirección de la sucursal';
            $dato['metodo'] = 'modificarDireccionSucursal';
            $input = '<input class="input" type="text" name="nueva_direccion" value=';
            $input .= '"';
            $input .= $sucursal->direccion;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input; 
            $this->cargarVistaModificarDireccionSucursal($dato);
        }
        else if ($tipo_modificacion == 'dia_horario_atencion')
        {
            $dato['titulo'] = 'Modificando el día y horario de atención de la sucursal';
            $dato['metodo'] = 'modificarDiaHorarioAtencionSucursal';
            $input = '<input class="input" type="text" name="nuevo_dia_horario_atencion" value=';
            $input .= '"';
            $input .= $sucursal->dia_horario_atencion;
            $input .= '"';
            $input .= "autocomplete='off' required>"; 
            $dato['input'] = $input;  
            $this->cargarVistaModificarDiaHorarioAtencionSucursal($dato);
        }
        else if ($tipo_modificacion == 'imagen')
        {
            $dato['titulo'] = 'Modificando la imagen de la sucursal';
            $dato['metodo'] = 'modificarImagenSucursal';
            $dato['input'] = '<input class="input" type="file" accept="image/*" name="imagen" required>'; 
            $this->cargarVistaModificarImagenSucursal($dato);   
        }
        else if ($tipo_modificacion == 'todo')
        {
            $this->cargarVistaModificarSucursal($dato);
        }
    }

    //Dirección:
    public function cargarVistaModificarDireccionSucursal($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarDireccionSucursal($id_sucursal_modificar)
    {
        $nueva_direccion = $_POST['nueva_direccion'];
        $this->load->model('GestionarSucursal');
        $resultado = $this->GestionarSucursal->actualizarDireccionSucursal($id_sucursal_modificar, $nueva_direccion);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarSucursal';
        $dato['metodo'] = 'cargarSucursalesAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Sucursal modificada en su dirección';
        }
        else
        {
            $dato['categoria_cambio'] = 'La sucursal no pudo ser modificada en su dirección';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Día y horario de atención:
    public function cargarVistaModificarDiaHorarioAtencionSucursal($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarDiaHorarioAtencionSucursal($id_sucursal_modificar)
    {
        $nueva_dia_horario_atencion = $_POST['nuevo_dia_horario_atencion'];
        $this->load->model('GestionarSucursal');
        $resultado = $this->GestionarSucursal->actualizarDiaHorarioAtencionSucursal($id_sucursal_modificar, $nueva_dia_horario_atencion);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarSucursal';
        $dato['metodo'] = 'cargarSucursalesAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Sucursal modificada en su día y horario de atención';
        }
        else
        {
            $dato['categoria_cambio'] = 'La sucursal no pudo ser modificada en su día y horario de atención';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Imagen:
    public function cargarVistaModificarImagenSucursal($dato)
    {
        $this->load->view('administrador/modificar/modificar_campo_unico', $dato);
    }
    public function modificarImagenSucursal($id_sucursal_modificar)
    {
        $ruta = '/xampp/htdocs/ElectroStore/assets/imagenes/sucursales/';
        $nuevo_nombre_imagen = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'],  $ruta.$nuevo_nombre_imagen);
        $this->load->model('GestionarSucursal');
        $resultado = $this->GestionarSucursal->actualizarImagenSucursal($id_sucursal_modificar, $nuevo_nombre_imagen);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarSucursal';
        $dato['metodo'] = 'cargarSucursalesAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Sucursal modificada en su imagen';
        }
        else
        {
            $dato['categoria_cambio'] = 'La sucursal no pudo ser modificada en su imagen';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Sucursal por completo:
    public function cargarVistaModificarSucursal($dato)
    {
        $this->load->view('administrador/modificar/sucursal/modificar_completo', $dato);
    }
    public function modificarSucursal($id_sucursal_modificar)
    {
        $nueva_direccion = $_POST['nueva_direccion'];
        $nuevo_dia_horario_atencion = $_POST['nuevo_dia_horario_atencion'];
        $ruta = '/xampp/htdocs/ElectroStore/assets/imagenes/sucursales/';
        $nuevo_nombre_imagen = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'],  $ruta.$nuevo_nombre_imagen);
        $this->load->model('GestionarSucursal');
        $resultado = $this->GestionarSucursal->actualizarSucursal($id_sucursal_modificar, $nueva_direccion, $nuevo_dia_horario_atencion, $nuevo_nombre_imagen);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarSucursal';
        $dato['metodo'] = 'cargarSucursalesAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Sucursal modificada por completo';
        }
        else
        {
            $dato['categoria_cambio'] = 'La sucursal no pudo ser modificada por completo';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Eliminar:
    public function eliminarSucursal($id_sucursal_eliminar)
    {
        $this->load->model('GestionarSucursal');
        $resultado = $this->GestionarSucursal->removerSucursal($id_sucursal_eliminar);
        $dato['tipo_usuario'] = 'Administrador';
        $dato['controlador'] = 'AdministrarSucursal';
        $dato['metodo'] = 'cargarSucursalesAdministrador';
        if ($resultado == null)
        {
            $dato['categoria_cambio'] = 'Sucursal eliminada';
        }
        else
        {
            $dato['categoria_cambio'] = 'La sucursal no pudo ser eliminada';
        }
        $this->load->view('administrador/mensaje_resultado', $dato);
    }

    //Obtener:
    public function obtenerSucursales()
    {
        $this->load->model('GestionarSucursal');
        $data_sucursales['listado'] = $this->GestionarSucursal->getSucursales();
        return $data_sucursales;
    }

    //Cargar sucursales para el administrador:
    public function cargarSucursalesAdministrador()
    {
        $data_sucursales = $this->obtenerSucursales();
        $this->load->view('administrador/barra_navegacion');
        $this->load->view('administrador/sucursales', $data_sucursales);
    }

    //Cargar sucursales para el cliente:
    public function cargarSucursalesCliente($tipo_usuario)
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
        $data_sucursales = $this->obtenerSucursales();
        $this->load->view('cliente-visitante/main_sucursales', $data_sucursales);
        $this->load->view('cliente-visitante/footer');
    }
}
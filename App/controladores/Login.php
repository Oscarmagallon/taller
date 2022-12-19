<?php
include('mail.php');
class Login extends Controlador
{

    public function __construct()
    {
        $this->loginModelo = $this->modelo('LoginModelo');
    }

    public function index($error = '')
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->datos['usuario'] = trim($_POST['usuario']);
            $this->datos['contra'] = trim($_POST['contra']);
            $usuarioSesion = $this->loginModelo->loginUsu($this->datos['usuario'], $this->datos['contra']);
            if (isset($usuarioSesion) && !empty($usuarioSesion)) {       // si tiene datos el objeto devuelto entramos
                Sesion::crearSesion($usuarioSesion);
                //$this->loginModelo->registroSesion($usuarioSesion->id_usuario);               // registro el login en DDBB

                redireccionar('/');
            } else {
                redireccionar('/login/index/error_1');
            }
        } else {
            if (Sesion::sesionCreada()) {    // si ya estamos logueados redirecciona a la raiz
                redireccionar('/');
            }
            $this->datos['error'] = $error;

            $this->vista('login', $this->datos);
        }
    }


    public function logout()
    {
        Sesion::iniciarSesion($this->datos);        // controlamos si no esta iniciada la sesion y cogemos los datos de la sesion
        //$this->loginModelo->registroFinSesion($this->datos['usuarioSesion']->id_usuario);       // registramos fecha cierre de sesion
        Sesion::cerrarSesion();
        redireccionar('/');
    }

    public function registro()
    {
        $this->vista("cliente/registroCliente", $this->datos);
    }

    public function conocenos(){
        $this->vista('inicios/noLogueado');
    }

    public function tienda(){
        $this->vista("admin/Tienda/indexNoLog",$this->datos);
    }

    public function verArticulos($clase){
        $this->datos['articulos'] = $this->loginModelo->getArticulosTienda($clase);
        $this->vista("admin/Tienda/verArticulo",$this->datos);
    }

    public function registrar()
    {
        $usuarioNuevo = [
            'nombre' => trim($_POST['Nombre']),
            'email' => trim($_POST['Email']),
            'apellido' => trim($_POST['Apellido']),
            'contra' => trim($_POST['contra']),
        ];

        $this->loginModelo->addCliente($usuarioNuevo);
        $id = $this->loginModelo->getId();
        $this->loginModelo->addClienteApp($id->idPersonal);
        $email = $this->loginModelo->getEmail($id->idPersonal);
        $mensaje = "Bienvenido a nuestra aplicacion de taller. Disfruta de todos sus servicios. Un honor contar contigo";
        $cabecera = "Registro";
        enviarEmail($email,$mensaje,$cabecera);
        redireccionar('/Login');
    }
}

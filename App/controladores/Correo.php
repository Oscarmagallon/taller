<?php
include('mail.php');
    class Correo extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [10];
  
           if (!tienePrivilegios($this->datos['usuarioSesion']->Rol_idRol,$this->datos['rolesPermitidos'])) {
                Sesion::cerrarSesion();
                redireccionar('/login');
            }


            $this->CorreoModelo = $this->modelo('CorreoModelo');            
        }


        public function index(){
            $this->datos['personal'] = $this->CorreoModelo->getPersonal();
            $this->vista('admin/correo',$this->datos);
        }

        public function correo(){
            $id =  $_POST['correo'];
            $mensaje =  $_POST['mensaje'];
            $prop = $this->CorreoModelo->getProp($id);
            enviarEmail($prop,$mensaje);
            redireccionar('/Correo');
        }


    }

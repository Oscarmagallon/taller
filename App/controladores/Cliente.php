<?php

    class Cliente extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [20];
  
           if (!tienePrivilegios($this->datos['usuarioSesion']->Rol_idRol,$this->datos['rolesPermitidos'])) {
                Sesion::cerrarSesion();
                redireccionar('/login');
            }


       

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){

            $this->vista('inicios/cliente',$this->datos);

        }


    }

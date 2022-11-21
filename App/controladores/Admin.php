<?php

    class Admin extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [10];
  
           if (!tienePrivilegios($this->datos['usuarioSesion']->Rol_idRol,$this->datos['rolesPermitidos'])) {
                Sesion::cerrarSesion();
                redireccionar('/login');
            }


           $this->AdminModelo = $this->modelo('AdminModelo');

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            $this->datos['peticiones'] = $this->AdminModelo->getNumPeticiones();
            $listas = $this->AdminModelo->getNumListas();
            $this->datos['listas'] = count($listas);
            $this->datos['mecanicos'] = $this->AdminModelo->getMecanicos();
            $this->datos['clientes'] = $this->AdminModelo->getUsuariosLogueados();
            $this->vista('inicios/admin',$this->datos);

        }


    }

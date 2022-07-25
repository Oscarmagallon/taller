<?php

    class Inicio extends Controlador{

        public function __construct(){
        }
    
        public function index(){
            if (Sesion::sesionCreada($this->datos)){
                

                switch ($this->datos['usuarioSesion']->Rol_idRol) {
                    case 10:
                        redireccionar('/Admin');
                        break;
                    case 20:
                        redireccionar('/Cliente');
                        break;
                }

            } else {
                redireccionar('/login');
            }
        }

    }

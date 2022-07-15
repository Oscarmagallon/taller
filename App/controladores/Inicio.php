<?php

    class Inicio extends Controlador{

        public function __construct(){

        }

        public function index(){
            if (Sesion::sesionCreada($this->datos)){
                print_r($this->datos);
                if ($this->datos['usuarioSesion']->Rol_idRol==10) {
                    $this->vista('inicios/admin',$this->datos);
                }elseif ($this->datos['usuarioSesion']->Rol_idRol==20){
                    $this->vista('inicios/cliente',$this->datos);
                }elseif ($this->datos['usuarioSesion']->Rol_idRol==1){
                    $this->vista('inicios/socio',$this->datos);
                }elseif ($this->datos['usuarioSesion']->Rol_idRol==5){
                    $this->vista('inicios/entrenador',$this->datos);
                }elseif ($this->datos['usuarioSesion']->Rol_idRol==100){
                    $this->vista('inicios/tienda',$this->datos);
                }
                /* $this->vista('inicio',$this->datos); */
            } else {
                $this->vista('inicio_no_logueado');
            }
        }

    }

<?php

    class Tienda extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->TiendaModelo = $this->modelo('TiendaModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
           $this->vista("admin/Tienda/index",$this->datos);
            
            }
        }

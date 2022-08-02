<?php

    class Pagos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->PagosModelo = $this->modelo('PagosModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            
            }
            



    }
?>

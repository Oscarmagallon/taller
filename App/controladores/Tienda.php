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

        public function verArticulos($clase){
            $this->datos['articulos'] = $this->TiendaModelo->getArticulos($clase);
            $this->vista("admin/Tienda/verArticulo", $this->datos);
        }

        public function getArticulos(){
            $cod= $_POST['id'];
            $dato['datos'] = $_POST['dat'];
            $dato['Carrito'][0] = $this->datos['Carrito'] = $this->TiendaModelo->getArticulo($cod);
        
            $this->vistaApi($dato); 

        }
        
        public function carrito(){
            $datos = $_POST;

            $this->vistaApi($datos);
        }



    }
?>

<?php

    class Piezas extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->PiezasModelo = $this->modelo('PiezasModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index($id){
            $this->datos['Piezas'] = $this->PiezasModelo->getPiezas();
            $this->datos['Peticiones'] = $this->PiezasModelo->getPeticiones($id);
            $this->vista("admin/addPiezas", $this->datos);
            
            }

        public function add(){
            $datos = $_POST;
            //rellenar datos Pieza, ingreso.
        }
            



    }
?>

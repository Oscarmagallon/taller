<?php

    class MotosListas extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->MotosListasModelo = $this->modelo('MotosListasModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            $this->datos['Listas'] = $this->MotosListasModelo->MotosListas();


            $this->vista("Admin/MotosListas",$this->datos);
            
            }
            



    }
?>

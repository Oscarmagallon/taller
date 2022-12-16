<?php

    class MotosListas extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->MotosListasModelo = $this->modelo('MotosListasModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            $this->datos['Listas'] = $this->MotosListasModelo->MotosListas();
            $articulos = [];
            $i = 0;
            foreach ($this->datos['Listas'] as $in) {
                $articulos[] = $in->idIncidencias;
            }
            $this->datos['descr'] = $this->MotosListasModelo->getDescr();
            $this->datos['nums'] = [];
            foreach( $this->datos['descr'] as $d){
                array_push($this->datos['nums'], (int)$d->idIncidencias);
            }
            $this->vista("Admin/MotosListas",$this->datos);
            
            }
            



    }

<?php

    class Peticiones extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->PeticionModelo = $this->modelo('PeticionModelo');

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            $idPropietario = $this->PeticionModelo->getId($this->datos["usuarioSesion"]->idPersonal);
            $motos = $this->PeticionModelo->getMotos($idPropietario->idPropietario);
            $this->datos["Motos"] = $motos;
            $this->vista('cliente/peticion',$this->datos);

        }

        public function verPeticiones(){
        $this->datos['Peticiones'] = $this->PeticionModelo->getPeticiones();
        $this->datos['Mecanicos'] = $this->PeticionModelo->getMecanicos();
        $this->vista('admin/peticiones',$this->datos);
        }

        public function anadirMecanico(){
            $mecanico = $_POST['mecanico'];
            print_r($mecanico); 
        
       }


    }
?>

<?php

    class Peticiones extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->PeticionModelo = $this->modelo('PeticionModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            if($this->datos['usuarioSesion']->Rol_idRol == 20){
            $idPropietario = $this->PeticionModelo->getId($this->datos["usuarioSesion"]->idPersonal);
            $motos = $this->PeticionModelo->getMotos($idPropietario->idPropietario);
            $this->datos["Motos"] = $motos;
            $this->vista('cliente/peticion',$this->datos);
            }
            redireccionar("/Peticiones/verPeticiones");
        }

        public function verPeticiones(){
        $this->datos['Peticiones'] = $this->PeticionModelo->getPeticiones();
        $this->datos['Mecanicos'] = $this->PeticionModelo->getMecanicos();
        $this->vista('admin/peticiones',$this->datos);
        }

     
        public function anadirMecanico($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $mecanico = $_POST['mecanico'];
                $this->datos['peticion'] = $this->PeticionModelo->addMecanico($id,$mecanico);
                redireccionar("/Peticiones/verPeticiones");


            } else {
                $this->datos['peticion'] = $this->PeticionModelo->getPeticion($id);
                $this->datos['Mecanicos'] = $this->PeticionModelo->getMecanicos();
                $this->vista('admin/addMecanico', $this->datos);
            }
        }



    }
?>
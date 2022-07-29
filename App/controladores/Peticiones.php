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
            }else{
                redireccionar("/Peticiones/verPeticiones");
            }
            
        }

        public function verPeticiones(){
        
        $this->datos['Peticiones'] = $this->PeticionModelo->getPeticiones();
        $this->datos['Mecanicos'] = $this->PeticionModelo->getMecanicos();
        $this->vista('admin/peticiones',$this->datos);
        }

        public function verPeticionesProgreso(){
            $this->datos['Peticiones'] = $this->PeticionModelo->getPeticiones();
            $this->vista('admin/peticionesEnProgreso',$this->datos);
            }

        public function peticionTerminada($id,$meca,$fecha){
           $this->PeticionModelo->insertarReparacion($fecha);
           $ids = $this->PeticionModelo->getIdReparacion();
           $idReparacion = $ids->idReparaciones;
           $this->PeticionModelo->rellenarIncidencia($id,$idReparacion);
           $this->PeticionModelo->mecanicoRepara($meca,$idReparacion);
           redireccionar("/Peticiones/verPeticionesProgreso");

        }

       

     
        public function anadirMecanico($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $mecanico = $_POST['mecanico'];
                $this->datos['peticion'] = $this->PeticionModelo->addMecanico($id,$mecanico);
                redireccionar("/Peticiones");


            } else {
                $this->datos['peticion'] = $this->PeticionModelo->getPeticion($id);
                $this->datos['Mecanicos'] = $this->PeticionModelo->getMecanicos();
                $this->vista('admin/addMecanico', $this->datos);
            }
        }

        public function eliminarPeticion($id){
            $this->PeticionModelo ->eliminarPeticionMoto($id);
            $this->PeticionModelo ->eliminarPeticionIncidencias($id);
            redireccionar("/Peticiones");

        }



    }
?>

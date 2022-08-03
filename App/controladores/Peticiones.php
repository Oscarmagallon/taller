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

        public function elegirMoto(){
            $idPropietario = $this->PeticionModelo->getId($this->datos["usuarioSesion"]->idPersonal);
            $motos = $this->PeticionModelo->getMotos($idPropietario->idPropietario);
            $this->datos["Motos"] = $motos;
            $this->vista('admin/elegirMoto',$this->datos);
        }

        public function verPeticiones(){
        
        $this->datos['Peticiones'] = $this->PeticionModelo->getPeticiones();
        $this->datos['Mecanicos'] = $this->PeticionModelo->getMecanicos();
        $this->vista('admin/peticiones',$this->datos);
        }

        public function verPeticionesProgreso(){
            $this->datos['Peticiones'] = $this->PeticionModelo->getPeticionesReparaciones();
            //cargar esto en modelo y llevarlo a peticiones en progreso
            //SELECT reparaciones.idreparaciones,incidencias.idIncidencias, incidencias.Tipo, incidencias.Descripcion FROM reparaciones INNER JOIN incidencias ON incidencias.idreparaciones = reparaciones.idreparaciones;
            $this->vista('admin/peticionesEnProgreso',$this->datos);
            }

        public function peticionTerminada($meca,$id){
           
           $ids = $this->PeticionModelo->getIdReparacion();
           //hay que pasarsela de la pestaña peticiones en progreso.
           $idReparacion = $ids->idReparaciones;
           $this->PeticionModelo->mecanicoRepara($meca,$idReparacion);
            $this->PeticionModelo->terminada($id);
           redireccionar("/Peticiones/verPeticionesProgreso");

        }

       

     
        public function anadirMecanico($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $mecanico = $_POST['mecanico'];
                $fecha = $_POST['fecha'];
                $this->datos['peticion'] = $this->PeticionModelo->addMecanico($id,$mecanico);
                $this->PeticionModelo->insertarReparacion($fecha);
                $ids = $this->PeticionModelo->getIdReparacion();
                $idReparacion = $ids->idReparaciones;
                $this->PeticionModelo->reparaciones($id,$idReparacion);
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

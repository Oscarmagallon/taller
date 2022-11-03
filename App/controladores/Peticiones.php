<?php
include ('mail.php');
    class Peticiones extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->PeticionModelo = $this->modelo('PeticionModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            //print_r($this->datos['usuarioSesion']);
            if($this->datos['usuarioSesion']->Rol_idRol == 20){
            $idPersonal = $this->datos['usuarioSesion']->idPersonal;
            $codProp = $this->PeticionModelo->getProp($idPersonal);
            if(!empty($codProp->idPropietario)){
                $motos = $this->PeticionModelo->getMotosCliente($codProp->idPropietario);
            $this->datos["Motos"] = $motos;
            $this->vista('cliente/peticion',$this->datos);
            }else{
                echo "No posees motos";
            }
           
            
            }else{
                redireccionar("/Peticiones/elegirMoto");
            }
            
        }

        public function elegirMoto(){
            $motos = $this->PeticionModelo->getMotos();
            $this->datos["Motos"] = $motos;
            $this->datos['Peticiones'] = $this->PeticionModelo->getPeticionesMoto();
            $this->vista('admin/elegirMoto',$this->datos);
        }

        public function verPeticiones($id){
        
        $this->datos['Peticiones'] = $this->PeticionModelo->getPeticiones($id);
        $this->datos['Mecanicos'] = $this->PeticionModelo->getMecanicos();
        $this->vista('admin/peticiones',$this->datos);
        }

        public function verPeticionesProgreso($id){
            $this->datos['Peticiones'] = $this->PeticionModelo->getPeticionesReparaciones($id);
            //cargar esto en modelo y llevarlo a peticiones en progreso
            //SELECT reparaciones.idreparaciones,incidencias.idIncidencias, incidencias.Tipo, incidencias.Descripcion FROM reparaciones INNER JOIN incidencias ON incidencias.idreparaciones = reparaciones.idreparaciones;
            $this->vista('admin/peticionesEnProgreso',$this->datos);
            }

        public function peticionTerminada($meca,$id,$idMoto){
           
           $ids = $this->PeticionModelo->getIdReparacion();
           $idReparacion = $ids->idReparaciones;
           $this->PeticionModelo->mecanicoRepara($meca,$idReparacion);
            $this->PeticionModelo->terminada($id);
            $this->datos['Prop'] = $this->PeticionModelo->getPropietario($idMoto);
            enviarEmail($this->datos['Prop']);
            redireccionar("/Peticiones/verPeticionesProgreso/$idMoto");

        }

       

     
        public function anadirMecanico($id,$idMoto){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $mecanico = $_POST['mecanico'];
                $fecha = $_POST['fecha'];
                $this->datos['peticion'] = $this->PeticionModelo->addMecanico($id,$mecanico);
                $this->PeticionModelo->insertarReparacion($fecha);
                $ids = $this->PeticionModelo->getIdReparacion();
                $idReparacion = $ids->idReparaciones;
                $this->PeticionModelo->reparaciones($id,$idReparacion);
                redireccionar("/Peticiones/verPeticiones/$idMoto");


            } else {
                $this->datos['idMoto'] = $idMoto;
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

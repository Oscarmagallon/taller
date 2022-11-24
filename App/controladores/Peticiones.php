<?php
include ('mail.php');
include('Log.php');
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
                $this->vista('cliente/peticion',$this->datos);
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
            $mensaje = "Buenas su moto esta lista, entre en la web para ver los detalles";
            enviarEmail($this->datos['Prop'],$mensaje);
            $txt ="Correo de aviso moto lista enviado a ".$this->datos['Prop'][0]->Nombre. " ".$this->datos['Prop'][0]->Apellido;
            enviarLog($txt);
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
            $this->datos['Prop'] = $this->PeticionModelo->propietario($id);
            $mensaje = "La petición de su moto a sido rechazada, puede volver a mandar otra peticion en cualquier momento";
            enviarEmail($this->datos['Prop'],$mensaje);
            redireccionar("/Peticiones");
//SELECT personal.Nombre, personal.Correo from incidencias INNER JOIN moto_has_incidencias on incidencias.idIncidencias = moto_has_incidencias.idIncidencias INNER JOIN moto on moto.idMoto = moto_has_incidencias.idMoto inner join propietario on moto.idPropietario = propietario.idPropietario INNER JOIN cliente on cliente.idPropietario = propietario.idPropietario inner join personal on cliente.idPersonal = personal.idPersonal where incidencias.idIncidencias=4;
        }



    }

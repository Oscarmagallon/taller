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
            if($this->datos['usuarioSesion']->Rol_idRol == 20){
            $idPersonal = $this->datos['usuarioSesion']->idPersonal;
            $codProp = $this->PeticionModelo->getProp($idPersonal);
            if(!empty($codProp->idPropietario)){
                $motos = $this->PeticionModelo->getMotosCliente($codProp->idPropietario);
            $this->datos["Motos"] = $motos;
            $this->datos['Propietario'] = $codProp->idPropietario;
            $this->vista('cliente/peticion',$this->datos);
            }else{ 
                $this->datos['Propietario'] = $codProp->idPropietario;
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
            $this->datos['Pet'] = $this->PeticionModelo->getPeticioness();
            $this->datos['nums'] =[];
            foreach( $this->datos['Pet'] as $e){
                array_push($this->datos['nums'],(int)$e->idMoto);
            
            }
            $this->vista('admin/elegirMoto',$this->datos);
        }

        public function motosConIncidencia(){
            $this->datos["Peticiones"] = $this->PeticionModelo->getMotosIncidencia();
            $this->vista('admin/elegirMotoIncidencia',$this->datos);
        }

        public function verHistorial ($id){
            $this->datos['historial'] = $this->PeticionModelo->getHistorial($id);
            $this->datos['moto'] = $this->PeticionModelo->getMoto($id);
            $this->vista('admin/historial', $this->datos);
        }


        public function verPeticiones($id){
        
        $this->datos['Peticiones'] = $this->PeticionModelo->getPeticiones($id);
        $this->datos['Mecanicos'] = $this->PeticionModelo->getMecanicos();
        $this->datos['moto'] = $this->PeticionModelo->getMoto($id);
        $this->vista('admin/peticiones',$this->datos);
        }

        public function verPeticionesProgreso($id){
            $this->datos['Peticiones'] = $this->PeticionModelo->getPeticionesReparaciones($id);
            $this->datos['moto'] = $this->PeticionModelo->getMoto($id);
            $this->vista('admin/peticionesEnProgreso',$this->datos);
            }

        public function peticionTerminada($meca,$id,$idMoto){
            $ids = $this->PeticionModelo->getIdReparacion();
            $idReparacion = $ids->idReparaciones;
            $this->PeticionModelo->mecanicoRepara($meca,$idReparacion);
            $this->PeticionModelo->terminada($id);
            $this->datos['Prop'] = $this->PeticionModelo->getPropietario($idMoto);
            $mensaje = "Buenas su moto esta lista, entre en la web para ver los detalles";
            $cabecera = "Reparacion";
            enviarEmail($this->datos['Prop'],$mensaje, $cabecera);
            $txt ="Correo de aviso moto lista enviado a ".$this->datos['Prop'][0]->Nombre. " ".$this->datos['Prop'][0]->Apellido;
            enviarLog($txt);
            redireccionar("/Peticiones/verPeticionesProgreso/$idMoto");

        }

       

     
        public function anadirMecanico($id,$idMoto){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $fecha =  date('Y/m/d');
                $this->PeticionModelo->insertarReparacion($fecha);
                $mecanico = $_POST['mecanico'];
                $this->datos['peticion'] = $this->PeticionModelo->addMecanico($id,$mecanico);
                $ids = $this->PeticionModelo->getIdReparacion();
                $idReparacion = $ids->idReparaciones;
                $this->PeticionModelo->reparaciones($id,$idReparacion);
                redireccionar("/Peticiones/verPeticiones/$idMoto");


            } else {
                $this->datos['idMoto'] = $idMoto;
                $this->datos['peticion'] = $this->PeticionModelo->getPeticion($id);
                $this->datos['Mecanicos'] = $this->PeticionModelo->getMecanicos();
                $this->datos['NoDisp'] = $this->PeticionModelo->getNoDisponibles();
                $this->datos['Disponibles'] = [];
                $this->datos['Bueno'] = [];
                $this->datos['MecanicosDisponibles']=[];
                foreach($this->datos['NoDisp'] as $d){  
                    array_push($this->datos['Disponibles'], (int)$d->idPersonal);   
                }
                foreach($this->datos['Mecanicos'] as $m){
                     if(in_array($m->idPersonal, $this->datos["Disponibles"])){
                        
                     }else{
                        array_push($this->datos['Bueno'], (int)$m->idPersonal);
                     }
                }
                foreach($this->datos['Bueno'] as $b){
                    
                    $mecanico= $this->PeticionModelo->getMecanicosDisponiblesAhora($b);
                    array_push($this->datos['MecanicosDisponibles'], $mecanico[0]);
                }
                $this->vista('admin/addMecanico', $this->datos);
            }
        }

        public function eliminarPeticion($id){
            $this->PeticionModelo ->eliminarPeticionMoto($id);
            $this->PeticionModelo ->eliminarPeticionIncidencias($id);
            $this->datos['Prop'] = $this->PeticionModelo->propietario($id);
            $mensaje = "La petición de su moto a sido rechazada, puede volver a mandar otra peticion en cualquier momento";
            $cabecera = "Reparacion";
            enviarEmail($this->datos['Prop'],$mensaje, $cabecera);
            redireccionar("/Peticiones");
        }



    }

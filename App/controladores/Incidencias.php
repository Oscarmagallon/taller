<?php

    class Incidencias extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [10];
  


           $this->IncidenciasModelo = $this->modelo('IncidenciasModelo');

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index($id){
            $this->datos["id"] = $id;
            $this->datos["moto"] = $this->IncidenciasModelo->getMoto($id);
            $this->vista('cliente/incidencias',$this->datos);

        }

        public function peticion(){
            $peticion = [
                'Tipo' => trim($_POST['tipo']),
                'descr' => trim($_POST['descr']),
                'fecha' => date('d/m/Y'),
                'id' =>trim($_POST['idMoto'])
            ];
            $idMoto = $peticion['id'];
            $this->IncidenciasModelo->peticionIncidencia($peticion);
            $idIncidencia = $this->IncidenciasModelo->cogerUltimaId();
            $idInciden = $idIncidencia->idIncidencias;
            $this->IncidenciasModelo->MotoIncidencia($idInciden,$idMoto);
            redireccionar("/Peticiones");
        }

        public function verEstado($id){
            $ids = $this->IncidenciasModelo->verEstado($id);
            for ($i=0; $i <sizeof($ids) ; $i++) { 
                $estado[$i] = $this->IncidenciasModelo->estado($ids[$i]->idIncidencias);
            }
            $this->datos['id'] = $id;
            $i=0;
            if(!empty($estado)){
            foreach($estado as $e){
                
                if(!empty($e)){
                    $this->datos['Estado'][$i] = $e;
                }
                $i++;
            }}

            $ids = $this->IncidenciasModelo->verEstado($id);
            $this->datos['moto'] = $this->IncidenciasModelo->getMoto($id);
            for ($i=0; $i <sizeof($ids) ; $i++) { 
                $estado[$i] = $this->IncidenciasModelo->estadoTerminado($ids[$i]->idIncidencias);
            };
            $i=0;
            if(!empty($estado)){
            foreach($estado as $e){
                
                if(!empty($e)){
                    $this->datos['EstadoTerminado'][$i] = $e;
                }
                $i++;
            }}
                $this->vista("cliente/estado",$this->datos);
           
        
        

        }


    }

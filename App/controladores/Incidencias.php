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
           $this->vista('cliente/incidencias',$this->datos);

        }

        public function peticion(){
            $peticion = [
                'Tipo' => trim($_POST['tipo']),
                'descr' => trim($_POST['descr']),
                'fecha' =>trim($_POST['fecha']),
                'id' =>trim($_POST['idMoto'])
            ];
            $idMoto = $peticion['id'];
            print_r($peticion);
            $this->IncidenciasModelo->peticionIncidencia($peticion);
            $idIncidencia = $this->IncidenciasModelo->cogerUltimaId();
            $idInciden = $idIncidencia->idIncidencias;
            $this->IncidenciasModelo->MotoIncidencia($idInciden,$idMoto);
            redireccionar("/Peticiones");
        }

        public function verEstado($id){
            $ids = $this->IncidenciasModelo->verEstado($id);
            for ($i=0; $i <sizeof($ids) ; $i++) { 
                $this->datos['Estado'][$i] = $this->IncidenciasModelo->estado($ids[$i]->idIncidencias);
            }
            $this->datos['id'] = $id;
            if(!empty($this->datos['Estado'])){
                $this->vista("cliente/estado",$this->datos);
            }else{
                echo "<script>";
                echo "alert('No hay Incidencias')";
                echo "</script>";
        
                echo "<a href='../../Peticiones'>atras</a>";
            }
        
        

        }


    }
?>

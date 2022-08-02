<?php

    class PeticionModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }
        
        public function getId($id){
            $this->db->query("SELECT idPropietario from cliente where idPersonal = :id");
            $this->db->bind(':id',$id);
            return $this->db->registro();
        }

        public function getMotos($idp){
            $this->db->query("SELECT * from moto where idPropietario = $idp");
            return $this->db->registros();
        }

        public function getPeticiones(){
            $this->db->query("SELECT * from incidencias");
            return $this->db->registros();
        }

        public function getPeticion($id){
            $this->db->query("SELECT * from incidencias where idIncidencias = $id");
            return $this->db->registros();
        }

        public function getMecanicos(){
            $this->db->query("SELECT Nombre, Apellido, idPersonal from personal where Rol_idRol = 30");
            return $this->db->registros();
        }

        public function addMecanico($id,$meca){
           // $this->db->query("INSERT INTO incidencias(idPersonal)
                                //values($meca) where idIncidencias = $id");
                    $this->db->query("UPDATE incidencias SET idPersonal = $meca WHERE idIncidencias = $id;");
                    $this->db->execute();
        }

        public function eliminarPeticionMoto($id){
            $this->db->query("DELETE from  moto_has_incidencias where idIncidencias = $id");
            $this->db->execute();

        }

        public function eliminarPeticionIncidencias($id){
            $this->db->query("DELETE from  incidencias where idIncidencias = $id");
            $this->db->execute();

        }

        public function insertarReparacion($fecha){
            $today = date('Y/m/d');
            $this->db->query("INSERT into reparaciones values (null, '$today', '$fecha')");
            $this->db->execute();
        }

        public function reparaciones($id,$reparacion){
            $this->db->query("UPDATE incidencias set idreparaciones = $reparacion where idIncidencias = $id");
            $this->db->execute();
        }

        public function getIdReparacion(){
            $this->db->query("SELECT max(idReparaciones) as idReparaciones FROM reparaciones;");
            return $this->db->registro();
        }
        public function mecanicoRepara($meca,$id){
           //$idmeca = intval ($meca);
            $this->db->query("INSERT into mecanico_has_reparaciones values ($meca, $id)");
            $this->db->execute();   
        }

        public function terminada($id){
            $this->db->query("UPDATE incidencias set Terminado = 1 where idIncidencias = $id");
            $this->db->execute();

        }

    }

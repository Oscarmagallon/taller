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


    }

<?php

    class CorreoModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

    
        public function getPersonal(){
            $this->db->query('SELECT Nombre, Apellido, Correo, idPersonal from Personal where rol_idRol <> 10');
            return $this->db->registros();
        }

        public function getProp($id){
            $this->db->query('SELECT Correo, Nombre from Personal where idPersonal = :id');
            $this->db->bind(':id', $id);
            return $this->db->registros();

        }
    
    }
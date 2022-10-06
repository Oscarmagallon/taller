<?php

    class MecanicoModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function crearMecanico($mecanico){
            $this->db->query("INSERT into Personal (Nombre, Apellido,Rol_idRol, Correo)
                                    values(:nombre, :apellido, 30, :correo)");

            $this->db->bind(':nombre', $mecanico['nombre']);
            $this->db->bind(':apellido', $mecanico['apellido']);
            $this->db->bind(':correo', $mecanico['email']);

            $this->db->execute();
        }

        public function getId(){
            $this->db->query("SELECT idPersonal from Personal order by idPersonal desc limit 1");
            return $this->db->registro();
        }

        public function tablaMecanico($id){
            $this->db->query("INSERT INTO mecanico values ($id)");
            $this->db->execute();
        }

    }
?>
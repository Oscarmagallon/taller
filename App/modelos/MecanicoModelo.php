<?php

    class MecanicoModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getMecanicos(){
            $this->db->query("SELECT personal.Nombre,personal.idPersonal, personal.Apellido, personal.Correo FROM mecanico INNER JOIN personal on personal.idPersonal = mecanico.idMecanico;");
            return $this->db->registros();
        }

        public function getMecanico($id){
            $this->db->query('SELECT * from personal where idPersonal = :id');
            $this->db->bind(':id',$id);
            return $this->db->registro();
        }
        

        public function deleteMecan($id){
            $this->db->query('DELETE from personal where idPersonal = :id');
            $this->db->bind(':id',$id);
            $this->db->execute();
        }

        public function borrarMecan($id){
            $this->db->query('DELETE from mecanico where idMecanico = :id');
            $this->db->bind(':id',$id);
            $this->db->execute();

        }

        public function editMecanico($mecanico){
            $this->db->query('UPDATE personal set Nombre = :Nombre, Apellido = :Apellido, Correo = :Correo where idPersonal = :id');
            $this->db->bind(':Nombre', $mecanico['nombre']);
            $this->db->bind(':Apellido', $mecanico['apellido']);
            $this->db->bind(':Correo', $mecanico['email']);
            $this->db->bind(':id', $mecanico['id_usuario']);
            $this->db->execute();
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
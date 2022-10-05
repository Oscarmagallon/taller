<?php

    class MotosModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getIdProp($id){
            $this->db->query("SELECT idPropietario from cliente where idPersonal = $id;");
            return $this->db->registro();
        }

        public function addPropietario($nombre, $apellido){
            $this->db->query("INSERT into propietario (idPropietario, Correo, Nombre, Apellido)
                                      values(null, null, '$nombre', '$apellido')");
            $this->db->execute();
        }

        public function getIdPropadd(){
            $this->db->query("SELECT idPropietario FROM propietario ORDER BY idPropietario DESC LIMIT 1");
            return $this->db->registro();

        }

        public function vincularProp($id,$idPersonal){
            $this->db->query("UPDATE cliente set idPropietario = $id where idPersonal = $idPersonal ");
            $this->db->execute();
        }

        public function addMoto($moto){
            $this->db->query("INSERT into moto (idMoto, Marca, Modelo, idPropietario)
                                            values(null, :marca, :modelo, :prop)");
            $this->db->bind(":marca", $moto['Marca']);
            $this->db->bind(":modelo", $moto['Modelo']);
            $this->db->bind(":prop", $moto['idProp']);

            $this->db->execute();


        }


        
       
    }

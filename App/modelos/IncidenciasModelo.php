<?php

    class IncidenciasModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function peticionIncidencia($peticion){ 
            $this->db->query("INSERT into incidencias (idIncidencias,Tipo,Descripcion,Fecha)
                                            values(null, :tipo,:descr,:fecha);" );
            $this->db->bind(':tipo', $peticion['Tipo']);
            $this->db->bind(':descr', $peticion['descr']);
            $this->db->bind(':fecha', $peticion['fecha']);
            $this->db->execute();
            
    }

    public function cogerUltimaId(){
        $this->db->query("SELECT max(idIncidencias) as idIncidencias FROM incidencias;");
        return $this->db->registro();

    }
    public function MotoIncidencia($incidencia,$moto){
        $this->db->query("INSERT into moto_has_incidencias values($moto,$incidencia);" );
        $this->db->execute();

    }

    public function verEstado($id){
        $this->db->query("SELECT idIncidencias FROM moto_has_incidencias where idMoto = $id;");
        return $this->db->registros();

    }

    public function estado($id){
        $this->db->query("SELECT * FROM incidencias where idIncidencias = $id;");
        return $this->db->registros();
    }
}
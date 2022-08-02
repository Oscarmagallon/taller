<?php

    class PiezasModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getPiezas(){
            $this->db->query("SELECT * FROM articulos");
            return $this->db->registros();
        }

        public function getPeticiones($id){
            $this->db->query("SELECT incidencias.Terminado,incidencias.Fecha,incidencias.idPersonal,reparaciones.idreparaciones,incidencias.idIncidencias, incidencias.Tipo, incidencias.Descripcion FROM reparaciones INNER JOIN incidencias ON incidencias.idreparaciones = reparaciones.idreparaciones WHERE incidencias.idIncidencias = $id");
            return $this->db->registros();
        }


        
       
    }

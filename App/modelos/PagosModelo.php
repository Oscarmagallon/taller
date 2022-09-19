<?php

    class PagosModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getPagos($id){
            $this->db->query("SELECT pieza.idArticulos FROM pieza INNER JOIN reparaciones on reparaciones.idreparaciones = pieza.idreparaciones INNER JOIN incidencias on incidencias.idreparaciones = reparaciones.idreparaciones where incidencias.idIncidencias = $id;");
            return $this->db->registros();
        }
        
       
    }

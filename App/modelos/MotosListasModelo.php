<?php

    class MotosListasModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function MotosListas(){
            $this->db->query("SELECT incidencias.Tipo,incidencias.Terminado, incidencias.Descripcion,moto.Marca, moto.Modelo 
                              FROM incidencias INNER JOIN moto_has_incidencias 
                              ON incidencias.idIncidencias = moto_has_incidencias.idIncidencias 
                              INNER JOIN moto on moto_has_incidencias.idMoto = moto.idMoto;");
            return $this->db->registros();
        }


        
       
    }

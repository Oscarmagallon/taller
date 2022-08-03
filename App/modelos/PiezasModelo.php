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

        public function getPrecio($pieza){
            $this->db->query("SELECT Precio , Tipo from articulos where idArticulos = $pieza");
            return $this->db->registros();
        }

        public function addPieza($id,$reparaciones,$precio){
            $this->db->query("INSERT into pieza values($reparaciones, $id, $precio)");
            $this->db->execute();
        }

        public function ingreso($Tipo,$precio,$reparaciones){
            $this->db->query("INSERT into ingreso (idIngreso, Descr, Ingreso, reparaciones_idreparaciones)
                                    values(null, '$Tipo', $precio, $reparaciones)");
            $this->db->execute();
        }


        
       
    }

<?php

    class PagosModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getPagos($id){
            $this->db->query("SELECT pieza.idArticulos,articulos.Tipo,articulos.descr,pieza.Costo FROM articulos INNER JOIN pieza on pieza.idArticulos = articulos.IdArticulos INNER JOIN reparaciones on reparaciones.idreparaciones = pieza.idreparaciones INNER JOIN incidencias on incidencias.idreparaciones = reparaciones.idreparaciones where incidencias.idIncidencias = $id;");
            return $this->db->registros();
        }
        
        public function addManObra($id,$manoObra){
            $this->db->query("INSERT into ingreso (idIngreso,Descr,Ingreso,reparaciones_idreparaciones,Pagado)
                                                    values(null,'Mano Obra',$manoObra,$id,0)");
            $this->db->execute();
        }

        public function getReparaciones($id){
            $this->db->query("SELECT * From ingreso where reparaciones_idreparaciones = $id");
            return $this->db->registros();
        }

    }

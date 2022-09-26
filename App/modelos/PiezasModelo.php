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

        public function vendido($id){
            $this->db->query("UPDATE articulos set Vendido = 1 where idArticulos = $id");
            $this->db->execute();
        }

        public function piezasMoto($id){
            $this->db->query("SELECT idArticulos from pieza INNER JOIN reparaciones on pieza.idreparaciones = reparaciones.idreparaciones INNER JOIN incidencias ON reparaciones.idreparaciones = incidencias.idreparaciones INNER JOIN moto_has_incidencias on moto_has_incidencias.idIncidencias = incidencias.idIncidencias INNER JOIN moto on moto_has_incidencias.idMoto = moto.idMoto WHERE moto.idMoto =$id;");
            return $this->db->registros();
        }

        public function getPiezasMoto($id){
            $this->db->query("select Ingreso.reparaciones_idreparaciones from incidencias inner join reparaciones on incidencias.idreparaciones = reparaciones.idreparaciones inner join Ingreso on reparaciones.idreparaciones = Ingreso.reparaciones_idreparaciones where incidencias.idIncidencias = '$id'");
            return $this->db->registros();
        }

        public function getPiezasConId($ids){
            if(!empty($ids)){
                foreach($ids as $i){
                    $this->db->query("SELECT articulos.idArticulos,articulos.Precio, articulos.Tipo, articulos.descr from reparaciones inner JOIN pieza ON reparaciones.idreparaciones = pieza.idreparaciones inner join articulos on pieza.idArticulos = articulos.idArticulos where reparaciones.idreparaciones = $i->reparaciones_idreparaciones ");
                    return  $this->db->registros();
                };
                
            }
            //$this->db->query("select articulos.idArticulos, articulos.Tipo, articulos.descr from reparaciones inner JOIN pieza ON reparaciones.idreparaciones = pieza.idreparaciones inner join articulos on pieza.idArticulos = articulos.idArticulos where reparaciones.idreparaciones = $ids");
        }

        public function getReparacion($id){
            $this->db->query("SELECT idreparaciones from pieza where idArticulos = $id");
            return $this->db->registro();
        }

        public function borrarPieza($id){
            $this->db->query("DELETE from pieza where idArticulos = $id");
            $this->db->execute();
        }

        public function borrarPiezaIngreso($tipo,$precio,$idReparacion){
            $this->db->query("DELETE from ingreso where reparaciones_idreparaciones = $idReparacion and Ingreso = $precio and Descr = '$tipo'");
            $this->db->execute();
        }

        public function piezaDisponible($id){
            $this->db->query("UPDATE articulos SET Vendido = 0 WHERE idArticulos = $id");
            $this->db->execute();

        }

        
       
    }

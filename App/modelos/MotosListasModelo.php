<?php

    class MotosListasModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function MotosListas(){
            $this->db->query("SELECT incidencias.idIncidencias,Ingreso.Descr,incidencias.Tipo,incidencias.Terminado,reparaciones.idreparaciones, incidencias.Descripcion,moto.Marca, moto.Modelo FROM moto INNER JOIN moto_has_incidencias on moto.idMoto = moto_has_incidencias.idMoto INNER JOIN incidencias on moto_has_incidencias.idIncidencias = incidencias.idIncidencias inner join reparaciones on reparaciones.idreparaciones = incidencias.idreparaciones inner join ingreso on ingreso.reparaciones_idreparaciones = reparaciones.idreparaciones where ingreso.Pagado = 0 or Ingreso.Descr not in ('Mano Obra') GROUP by incidencias.idIncidencias;");
            return $this->db->registros();
        }


        
    
    }

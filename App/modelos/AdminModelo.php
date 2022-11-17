<?php

    class AdminModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

    
        public function getNumPeticiones(){
            $this->db->query("SELECT count(idIncidencias) as numIncidencias from incidencias where Terminado = 0");
            return $this->db->registro();
        }

        public function getNumListas(){
            $this->db->query("SELECT count(incidencias.idIncidencias) as numIncidencias FROM moto INNER JOIN moto_has_incidencias on moto.idMoto = moto_has_incidencias.idMoto INNER JOIN incidencias on moto_has_incidencias.idIncidencias = incidencias.idIncidencias INNER JOIN reparaciones on reparaciones.idreparaciones = incidencias.idreparaciones INNER JOIN ingreso on ingreso.reparaciones_idreparaciones = reparaciones.idreparaciones where ingreso.Pagado = 0 or reparaciones_idreparaciones not in ( SELECT reparaciones_idreparaciones as SinManoObra FROM `ingreso` WHERE Descr = 'Mano Obra' ) GROUP by incidencias.idIncidencias;");
            return $this->db->registros();
        }

        public function getUsuariosLogeados(){
            $this->db->query("SELECT count(idPersonal) as numClientes from cliente");
            return $this->db->registro();
        }

        public function getMecanicos(){
            $this->db->query("SELECT count(idMecanico) as numMecanicos from mecanico");
            return $this->db->registro();
        }
        
   


    }
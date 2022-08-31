<?php

    class TiendaModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getArticulos($clase){
            $this->db->query("SELECT * from articulosproveedor where Tipo = '$clase'");
            return $this->db->registros();
        }

        public function getArticulo($id){
            $this->db->query("SELECT * from articulosproveedor where idArticulosProvedores = $id");
            return $this->db->registros();
        }

        
       
    }

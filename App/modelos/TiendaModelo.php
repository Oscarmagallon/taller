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

        public function obtenerProveedorCarrito($carrito){
            $i = 0;
            foreach($carrito as $c){
                
            $this->db->query('SELECT articulosproveedor.Tipo, articulosproveedor.Precio, articulosproveedor.Descripcion, 
            articulostieneproveedor.Provedores_idProvedores from articulosproveedor INNER JOIN 
            articulostieneproveedor on articulosproveedor.idArticulosProvedores 
            = articulostieneproveedor.ArticulosProveedor_idArticulosProvedores WHERE 
            articulosproveedor.idArticulosProvedores = :cod;');
            $this->db->bind(':cod',$c['id']);
            $datos[$i] = $this->db->registros();
            $i++;
        }
        return $datos;
        }

        public function addArticulos($carrito){
            //print_r($carrito[9]['tipo']);
                    //print_r(sizeof($carrito));
          
            foreach ($carrito as $c ) {
                $this->db->query("INSERT into articulos values (null, :tipo, :precio, :descr,null,null,0)");
                $this->db->bind(":tipo", $c['tipo']);
                $this->db->bind(":precio", $c['precio']);
                $this->db->bind(":descr", $c['descripcion']);
                $this->db->execute();
            
            
            }
    
        }

        
       
    }

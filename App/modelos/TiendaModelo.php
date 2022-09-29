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

        public function getArticulosTienda($clase){
            $this->db->query("SELECT idArticulos as idArticulosProvedores,Tipo, Precio, descr as Descripcion from articulos where Tipo = '$clase'");
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
            $datos[$i] = $this->db->registro();
            $i++;
        }
        return $datos;
        }

        public function crearPedidoVinculado($id){
            $this->db->query("INSERT into pedido_vinculado values ($id,CURDATE())");
            $this->db->execute();
        }

        public function verIdUltimoPedido(){
            $this->db->query("SELECT idPedido_vinculado from pedido_vinculado order by idPedido_vinculado DESC LIMIT 1");
            return $this->db->registro();
        }

        public function rellenarGasto($carrito, $cod){
            foreach ($carrito as $c ){
                $this->db->query("INSERT into gasto values (null, :descr, :precio, :tipo, :id)");
                $this->db->bind(":tipo", $c->Tipo);
                $this->db->bind(":precio", $c->Precio);
                $this->db->bind(":descr", $c->Descripcion);
                $this->db->bind(":id", $cod);
                $this->db->execute();
            
            
            }
        }

        public function addArticulos($carrito){
            //print_r($carrito[9]['tipo']);
                    //print_r(sizeof($carrito));
                   print_r($carrito);
          
            foreach ($carrito as $c ) {
                $this->db->query("INSERT into articulos values (null, :tipo, :precio, :descr,null,:proveedor,0)");
                $this->db->bind(":tipo", $c->Tipo);
                $this->db->bind(":precio", $c->Precio);
                $this->db->bind(":descr", $c->Descripcion);
                $this->db->bind(":proveedor", $c->Provedores_idProvedores);
                $this->db->execute();
            
            
            }
    
        }

        
       
    }

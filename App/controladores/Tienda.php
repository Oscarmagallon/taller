<?php

    class Tienda extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->TiendaModelo = $this->modelo('TiendaModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
           $this->vista("admin/Tienda/index",$this->datos);
            
            }

        public function verArticulos($clase){
            echo $this->datos['usuarioSesion']->Rol_idRol;
            if($this->datos['usuarioSesion']->Rol_idRol==10){
                $this->datos['articulos'] = $this->TiendaModelo->getArticulos($clase);
            }else{
                $this->datos['articulos'] = $this->TiendaModelo->getArticulosTienda($clase);

            }
            //print_r($this->datos['articulos']);
            $this->vista("admin/Tienda/verArticulo", $this->datos);
        }

        public function getArticulos(){
            $cod= $_POST['id'];
            $dato['datos'] = $_POST['dat'];
            $dato['Carrito'][0] = $this->datos['Carrito'] = $this->TiendaModelo->getArticulo($cod);
        
            $this->vistaApi($dato); 

        }
        
        public function carrito(){
            $json = file_get_contents('php://input');
            $datos = json_decode($json,true);//true devuelve array
            print_r($datos);
           if ($this->datos['usuarioSesion']->Rol_idRol == 10){
            $carrito =  $this->TiendaModelo->obtenerProveedorCarrito($datos);
            $cod =  $this->datos['usuarioSesion']->idPersonal;            
            $this->TiendaModelo->addArtiSculos($carrito);
            $this->TiendaModelo->rellenarGasto($carrito,$cod);
            $this->vistaApi($datos);
           }else{
            $idPedido = $this->TiendaModelo->verIdUltimoPedido();
            if(empty($idPedido)){
                $idPedido = new stdClass ();
                $idPedido->idPedido_vinculado = 1;

            }else{
                $idPedido->idPedido_vinculado = $idPedido->idPedido_vinculado+1;

            }
           
            //aqui podemos usar $idVinculado para crearlo
            $cliente = $this->datos['usuarioSesion']->idPersonal;
            $this->TiendaModelo->crearPedidoVinculado($idPedido->idPedido_vinculado,$cliente);
            foreach($datos as $c){
               $this->TiendaModelo->addPedidoArticulo($c['id'], $idPedido->idPedido_vinculado);
               $this->TiendaModelo->addIngresoCarrito($idPedido->idPedido_vinculado, $c['tipo'], $c['precio']);
            }
            //$this->TiendaModelo->pedidoVinculado();
           }
        }



    }

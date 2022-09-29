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
           if ($this->datos['usuarioSesion']->Rol_idRol == 10){
            $carrito =  $this->TiendaModelo->obtenerProveedorCarrito($datos);
            $cod =  $this->datos['usuarioSesion']->idPersonal;            
            $this->TiendaModelo->addArticulos($carrito);
            $this->TiendaModelo->rellenarGasto($carrito,$cod);
            $this->vistaApi($datos);
           }else{
            $idPedido = new stdClass ();
            $idPedido->Pedido_vinculado = 0;
            $idPedido = $this->TiendaModelo->verIdUltimoPedido();
            if($idPedido->Pedido_vinculado==0){
              print_r($idPedido);
            }else{
                $idPedido->idPedido_vinculado = $idPedido->idPedido_vinculado+1;

            }
           
            //aqui podemos usar $idVinculado para crearlo
            //$this->TiendaModelo->crearPedidoVinculado($idPedido->idPedido_vinculado);
           // $this->TiendaModelo->pedidoVinculado();
           }
        }



    }
?>

<?php
    include('mail.php');
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

        public function addArticulo(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $codigo = $this->TiendaModelo->getCodigo();
                $codigo->id ++;
                $articulo = [
                    'tipo' => trim($_POST['tipo']),
                    'descripcion' => trim($_POST['descripcion']),
                    'precio' => trim($_POST['precio']),
                    'codigo'=> $codigo->id,
                ];
                $this->TiendaModelo->addArticulo($articulo);
                $this->TiendaModelo->proveedorHasArticulo($codigo->id);
                redireccionar("/Tienda");
          
            } else {
                $this->vista('admin/agregarPieza', $this->datos);
            }
        }

        public function pedidos($id){
            $this->datos['articulos'] = $this->TiendaModelo->pedidosVinculados($id);
            $this->vista('cliente/pedidos', $this->datos);

        }

        public function verArticulosPedido($id){
            $this->datos['articulos'] = $this->TiendaModelo->getArticulosPedido($id);
            $this->vista('cliente/articulosPedido',$this->datos);
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
               //$this->TiendaModelo->addIngresoCarrito($idPedido->idPedido_vinculado, $c['tipo'], $c['precio']);
            }
            //$this->TiendaModelo->pedidoVinculado();
           }
        }

        public function aceptarPedidoAdmin(){
            $this->datos['pedidos'] = $this->TiendaModelo->pedidosClientes();
            $this->vista('admin/aceptarPedidos', $this->datos);
        }

        public function aceptarDenegarPedidos($num, $id){
            if($num == 1){
                $this->TiendaModelo->marcarArticulos($id);
                $this->TiendaModelo->reservarPedido($id);
                redireccionar('/Tienda/aceptarPedidoAdmin', $this->datos);
            }else{
                $this->TiendaModelo->denegarPedido($id);
                $this->TiendaModelo->quitarReserva($id);
                $mensaje = "El pedido ha sido rechazado por algun motivo (Falta de stock, error en el precio...). Para realizar otro pedido no dudes en visitar nuestra página. Gracias";
                $this->datos['prop'] = $this->TiendaModelo->getPropietario($id);
                $cabecera = "Pedido";
                enviarEmail($this->datos['prop'],$mensaje, $cabecera);
                redireccionar('/Tienda/aceptarPedidoAdmin', $this->datos);
            }
        }

        public function pagarPedido($id){
            $precio = $this->TiendaModelo->precioPedido($id);
            $this->TiendaModelo->ingresoPedido($precio->precioTotal, $id);
            $this->TiendaModelo->finalizarPedido($id);
            redireccionar("/Tienda/pedidos/".$this->datos['usuarioSesion']->idPersonal, $this->datos);
        }



    }

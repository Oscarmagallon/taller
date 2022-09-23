<?php

    class Pagos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->PagosModelo = $this->modelo('PagosModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index($id){
            //conseguir el precio y los articulos de cada moto
            $this->datos['Pagos'] = $this->PagosModelo->getPagos($id);
            $this->datos['id'] =$id;
            if(!empty($datos['Pagos'])){
            $this->datos['ingresos'] = $this->PagosModelo->getReparaciones($this->datos['Pagos'][0]->idreparaciones);
            }
            $this->datos['ingresos']=[];
           $this->vista('admin/pagos',$this->datos);
            }
            

        public function manObra(){
            $manoObra = $_POST['text'];
            $id = $_POST['idReparacion'];
            $idMoto = $_POST['idMoto'];
            echo $idMoto;
            $this->PagosModelo->addManObra($id,$manoObra);
            redireccionar("/Pagos/index/$idMoto");
        }

        public function pagar($id){
           $this->datos["reparaciones"]=$this->PagosModelo->getReparaciones($id);
           $this->vista('cliente/PagarReparacion',$this->datos);
        }

        public function pagosCliente($reparaciones){
         $this->PagosModelo->pagarCliente($reparaciones);
         redireccionar("/Pagos/pagar/$reparaciones");
         
        }



    }
?>

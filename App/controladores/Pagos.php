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
            $this->vista('admin/pagos',$this->datos);
            }
            

        public function manObra(){
            $manoObra = $_POST['text'];
            $id = $_POST['idReparacion'];
            $this->PagosModelo->addManObra($id,$manoObra);
            redireccionar("/Pagos/index/$id");
        }



    }
?>

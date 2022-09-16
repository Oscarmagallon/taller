<?php

    class Pagos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->PagosModelo = $this->modelo('PagosModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            //conseguir el precio y los articulos de cada moto
            //SELECT idArticulos from pieza INNER JOIN reparaciones on pieza.idreparaciones = reparaciones.idreparaciones INNER JOIN incidencias ON reparaciones.idreparaciones = incidencias.idreparaciones INNER JOIN moto_has_incidencias on moto_has_incidencias.idIncidencias = incidencias.idIncidencias INNER JOIN moto on moto_has_incidencias.idMoto = moto.idMoto WHERE pieza.idArticulos =;
            }
            



    }
?>

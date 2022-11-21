<?php

class MotosListasModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function MotosListas()
    {
        $this->db->query("SELECT incidencias.idIncidencias,Ingreso.Descr,incidencias.Tipo,incidencias.Terminado,reparaciones.idreparaciones, incidencias.Descripcion,moto.Marca, moto.Modelo 
            FROM moto 
            INNER JOIN moto_has_incidencias on moto.idMoto = moto_has_incidencias.idMoto 
            INNER JOIN incidencias on moto_has_incidencias.idIncidencias = incidencias.idIncidencias 
            INNER JOIN reparaciones on reparaciones.idreparaciones = incidencias.idreparaciones 
            INNER JOIN ingreso on ingreso.reparaciones_idreparaciones = reparaciones.idreparaciones 
            where ingreso.Pagado = 0 or reparaciones_idreparaciones not in ( SELECT reparaciones_idreparaciones as SinManoObra FROM `ingreso` WHERE Descr = 'Mano Obra' ) Group by incidencias.idIncidencias");
        return $this->db->registros();
    }
}

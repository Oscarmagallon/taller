<?php

class PagosModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getPagos($id)
    {
        $this->db->query("Select ingreso.reparaciones_idreparaciones from incidencias inner join ingreso on incidencias.idreparaciones = ingreso.reparaciones_idreparaciones where incidencias.idIncidencias = $id and Terminado = 1;");
        return $this->db->registros();
    }

    public function addManObra($id, $manoObra)
    {
        $this->db->query("INSERT into ingreso (idIngreso,Descr,Ingreso,reparaciones_idreparaciones,Pagado)
                                                    values(null,'Mano Obra',$manoObra,$id,0)");
        $this->db->execute();
    }

    public function borrarManObra($id)
    {
        $this->db->query("DELETE from ingreso where idIngreso = $id");
        $this->db->execute();
    }

    public function getReparaciones($id)
    {
        $this->db->query("SELECT * From ingreso where reparaciones_idreparaciones = $id and Pagado = 0 ");
        return $this->db->registros();
    }

    public function pagarCliente($id)
    {
        $this->db->query("UPDATE ingreso SET Pagado = 1  WHERE reparaciones_idreparaciones = $id");
        $this->db->execute();
    }

}

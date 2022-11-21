<?php

class IncidenciasModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }


    public function peticionIncidencia($peticion)
    {
        $this->db->query("INSERT into incidencias (idIncidencias,Tipo,Descripcion,Fecha)
                                            values(null, :tipo,:descr,:fecha);");
        $this->db->bind(':tipo', $peticion['Tipo']);
        $this->db->bind(':descr', $peticion['descr']);
        $this->db->bind(':fecha', $peticion['fecha']);
        $this->db->execute();
    }

    public function cogerUltimaId()
    {
        $this->db->query("SELECT max(idIncidencias) as idIncidencias FROM incidencias;");
        return $this->db->registro();
    }
    public function MotoIncidencia($incidencia, $moto)
    {
        $this->db->query("INSERT into moto_has_incidencias values($moto,$incidencia);");
        $this->db->execute();
    }

    public function verEstado($id)
    {
        $this->db->query("SELECT idIncidencias FROM moto_has_incidencias where idMoto = $id;");
        return $this->db->registros();
    }

    public function estado($id)
    {
        $this->db->query("SELECT * FROM incidencias where idIncidencias = $id and incidencias.Terminado = 0");
        return $this->db->registro();
    }

    public function estadoTerminado($id)
    {
        $this->db->query("SELECT incidencias.idPersonal,incidencias.idIncidencias,Ingreso.Descr,incidencias.Tipo,incidencias.Terminado,reparaciones.idreparaciones, incidencias.Descripcion,moto.Marca, moto.Modelo 
        FROM moto 
        INNER JOIN moto_has_incidencias on moto.idMoto = moto_has_incidencias.idMoto 
        INNER JOIN incidencias on moto_has_incidencias.idIncidencias = incidencias.idIncidencias 
        INNER JOIN reparaciones on reparaciones.idreparaciones = incidencias.idreparaciones 
        INNER JOIN ingreso on ingreso.reparaciones_idreparaciones = reparaciones.idreparaciones 
        where ingreso.Pagado = 0 and incidencias.Terminado = 1 and incidencias.idIncidencias = $id");
        return $this->db->registro();
    }
}

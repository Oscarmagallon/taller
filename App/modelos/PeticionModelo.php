<?php

class PeticionModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getId($id)
    {
        $this->db->query("SELECT idPropietario from cliente where idPersonal = :id");
        $this->db->bind(':id', $id);
        return $this->db->registro();
    }

    public function getMotos()
    {
        $this->db->query("SELECT * from moto ");
        return $this->db->registros();
    }

    public function getProp($idPersonal)
    {
        $this->db->query("SELECT idPropietario from cliente WHERE idPersonal = '$idPersonal'");
        return $this->db->registro();
    }

    public function getMotosCliente($prop)
    {
        $this->db->query("SELECT Marca,Modelo,CC,idMoto FROM moto INNER JOIN propietario on moto.idPropietario = propietario.idPropietario INNER JOIN cliente on cliente.idPropietario =propietario.idPropietario where propietario.idPropietario = $prop;");

        return $this->db->registros();
    }

    public function getPeticiones($id)
    {
        $this->db->query("SELECT incidencias.*, Moto.idMoto FROM incidencias INNER JOIN moto_has_incidencias ON incidencias.idIncidencias = moto_has_incidencias.idIncidencias INNER JOIN moto on moto_has_incidencias.idMoto = moto.idMoto WHERE moto.idMoto = $id");
        return $this->db->registros();
    }
    public function getPeticionesReparaciones($id)
    {
        $this->db->query("SELECT incidencias.Terminado, personal.Nombre, incidencias.Fecha,incidencias.idPersonal,reparaciones.idreparaciones,incidencias.idIncidencias, incidencias.Tipo, incidencias.Descripcion,moto.idMoto FROM reparaciones INNER JOIN incidencias ON incidencias.idreparaciones = reparaciones.idreparaciones INNER JOIN personal on incidencias.idPersonal = personal.idPersonal inner JOIN moto_has_incidencias ON moto_has_incidencias.idIncidencias = incidencias.idIncidencias INNER JOIN moto ON moto.idMoto = moto_has_incidencias.idMoto where moto.idMoto = $id;");
        return $this->db->registros();
    }

    public function getPeticionesMoto()
    {
        $this->db->query("SELECT moto.idMoto,count(incidencias.idIncidencias) as numeroIncidencias FROM incidencias INNER JOIN moto_has_incidencias ON moto_has_incidencias.idIncidencias = incidencias.idIncidencias INNER JOIN moto ON moto.idMoto = moto_has_incidencias.idMoto where incidencias.Terminado = 0 GROUP by moto.idMoto;");
        return $this->db->registros();
    }

    public function getPeticion($id)
    {
        $this->db->query("SELECT * from incidencias where idIncidencias = $id");
        return $this->db->registros();
    }

    public function getMecanicos()
    {
        $this->db->query("SELECT Nombre, Apellido, idPersonal from personal where Rol_idRol = 30");
        return $this->db->registros();
    }

    public function addMecanico($id, $meca)
    {
        // $this->db->query("INSERT INTO incidencias(idPersonal)
        //values($meca) where idIncidencias = $id");
        $this->db->query("UPDATE incidencias SET idPersonal = $meca WHERE idIncidencias = $id;");
        $this->db->execute();
    }

    public function eliminarPeticionMoto($id)
    {
        $this->db->query("DELETE from  moto_has_incidencias where idIncidencias = $id");
        $this->db->execute();
    }

    public function eliminarPeticionIncidencias($id)
    {
        $this->db->query("DELETE from  incidencias where idIncidencias = $id");
        $this->db->execute();
    }

    public function getPropietario($id)
    {
        $this->db->query("SELECT personal.Correo, personal.Nombre from personal inner Join cliente on cliente.idPersonal = personal.idPersonal inner Join propietario on propietario.idPropietario = cliente.idPropietario inner join moto on moto.idPropietario = propietario.idPropietario where moto.idMoto = $id;");
        return $this->db->registros();
    }

    public function propietario ($id){
        $this->db->query("SELECT personal.Nombre, personal.Correo from incidencias INNER JOIN moto_has_incidencias on incidencias.idIncidencias = moto_has_incidencias.idIncidencias INNER JOIN moto on moto.idMoto = moto_has_incidencias.idMoto inner join propietario on moto.idPropietario = propietario.idPropietario INNER JOIN cliente on cliente.idPropietario = propietario.idPropietario inner join personal on cliente.idPersonal = personal.idPersonal where incidencias.idIncidencias= $id;");
        return $this->db->registros();
    }

    public function insertarReparacion($fecha)
    {
        $today = date('Y/m/d');
        $this->db->query("INSERT into reparaciones values (null, '$today', '$fecha')");
        $this->db->execute();
    }

    public function reparaciones($id, $reparacion)
    {
        $this->db->query("UPDATE incidencias set idreparaciones = $reparacion where idIncidencias = $id");
        $this->db->execute();
    }

    public function getIdReparacion()
    {
        $this->db->query("SELECT max(idReparaciones) as idReparaciones FROM reparaciones;");
        return $this->db->registro();
    }
    public function mecanicoRepara($meca, $id)
    {
        //$idmeca = intval ($meca);
        $this->db->query("INSERT into mecanico_has_reparaciones values ($meca, $id)");
        $this->db->execute();
    }

    public function terminada($id)
    {
        $this->db->query("UPDATE incidencias set Terminado = 1 where idIncidencias = $id");
        $this->db->execute();
    }
}

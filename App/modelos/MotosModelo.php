<?php

class MotosModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getIdProp($id)
    {
        $this->db->query("SELECT idPropietario from cliente where idPersonal = $id;");
        return $this->db->registro();
    }

    public function addPropietario($nombre, $apellido)
    {
        $this->db->query("INSERT into propietario (idPropietario, Nombre, Apellido)
                                      values(null, '$nombre', '$apellido')");
        $this->db->execute();
    }

    public function getIdPropadd()
    {
        $this->db->query("SELECT idPropietario FROM propietario ORDER BY idPropietario DESC LIMIT 1");
        return $this->db->registro();
    }

    public function vincularProp($id, $idPersonal)
    {
        $this->db->query("UPDATE cliente set idPropietario = $id where idPersonal = $idPersonal ");
        $this->db->execute();
    }

    public function addMoto($moto)
    {
        $this->db->query("INSERT into moto (idMoto, Marca, Modelo, CC,  idPropietario)
                                            values(null, :marca, :modelo, :cc, :prop)");
        $this->db->bind(":marca", $moto['Marca']);
        $this->db->bind(":modelo", $moto['Modelo']);
        $this->db->bind(":cc", $moto['cc']);
        $this->db->bind(":prop", $moto['idProp']);

        $this->db->execute();
    }

    public function getMotos($prop)
    {
        $this->db->query("SELECT * from moto where idPropietario = $prop");
        return $this->db->registros();
    }

    public function motoHasIncidencias($id)
    {
        $this->db->query("DELETE from moto_has_incidencias where idMoto = $id");
        $this->db->execute();
    }

    public function borrarMoto($id)
    {
        $this->db->query("DELETE from moto where idMoto = $id");
        $this->db->execute();
    }

    public function getMoto($id)
    {
        $this->db->query("SELECT * from moto where idMoto = $id");
        return $this->db->registro();
    }

    public function actualizarMoto($moto)
    {
        $this->db->query("UPDATE moto set Marca = :Marca, Modelo = :Modelo, CC = :CC where idMoto = :idMoto");
        $this->db->bind(':Marca', $moto['Marca']);
        $this->db->bind(':Modelo', $moto['Modelo']);
        $this->db->bind(':CC', $moto['Cc']);
        $this->db->bind(':idMoto', $moto['idMoto']);
        $this->db->execute();
    }
}

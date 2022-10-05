<?php
class Motos extends Controlador{

    public function __construct(){
        Sesion::iniciarSesion($this->datos);
        $this->datos['rolesPermitidos'] = [20];



    $this->motosModelo = $this->modelo('MotosModelo');

    //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
        
    }

    public function index(){
        $idPersonal = $this->datos['usuarioSesion']->idPersonal;
        $idProp = $this->motosModelo->getIdProp($idPersonal);

        if(empty($idProp->idPropietario)){
            $nombre = $this->datos['usuarioSesion']->Nombre;
            $apellido = $this->datos['usuarioSesion']->Apellido;
            $this->motosModelo->addPropietario($nombre, $apellido);
            $idNueva= $this->motosModelo->getIdPropadd();
            $this->motosModelo->vincularProp($idNueva->idPropietario, $idPersonal);
            $this->datos['idPropietario'] = $idNueva->idPropietario;
            $this->vista("cliente/addMoto",$this->datos);
        }else{
            $this->datos['idPropietario'] = $idProp->idPropietario;
            $this->vista("cliente/addMoto",$this->datos);
        }
    }

    public function addMoto(){
        $motoNueva = [
            'Marca' => trim($_POST['Marca']),
            'Modelo' => trim($_POST['Modelo']),
            'cc' => trim($_POST['cc']),
            'idProp' => trim($_POST['idProp']),
        ];
        $this->motosModelo->addMoto($motoNueva);

    }


}
?>
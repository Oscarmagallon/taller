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
            $this->datos['Motos'] = $this->motosModelo->getMotos($this->datos['idPropietario']);
            $this->vista("cliente/addMoto",$this->datos);
        }else{
            $this->datos['idPropietario'] = $idProp->idPropietario;
            $this->datos['Motos'] = $this->motosModelo->getMotos($this->datos['idPropietario']);
            $this->vista("cliente/verMotos",$this->datos);
        }

        
    }
    public function addMotoVista(){
        $idPersonal = $this->datos['usuarioSesion']->idPersonal;
        $idProp = $this->motosModelo->getIdProp($idPersonal);
        $this->datos['idPropietario'] = $idProp->idPropietario;
        if(empty($idProp->idPropietario)){
            redireccionar('/Motos');
        }
        $this->vista("cliente/addMoto",$this->datos);
        
    }

    public function addMoto(){
        $motoNueva = [
            'Marca' => trim($_POST['Marca']),
            'Modelo' => trim($_POST['Modelo']),
            'cc' => trim($_POST['cc']),
            'idProp' => trim($_POST['idProp']),
        ];
        $this->motosModelo->addMoto($motoNueva);
        redireccionar('/Peticiones');
    }

    public function borrarMoto($id){
        $this->motosModelo->motoHasIncidencias($id);
        $this->motosModelo->borrarMoto($id);
        redireccionar('/Peticiones');
    }

    public function editarMoto($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $motoModi = [
                'idMoto' => trim($_POST['idMoto']),
                'Marca' => trim($_POST['Marca']),
                'Cc' => trim($_POST['Cc']),
                'Modelo' => trim($_POST['Modelo']),
                'idProp' => trim($_POST['idProp']),
            ];
            $this->motosModelo->actualizarMoto($motoModi);
            redireccionar('/Peticiones');
        } else {
            $this->datos['Moto'] = $this->motosModelo->getMoto($id);
            $this->vista('cliente/editMoto',$this->datos);
        }
        
        
    }




}

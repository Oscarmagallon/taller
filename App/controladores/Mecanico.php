<?php

    class Mecanico extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [10];
  
           if (!tienePrivilegios($this->datos['usuarioSesion']->Rol_idRol,$this->datos['rolesPermitidos'])) {
                Sesion::cerrarSesion();
                redireccionar('/login');
            }


        $this->mecanicoModelo = $this->modelo('MecanicoModelo');

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            $this->vista('admin/crearMecanico',$this->datos);

        }
        
        public function addMecanico(){
            $mecanicoNuevo = [
                'nombre' => trim($_POST['Nombre']),
                'email' => trim($_POST['Email']),
                'apellido' => trim($_POST['Apellido']),
            ];
        
        $this->mecanicoModelo->crearMecanico($mecanicoNuevo);
        $id = $this->mecanicoModelo->getId();
        $this->mecanicoModelo->tablaMecanico($id->idPersonal);  

        redireccionar('/Admin');

        }


    }
?>

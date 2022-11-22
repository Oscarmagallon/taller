<?php

    class Mecanico extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [10];
  
          

        $this->mecanicoModelo = $this->modelo('MecanicoModelo');

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            $this->datos["Mecanicos"] = $this->mecanicoModelo->getMecanicos();
            $this->vista('admin/verMecanicos',$this->datos);
        }

        public function formAdd(){
            $this->vista('Admin/crearMecanico', $this->datos);
        }

        public function editar($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $mecanicoModificado = [
                    'id_usuario' => trim($_POST['id']),
                    'nombre' => trim($_POST['Nombre']),
                    'apellido' => trim($_POST['Apellido']),
                    'email' => trim($_POST['Email']),
                ];

                $this->mecanicoModelo->editMecanico($mecanicoModificado);
                redireccionar('/Mecanico');
            } else {
                //obtenemos información del usuario y el listado de roles desde del modelo
                $this->datos['Mecanico'] = $this->mecanicoModelo->getMecanico($id);
                $this->vista('admin/editarMecanico',$this->datos);
            }
        }

        public function borrar($id){
            $this->mecanicoModelo->mecanIncidencias($id);
            $this->mecanicoModelo->mecanicoHasReparaciones($id);
            $this->mecanicoModelo->borrarMecan($id);
            $this->mecanicoModelo->deleteMecan($id);
            redireccionar('/Mecanico');
           
        }

       

        public function seguimiento($id){
            $this->datos['tareas'] = $this->mecanicoModelo->seguimiento($id);
            $this->datos['id'] = $id;
            $this->datos["Mecanicos"] = $this->mecanicoModelo->getMecanicos();
            $this->vista('admin/verMecanicos',$this->datos);              
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

        redireccionar('/Mecanico');

        }


    }

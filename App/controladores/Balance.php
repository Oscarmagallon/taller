<?php

    class Balance extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [10];
  
           if (!tienePrivilegios($this->datos['usuarioSesion']->Rol_idRol,$this->datos['rolesPermitidos'])) {
                Sesion::cerrarSesion();
                redireccionar('/login');
            }


            $this->BalanceModelo = $this->modelo('BalanceModelo');            
        }


        public function index(){

            $this->datos['Gastos'] = $this->BalanceModelo->getGastos();
            $this->datos['Ingresos'] = $this->BalanceModelo->getIngresos();
            $this->vista('admin/balance',$this->datos);


        }


    }
?>
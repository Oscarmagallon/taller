<?php

    class Piezas extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
           


           $this->PiezasModelo = $this->modelo('PiezasModelo');
           

       //     $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index($id,$moto){
            $this->datos["MotoPeticion"] = $moto;
            $this->datos['Piezas'] = $this->PiezasModelo->getPiezas();
            $this->datos['Peticiones'] = $this->PiezasModelo->getPeticiones($id);
            $this->vista("admin/addPiezas", $this->datos);
            
            }

        public function add(){
            $pieza = $_POST['pieza'];
            $reparacion = $_POST['reparaciones'];
            $idMoto = $_POST["idMoto"];
            $coste = $this->PiezasModelo->getPrecio($pieza);
            $this->PiezasModelo->addPieza($pieza, $reparacion, $coste[0]->Precio);
            $this->PiezasModelo->ingreso($coste[0]->Tipo,$coste[0]->Precio,$reparacion);
            $this->PiezasModelo->vendido($pieza);
            redireccionar("/Peticiones/verPeticionesProgreso/$idMoto");
            
        }

        public function verPiezas($id){
           $idsPiezas = $this->PiezasModelo->piezasMoto($id);
           $this->datos['piezasMoto'] = $this->PiezasModelo->getPiezasMoto($idsPiezas);
           $this->datos['id'] = $id;
           $this->vista("admin/verPiezas",$this->datos);
        }
            
        public function borrar($id,$tipo, $precio,$idMoto){
            //conseguir id Reparacion 
            $idReparacion = $this->PiezasModelo->getReparacion($id);
            //borramos de la tabla piezas
            $this->PiezasModelo->borrarPieza($id);
            //borramos de tabla ingresos
            if(!empty($idReparacion->idreparaciones)){
                $this->PiezasModelo->borrarPiezaIngreso($tipo,$precio,$idReparacion->idreparaciones);
            }
            
            //Ponemos la pieza disponible otra vez
            $this->PiezasModelo->piezaDisponible($id);
            $idsPiezas = $this->PiezasModelo->piezasMoto($idMoto);
            $this->datos['piezasMoto'] = $this->PiezasModelo->getPiezasMoto($idsPiezas);
            $this->vista("admin/verPiezas",$this->datos);

        }


    }
?>

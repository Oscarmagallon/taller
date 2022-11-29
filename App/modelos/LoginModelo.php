<?php

class LoginModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }


    public function loginUsu($usuario, $contra)
    {
        $this->db->query("SELECT * FROM Personal WHERE Nombre = :user_username and Contraseña = :user_pass");
        $this->db->bind(':user_username', $usuario);
        $this->db->bind(':user_pass', $contra);
        return $this->db->registro();
    }

    public function addCliente($cliente)
    {
        $this->db->query("INSERT into Personal (idPersonal, Nombre, Apellido, Contraseña, Rol_idRol, Correo)
                                     values(null,:nombre,:apellido, :contra, 20 , :correo)");
        $this->db->bind(':nombre', $cliente['nombre']);
        $this->db->bind(':apellido', $cliente['apellido']);
        $this->db->bind(':correo', $cliente['email']);
        $this->db->bind(':contra', $cliente['contra']);

        $this->db->execute();
    }

    public function getEmail($id){
        $this->db->query("SELECT nombre, correo from personal where idPersonal = $id");
        return $this->db->registros();
    }

    public function getId()
    {
        $this->db->query("SELECT idPersonal FROM Personal ORDER BY idPersonal DESC LIMIT 1");
        return $this->db->registro();
    }

    public function addClienteApp($id)
    {
        $this->db->query("INSERT into cliente (idPersonal,idPropietario)
                                     values ($id, null)");
        $this->db->execute();
    }

    public function getArticulosTienda($clase)
    {
        $this->db->query("SELECT idArticulos as idArticulosProvedores,Tipo, Precio, descr as Descripcion from articulos where Tipo = '$clase' and Vendido = 0");
        return $this->db->registros();
    }

    /*
        public function registroSesion($id_usuario){
            $this->db->query("INSERT INTO sesiones (id_sesion, id_usuario, fecha_inicio) 
                                        VALUES (:id_sesion, :id_usuario, NOW())");

            $this->db->bind(':id_sesion',session_id());
            $this->db->bind(':id_usuario',$id_usuario);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }


        public function registroFinSesion($id_usuario){
            $this->db->query("UPDATE sesiones SET fecha_fin = NOW()  
                                    WHERE id_usuario = :id_usuario AND id_sesion = :id_sesion");

            $this->db->bind(':id_sesion',session_id());
            $this->db->bind(':id_usuario',$id_usuario);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }*/
}

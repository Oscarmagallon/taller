<?php

class TiendaModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getArticulos($clase)
    {
        $this->db->query("SELECT * from articulosproveedor where Tipo = '$clase'");
        return $this->db->registros();
    }

    public function getArticulosTienda($clase)
    {
        $this->db->query("SELECT idArticulos as idArticulosProvedores,Tipo, Precio, descr as Descripcion from articulos where Tipo = '$clase' and Vendido = 0");
        return $this->db->registros();
    }

    public function getArticulo($id)
    {
        $this->db->query("SELECT * from articulosproveedor where idArticulosProvedores = $id");
        return $this->db->registros();
    }

    public function obtenerProveedorCarrito($carrito)
    {
        $i = 0;
        foreach ($carrito as $c) {

            $this->db->query('SELECT articulosproveedor.Tipo, articulosproveedor.Precio, articulosproveedor.Descripcion, 
            articulostieneproveedor.Provedores_idProvedores from articulosproveedor INNER JOIN 
            articulostieneproveedor on articulosproveedor.idArticulosProvedores 
            = articulostieneproveedor.ArticulosProveedor_idArticulosProvedores WHERE 
            articulosproveedor.idArticulosProvedores = :cod;');
            $this->db->bind(':cod', $c['id']);
            $datos[$i] = $this->db->registro();
            $i++;
        }
        return $datos;
    }

    public function cogerTodosTienda()
    {
        $this->db->query('SELECT * from articulos');
        return $this->db->registros();
    }

    public function crearPedidoVinculado($id, $cliente)
    {
        $this->db->query("INSERT into pedido_vinculado values ($id,CURDATE(),$cliente,0)");
        $this->db->execute();
    }

    public function verIdUltimoPedido()
    {
        $this->db->query("SELECT idPedido_vinculado from pedido_vinculado order by idPedido_vinculado DESC LIMIT 1");
        return $this->db->registro();
    }

    public function rellenarGasto($carrito, $cod)
    {
        foreach ($carrito as $c) {
            $this->db->query("INSERT into gasto values (null, :descr, :precio, :tipo, :id)");
            $this->db->bind(":tipo", $c->Tipo);
            $this->db->bind(":precio", $c->Precio);
            $this->db->bind(":descr", $c->Descripcion);
            $this->db->bind(":id", $cod);
            $this->db->execute();
        }
    }

    public function addArticulos($carrito)
    {


        foreach ($carrito as $c) {
            $precio = $c->Precio + $c->Precio * 0.3;
            $this->db->query("INSERT into articulos values (null, :tipo, :precio, :descr,null,:proveedor,0)");
            $this->db->bind(":tipo", $c->Tipo);
            $this->db->bind(":precio", $precio);
            $this->db->bind(":descr", $c->Descripcion);
            $this->db->bind(":proveedor", $c->Provedores_idProvedores);
            $this->db->execute();
        }
    }

    public function addArticulo($articulo){
        $this->db->query('INSERT into articulosproveedor values(:codigo, :precio, :descrip, :tipo)');
        $this->db->bind(':precio', $articulo['precio']);
        $this->db->bind(':descrip', $articulo['descripcion']);
        $this->db->bind(':tipo', $articulo['tipo']);
        $this->db->bind(':codigo', $articulo['codigo']);
        $this->db->execute();
    }

    public function getCodigo(){
        $this->db->query("SELECT max(idArticulosProvedores) as id FROM articulosproveedor");
        return $this->db->registro();
    }

    public function proveedorHasArticulo($id){
        $this->db->query('INSERT into articulostieneproveedor values (1,:id)');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function addIngresoCarrito($id, $tipo, $precio)
    {
        switch ($tipo) {
            case '1':
                $tipo = 'Pieza';
                break;

            case '2':
                $tipo = 'Equipacion';
                break;

            case '3':
                $tipo = 'Casco';
                break;

            case '4':
                $tipo = 'Moto';
                break;
        }
        $this->db->query("INSERT into ingreso (idIngreso, Descr, Ingreso,Pedido_vinculado_idPedido_vinculado, Pagado)
                                    values(null, '$tipo', $precio ,$id,1) ");
        $this->db->execute();
    }


    public function addPedidoArticulo($id, $pedido)
    {
        $this->db->query("UPDATE articulos SET pedido_vinculado = $pedido 
                          where idArticulos = $id");
        $this->db->execute();
    }

    public function getArticulosPedido($id){
        $this->db->query("SELECT * from articulos WHERE articulos.pedido_vinculado = $id");
        return $this->db->registros();
    }

    public function pedidosVinculados($id){
        $this->db->query("SELECT articulos.pedido_vinculado, pedido_vinculado.reservado from cliente inner JOIN pedido_vinculado on cliente.idPersonal = pedido_vinculado.Cliente_idPersonal inner join articulos on articulos.pedido_vinculado = pedido_vinculado.idPedido_vinculado where pedido_vinculado.reservado <> 3 and cliente.idPersonal = $id group by articulos.pedido_vinculado;");
        return $this->db->registros();
    }

    public function pedidosClientes(){
        $this->db->query('SELECT personal.Nombre, pedido_vinculado.idPedido_vinculado, pedido_vinculado.reservado from personal inner join cliente on personal.idPersonal = cliente.idPersonal inner join pedido_vinculado on cliente.idPersonal = pedido_vinculado.Cliente_idPersonal inner join articulos on pedido_vinculado.idPedido_vinculado = articulos.pedido_vinculado where pedido_vinculado.reservado <> 3  GROUP by pedido_vinculado.idPedido_vinculado;');
        return $this->db->registros();
    }

    public function marcarArticulos($id){
        $this->db->query('UPDATE articulos set vendido = 1 where pedido_vinculado = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function reservarPedido($id){
     $this->db->query('UPDATE pedido_vinculado set reservado = 1 where idPedido_vinculado = :id');
     $this->db->bind(':id', $id);
     $this->db->execute();
    }

    public function denegarPedido($id){
        $this->db->query('UPDATE articulos set vendido = 0, pedido_vinculado = null where pedido_vinculado = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }   

    public function quitarReserva($id){
        $this->db->query('UPDATE pedido_vinculado set reservado = 2 where idPedido_vinculado = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        
    }

    public function getPropietario($id){
        $this->db->query("SELECT personal.Nombre, personal.Correo from pedido_vinculado inner JOIN cliente on cliente.idPersonal = pedido_vinculado.Cliente_idPersonal INNER JOIN personal on cliente.idPersonal = personal.idPersonal WHERE idPedido_vinculado = $id");
        return $this->db->registros();
    }

    public function precioPedido($id){
        $this->db->query("SELECT sum(articulos.Precio) as precioTotal from articulos WHERE articulos.pedido_vinculado = $id");
        return $this->db->registro();
    }

    public function ingresoPedido($precio, $id){
        $this->db->query("INSERT into ingreso values(null,'Pedido Online', $precio, $id, null, 1)");
        $this->db->execute();
    }

    public function finalizarPedido($id){
        $this->db->query("UPDATE pedido_vinculado set reservado = 3 where idPedido_vinculado = $id");
        $this->db->execute();
    }
}

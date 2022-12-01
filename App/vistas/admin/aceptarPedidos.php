<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Estado</h1>
    <?php print_r($datos); ?>


    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Personal</th>
                    <th>Pedido</th>
                    <th>Ver</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($datos['pedidos'])) :
                    foreach ($datos['pedidos'] as $e) : ?>
                        <tr>
                            <td><?php echo $e->Nombre ?></td>
                            <td><?php echo $e->idPedido_vinculado ?></td>
                            <td><a href="<?php echo RUTA_URL ?>/Tienda/verArticulosPedido/<?php echo $e->idPedido_vinculado?>">Ver listado</a></td>
                            <td><a href="<?php echo RUTA_URL ?>/Tienda/aceptarDenegarPedidos/1/<?php echo  $e->idPedido_vinculado ?>">aceptar</a> <a href="<?php echo RUTA_URL ?>/Tienda/aceptarDenegarPedidos/2/<?php echo $e->idPedido_vinculado ?>">denegar</a></td>
                            


                        </tr>
                <?php endforeach;
                endif

                ?>
</body>



<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
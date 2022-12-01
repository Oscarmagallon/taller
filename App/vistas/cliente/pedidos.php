<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Pedidos</h1>
    <?php print_r($datos) ?>

    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead class="cliente" id="cliente">
                <tr>
                    <th>Numero de pedido</th>
                    <th>Ver articulos</th>
                    <th>Pagar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($datos['articulos'])) :
                    foreach ($datos['articulos'] as $e) : ?>
                        <tr>
                            <td><?php echo $e->pedido_vinculado ?></td>
                            <td><a href="<?php echo RUTA_URL ?>/Tienda/verArticulosPedido/<?php echo $e->pedido_vinculado?>">Ver listado</a></td>
                            <td><?php if($e->reservado == 0): ?> En espera de aceptacion <?php endif; ?><?php if($e->reservado == 1): ?> <a href="">Pagar</a> <?php endif; ?></td>
                        </tr>
                <?php endforeach;
                endif

                ?>
</body>



<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Pedidos</h1>
    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead class="cliente" id="cliente">
                <tr>
                    <th>Articulo</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($datos['articulos'])) :
                    foreach ($datos['articulos'] as $e) : ?>
                        <tr>
                            <td><?php echo $e->descr ?></td>
                            <td><?php echo $e->Precio ?></td>
                        </tr>
                <?php endforeach;
                endif

                ?>
            </tbody>
</body>



<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
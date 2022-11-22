<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Estado</h1>
    <h4>Motos listas para pagar y recojer. Haga click para ver la factura</h4>
    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead class="cliente" id="cliente">
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Pagar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($datos['Estado'])):?>

                <?php foreach ($datos['Estado'] as $e) : ?>
                    <tr>
                        <td><?php echo $e->Tipo ?></td>
                        <td><?php echo $e->Descripcion ?></td>
                        <?php if (empty($e->idPersonal)) {
                            echo "<td> En Espera </td>";
                        } elseif (!empty($e->idPersonal) && $e->Terminado == 0) {
                            echo "<td> En Progreso </td>";
                        } else {
                            echo  "<td> Terminado </td>";
                        } ?>
                        <?php if ($e->Terminado == 1) : ?>
                            <td><a href="<?php echo RUTA_URL ?>/Pagos/pagar/<?php echo $e->idreparaciones ?>">Pagar</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach;
                endif
                ?>
</body>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
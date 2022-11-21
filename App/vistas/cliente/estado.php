<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Estado</h1>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">

        <div class="container-fluid px-2">
            <form autocomplete="off" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Nombre de la marca" aria-label="Buscar">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>

        </div>
    </nav>

    <a href="<?php echo RUTA_URL ?>/Incidencias/verTerminadas/<?php echo $datos['id'] ?>">
        <h4>Ver listas para pagar</h4>
    </a>

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
                <?php if (!empty($datos['Estado'])) :
                    foreach ($datos['Estado'] as $e) : ?>
                        <?php $i = 0; ?>
                        <?php $accionador = 1 ?>
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
                            <td>No disponible</td>

                        </tr>
                <?php endforeach;
                endif

                ?>
</body>



<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
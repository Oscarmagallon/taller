<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Estado</h1>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
        <style>
            table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 1em;
                font-family: sans-serif;
                min-width: 450px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            thead {
                background-color: blue;
                color: #ffffff;
                text-align: middle;
            }

            tbody {
                padding: 12px 15px;
            }
        </style>

        <div class="container-fluid px-2">
            <form autocomplete="off" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Nombre de la marca" aria-label="Buscar">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>

        </div>
    </nav>

    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Mecanico</th>
                    <th>Añadir pieza</th>
                    <th>Ver Piezas</th>
                    <th>Terminado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['Peticiones'] as $e) : ?>
                    <?php if (!empty($e->idPersonal) && $e->Terminado == 0) : ?>

                        <tr>
                            <td><?php echo $e->Tipo ?></td>
                            <td><?php echo $e->Descripcion ?></td>
                            <td><?php echo $e->Fecha ?></td>
                            <td><?php echo $e->Nombre ?></td>
                            <td><a href="<?php echo RUTA_URL ?>/Piezas/<?php echo $e->idIncidencias ?>/<?php echo $e->idMoto ?>"><i class="bi bi-puzzle-fill"></i></a></td>
                            <td><a href="<?php echo RUTA_URL ?>/Piezas/verPiezas/<?php echo $e->idIncidencias ?>"><i class="bi bi-eye"></i></a></td>
                            <td><a href="<?php echo RUTA_URL ?>/Peticiones/peticionTerminada/<?php echo $e->idPersonal ?>/<?php echo $e->idIncidencias ?>/<?php echo $e->idMoto ?>"><i class="bi bi-check-square-fill"></i></a></td>



                        </tr>

                    <?php endif; ?>
                <?php endforeach; ?>

</body>



<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
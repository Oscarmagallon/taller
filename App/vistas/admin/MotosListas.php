<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>

<body class="container">
    <h1>Motos Listas</h1>
    <h4>Estas motos ya estan reparadas a la espera de añadir un coste</h4>

    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Pago</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['Listas'] as $m) : ?>
                    <?php if ($m->Terminado == 1) : ?>

                        <tr>
                            <td><?php echo $m->Tipo ?></td>
                            <td><?php echo $m->Descripcion ?></td>
                            <td><?php echo $m->Marca ?></td>
                            <td><?php echo $m->Modelo ?></td>
                            <td> <a href="<?php echo RUTA_URL ?>/Pagos/<?php echo $m->idIncidencias ?>"> Añadir Coste</a></td>


                        </tr>

                    <?php endif; ?>
                <?php endforeach; ?>

</body>


<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Peticiones de la moto <?php echo $datos['moto']->Marca." ".$datos['moto']->Modelo." ".$datos['moto']->CC  ?></h1>

    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['Peticiones'] as $e) : ?>
                    <?php if (empty($e->idPersonal) && $e->Terminado == 0) : ?>
                        <tr>

                            <td><?php echo $e->Tipo ?></td>
                            <td><?php echo $e->Descripcion ?></td>
                            <td><?php echo $e->Fecha ?></td>
                            <td><a href="<?php echo RUTA_URL ?>/Peticiones/anadirMecanico/<?php echo $e->idIncidencias ?>/<?php echo $datos['Peticiones'][0]->idMoto ?>"><i class="bi bi-person-plus"></i></a>
                                <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Peticiones/eliminarPeticion/<?php echo $e->idIncidencias ?>"><i class="bi bi-trash"></i></a>
                            </td>


                        </tr>

                    <?php endif; ?>
                <?php endforeach; ?>

</body>
<?php if(!empty($datos['Peticiones'])): ?>
<a href="<?php echo RUTA_URL ?>/Peticiones/verPeticionesProgreso/<?php echo $datos['Peticiones'][0]->idMoto ?>">Ver reparaciones en Progreso</a>
<?php endif; ?>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
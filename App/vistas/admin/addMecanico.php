<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Añade mecanico a la reparacion</h1>
    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Mecanicos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>


                <tr>
                    <td><?php echo $datos['peticion'][0]->Tipo ?></td>
                    <td><?php echo $datos['peticion'][0]->Descripcion ?></td>
                    <td><?php echo $datos['peticion'][0]->Fecha ?></td>
                    <form method="POST" action="<?php echo RUTA_URL ?>/Peticiones/anadirMecanico/<?php echo $datos['peticion'][0]->idIncidencias ?>/<?php echo $datos['idMoto'] ?>">
                        <td>
                            <select name="mecanico" id="mecanico">
                                <?php foreach ($datos['Mecanicos'] as $m) : ?>
                                    <option value="<?php echo $m->idPersonal ?>"><?php echo $m->Nombre ?></option>
                                <?php endforeach ?>
                            </select>
                            <input type="hidden" name="fecha" value="<?php echo $datos['peticion'][0]->Fecha ?>">
                        </td>
                        <td><button type="submit">Añadir</button></td>
                    </form>

                </tr>




</body>


<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
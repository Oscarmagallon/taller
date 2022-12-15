<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Mecánicos</h1>
    <h4>Gestiona los mecánicos dados de alta en la aplicación</h4>
    <br>
    <?php
    if (!empty($datos['tareas'])) {
        json_encode($datos['tareas']);
    } ?>

    <button type="button" class="btn btn-primary">
        <a class="enlace" href="<?php echo RUTA_URL ?>/Mecanico/formAdd">Añadir &nbsp;<i class="bi bi-person-plus-fill"></i></a>
    </button>

    <style>
        .enlace {
            color: white;
        }
    </style>
    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Cod</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['Mecanicos'] as $m) : ?>
                    <tr>
                        <td><?php echo $m->idPersonal ?></td>
                        <td><a href="<?php echo RUTA_URL ?>/Mecanico/seguimiento/<?php echo $m->idPersonal ?>"><?php echo $m->Nombre ?></a></td>
                        <td><?php echo $m->Apellido ?></td>
                        <td><?php echo $m->Correo ?></td>
                        <td>
                            <a href="<?php echo RUTA_URL ?>/Mecanico/editar/<?php echo $m->idPersonal ?>"><i class="bi bi-pencil-square"></i></a>
                            <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Mecanico/borrar/<?php echo $m->idPersonal ?>"><i class="bi bi-trash"></i></a>
                        </td>


                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div id="seguimiento"></div>
</body>
<script>
    let datoss = '<?php echo json_encode($datos['tareas']); ?>';
    let datos = JSON.parse(datoss);

    if (datos.length != 0) {
        div = document.getElementById("seguimiento")
        table = document.createElement('table')
        tr = document.createElement('tr')
        th1 = document.createElement('th')
        th2 = document.createElement('th')
        th1.appendChild(document.createTextNode('Tarea'))
        th2.appendChild(document.createTextNode('Titulo'))
        tr.appendChild(th1);
        tr.appendChild(th2);
        table.appendChild(tr)
        datos.forEach(d => {
            tr2 = document.createElement('tr');
            td = document.createElement('td')
            td.appendChild(document.createTextNode('Reparacion'))
            td1 = document.createElement('td')
            td1.appendChild(document.createTextNode(d['Tipo']))
            tr2.appendChild(td)
            tr2.appendChild(td1)
            table.appendChild(tr2)
        })



        div.appendChild(table)
    }
</script>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
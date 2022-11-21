<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Estado</h1>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
        <?php print_r($datos['ingresos']) ?>

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
                    <th>Pieza</th>
                    <th>Descripcion</th>
                    <th>Costo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0 ?>
                <?php foreach ($datos['ingresos'] as $p) : ?>

                    <tr>
                        <td><?php echo $p->Descr ?></td>
                        <td><?php echo $p->Descr ?></td>
                        <td><?php echo $p->Ingreso ?></td>
                        <td><?php if ($p->Descr == "Mano Obra") : ?> <a href="<?php echo RUTA_URL ?>/Pagos/borrar/<?php echo $p->idIngreso ?>/<?php echo $datos['id'] ?>"><i class="bi bi-trash-fill"></i></a> <?php endif ?></td>
                    </tr>
                    <?php
                    $total = $total + $p->Ingreso; ?>

                <?php endforeach; ?>

            </tbody>
        </table>
</body>
<h3>Total <?php echo $total ?></h3>

<form method="POST" action="<?php echo RUTA_URL ?>/Pagos/manObra">
    <label required for="text">Mano de obra</label>
    <input type="number" min="0" name="text" id="text">

    <input type="hidden" value="<?php echo $datos['Pagos'][0]->reparaciones_idreparaciones ?>" name="idReparacion">
    <input type="hidden" value="<?php echo $datos['id'] ?>" name="idMoto">
    <input type="submit">


</form>



<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
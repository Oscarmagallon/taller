<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Moto <?php echo $datos['moto']->Marca." ".$datos['moto']->Modelo." ".$datos['moto']->CC  ?></h1>
    <h4>Aqui se encuentran las piezas añadidas a esta moto. Con la posibilidad de añadir mano de obra</h4>

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
                        <td><?php if ($p->Descr == "Mano Obra") : ?> <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Pagos/borrar/<?php echo $p->idIngreso ?>/<?php echo $datos['id'] ?>"><i class="bi bi-trash-fill"></i></a> <?php endif ?></td>
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
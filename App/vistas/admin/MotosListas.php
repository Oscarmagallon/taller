<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<?php print_r($datos['nums']) ?>
<br>
<br>
<?php print_r($datos['Listas']) ?>
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
                            <?php $cont = 0; ?>
                            <?php if(in_array($m->idIncidencias, $datos["nums"])):?>
                                <?php $cont = 1 ?>
                                <td><p>A la espera del pago </p></td>
                            <?php endif ?>

                            <?php if($cont == 0):?>
                                <td><a href="<?php echo RUTA_URL ?>/Pagos/<?php echo $m->idIncidencias ?>">Pagar</a></td>
                                <?php $cont = 0; ?>
                            <?php endif ?>                       
                           
                    

                        </tr>

                    <?php endif; ?>
                <?php endforeach; ?>

</body>


<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
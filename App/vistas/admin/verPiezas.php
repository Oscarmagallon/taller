<div class ="container">
<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>
<body>
    <h1>Piezas añadidas a la moto <?php echo $datos['moto']->Marca." ".$datos['moto']->Modelo." ".$datos['moto']->CC ?> </h1>

    <div class="row">
        <?php if (empty($datos["piezasMoto"])) {
            echo "No hay piezas en esta moto";
        } ?>
        <?php if (!empty($datos["piezasMoto"])) : ?>
            <?php foreach ($datos["piezasMoto"] as $p) : ?>
                <?php
                print_r($p->Tipo);
                switch ($p->Tipo) {
                    case '1':
                        $articulo = 'Pieza';
                        break;

                    case '2':
                        $articulo = 'Equipacion';
                        break;

                    case '3':
                        $articulo = 'Casco';
                        break;

                    case '4':
                        $articulo = 'Moto';
                        break;
                }
                ?>
                <div class = "col-3">
                <div class="card" style="width: 19rem;">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $articulo ?></h3>
                        <h5 class="card-body"><?php echo $p->descr ?></h5>

                        <a href="<?php echo RUTA_URL ?>/Piezas/borrar/<?php echo $p->idArticulos ?>/<?php echo $p->Tipo ?>/<?php echo $p->Precio ?>/<?php echo $datos['id'] ?>" class="btn btn-danger">Borrar</a>
                    <img class="card-img-bottom" src="<?php echo RUTA_URL?>/public/img/<?php echo $p->Tipo ?>.jpg" height="180px" width="50px">
                </div>
            </div>
            </div>
<?php endforeach;
        endif;
?>
</div>
</div>
</body>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
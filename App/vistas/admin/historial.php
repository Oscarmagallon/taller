<body class="container">
<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

    <h1>Estado</h1>
    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead class="cliente" id="cliente">
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Pieza</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($datos['historial'])) :
                    foreach ($datos['historial'] as $h) : ?>
                        <?php $accionador = 1 ?>
                        <tr>
                            <td><?php echo $h->Tipo ?></td>
                            <td><?php echo $h->Descripcion ?></td>
                            <td><?php echo $h->Fecha ?></td>
                            <?php $tipo = verTipo($h->pieza) ?>
                            <td><?php echo $tipo ?></td>

                        </tr>
                <?php endforeach;
                endif

                ?>
</body>



<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>

<?php 
 function verTipo($tipo) {
    switch ($tipo) {
        case 1:
            $tipo = "Pieza";
            break;
       
        case 2:
            $tipo = "Equipacion";
            break;
            
        case 3:
            $tipo = "Casco";
            break;

        case 4:
            $tipo = "Moto";
            break;
    }
    return $tipo;
  }
?>
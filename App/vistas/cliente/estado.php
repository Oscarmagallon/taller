<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Estado</h1> <br>
    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead class="cliente" id="cliente">
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Pagar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($datos['Estado'])) :
                    foreach ($datos['Estado'] as $e) : ?>
                        <?php $i = 0; ?>
                        <?php $accionador = 1 ?>
                        <tr>
                            <td><?php echo $e->Tipo ?></td>
                            <td><?php echo $e->Descripcion ?></td>
                            <?php if (empty($e->idPersonal)) {
                                echo "<td> En Espera </td>";
                            } elseif (!empty($e->idPersonal) && $e->Terminado == 0) {
                                echo "<td> En Progreso </td>";
                            } else {
                                echo  "<td> Terminado </td>";
                            } ?>
                            <td>No disponible</td>

                        </tr>
                <?php endforeach;
                endif

                ?>
            </tbody>
        </table>
    </div>
    <?php 
    $numListas = 0;
    if (!empty($datos['EstadoTerminado']))
    {$numListas = count($datos['EstadoTerminado']);} ?>
    <input type="button" class="btn btn-primary" name="nueva_cabana" id="nueva_cabana" value="Mostrar las <?php echo $numListas ?> Listas"/>

    <div class="mb-3" id ="anadir_cabana">
            <table class="table table-hover">

            <thead class="cliente" id="cliente">
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Pagar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($datos['EstadoTerminado'])) :
                    foreach ($datos['EstadoTerminado'] as $e) : ?>
                        <?php $i = 0; ?>
                        <?php $accionador = 1 ?>
                        <tr>
                            <td><?php echo $e->Tipo ?></td>
                            <td><?php echo $e->Descripcion ?></td>
                            <td> <p>Terminado</p> </td>
                            <td> <a href="<?php echo RUTA_URL ?>/Pagos/pagar/<?php echo $e->idreparaciones ?>">Pagar</a> </td>

                        </tr>
                <?php endforeach;
                endif

                ?>
            </tbody>
        </table>
        </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('#anadir_cabana').hide();
    $("#n   ueva_cabana").val('Mostrar Listas');
    $("#nueva_cabana").on("click", function(e) {
      var $boton = $(this);
      $('#anadir_cabana').animate({width: [ "toggle", "swing" ]}, 500, function() {
        $boton.val($(this).is(':visible') ? 'Ocultar motos listas' : 'Mostrar Listas');
      });
      e.preventDefault();
    });
  });
</script>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
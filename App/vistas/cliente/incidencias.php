<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>
<center>
<h2>Rellena la tabla con informacion sobre la incidencia de la moto <?php echo $datos['moto']->Marca." ".$datos['moto']->Modelo." ".$datos['moto']->CC  ?></h2>
<h4>Si tienes mas informacion sobre el fallo pinchar boton  <input type="button" class="button8" name="nueva_cabana" id="nueva_cabana" value="Mostrar"/></h4>
</center>
<div class="card bg-light mt-5 w-75 card-center" style=" margin: auto;">
    <h2 class="card-header"> Rellenar tabla con las incidencias</h2>
    <form autocomplete="off" action="<?php echo RUTA_URL ?>/Incidencias/peticion" method="post" class="card-body">
        <div class="mb-3">
            <label for="tipo">Tipo: <sup>*</sup></label>
            <input type="text" name="tipo" id="tipo" required class="form-control form-control-lg" placeholder="Escribe aqui el tipo de incidencia de su moto">
        </div>
       
        <div class="mb-3" id ="anadir_cabana">
        <label for="tipo">Descripcion: <sup>*</sup></label>
            <input type="text" name="descr" id="descr" class="form-control form-control-lg" placeholder="Escribe aqui el tipo de incidencia de su moto">
        </div>
        <input type="hidden" name="idMoto" id="idMoto" class="form-control form-control-lg" value="<?php echo $datos['id'] ?>">
        <input type="submit" class="btn btn-success" value="Hacer Peticion">
    </form>

</div>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    $('#anadir_cabana').hide();
    $("#nueva_cabana").val('Mostrar');
    $("#nueva_cabana").on("click", function(e) {
      var $boton = $(this);
      $('#anadir_cabana').animate({width: [ "toggle", "swing" ]}, 500, function() {
        $boton.val($(this).is(':visible') ? 'Ocultar' : 'Mostrar');
      });
      e.preventDefault();
    });
  });
</script>
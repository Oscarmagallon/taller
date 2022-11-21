<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<form class="form-inline" method="Post" action="<?php echo RUTA_URL ?>/Mecanico/addMecanico">
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Nombre" id="name" required placeholder="Nombre">
    </div>
  </div>
  <div class="form-group row">
    <label for="ape" class="col-sm-2 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; Apellido</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Apellido" id="ape" required placeholder="Apellido">
    </div>
  </div>
  <div class="form-group row">
    <label for="correo" class="col-sm-2 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; Correo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Email" id="correo" required placeholder="Correo electrónico">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <div class="col-12">
      <button type="submit" class="btn btn-primary  col-12">Confirmar</button>

    </div>
  </div>
</form>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
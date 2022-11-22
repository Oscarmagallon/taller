<div class="container">
  <?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
  <form class="form-inline" method="Post">
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label"> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Nombre</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required name="Nombre" value="<?php echo $datos['Mecanico']->Nombre ?>" id="name" placeholder="Nombre">
      </div>
    </div>
    <div class="form-group row">
      <label for="ape" class="col-2 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Apellido</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required name="Apellido" id="ape" placeholder="Apellido" value="<?php echo $datos['Mecanico']->Apellido ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="correo" class="col-sm-2 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; Correo</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" required value="<?php echo $datos['Mecanico']->Correo ?>" name="Email" id="correo" placeholder="Correo electrónico">
      </div>
    </div>
    <br>
    <div class="form-group row">
      <div class="col-12">
        <input type="hidden" name="id" value="<?php echo $datos['Mecanico']->idPersonal ?>">
        <button type="submit" class="btn btn-primary  col-12">Confirmar</button>

      </div>
    </div>
  </form>
</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
 <form class="form-inline" method="Post">
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "Nombre" value ="<?php echo $datos['Mecanico']->Nombre ?>" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group row">
    <label for="ape" class="col-sm-2 col-form-label">Apellido</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Apellido" id="ape" placeholder="Apellido" value="<?php echo $datos['Mecanico']->Apellido ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="correo" class="col-sm-2 col-form-label">Correo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $datos['Mecanico']->Correo ?>" name="Email" id="correo" placeholder="Correo electrónico">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <div class="col-12">
    <input type="hidden" name="id" value="<?php echo $datos['Mecanico']->idPersonal ?>">
  <button type="submit" class="btn btn-primary  mx-sm-3 mb-2">Confirmar</button> 

    </div>
  </div>
</form>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>

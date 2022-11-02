<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<form class="form-inline" method="Post">
<div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Nombre</label>
    <input type="text"  class="form-control-plaintext" value="<?php echo $datos['Mecanico']->Nombre ?>" name="Nombre">
  </div>
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Apellido</label>
    <input type="text"  class="form-control-plaintext" name="Apellido" value="<?php echo $datos['Mecanico']->Apellido ?>">
  </div>
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Email</label>
    <input type="text"  class="form-control-plaintext" id="staticEmail2" name="Email" value="<?php echo $datos['Mecanico']->Correo ?>" >
  </div>
  <input type="hidden" name="id" value="<?php echo $datos['Mecanico']->idPersonal ?>">
  <button type="submit" class="btn btn-primary  mx-sm-3 mb-2">Confirmar</button>
</form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
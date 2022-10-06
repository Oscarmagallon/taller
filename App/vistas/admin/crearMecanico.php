<?php require_once RUTA_APP.'/vistas/inc/header.php';?>

<form class="form-inline" method="Post" action="<?php echo RUTA_URL ?>/Mecanico/addMecanico">
<div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Nombre</label>
    <input type="text"  class="form-control-plaintext" name="Nombre"  placeholder="Nombre">
  </div>
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Apellido</label>
    <input type="text"  class="form-control-plaintext" name="Apellido" placeholder="Apellido">
  </div>
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Email</label>
    <input type="text"  class="form-control-plaintext" id="staticEmail2" name="Email" value="email@example.com">
  </div>
  <button type="submit" class="btn btn-primary  mx-sm-3 mb-2">Confirmar</button>
</form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
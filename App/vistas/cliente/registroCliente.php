<?php require_once RUTA_APP.'/vistas/inc/header.php';?>

<form class="form-inline" method="Post" action="<?php echo RUTA_URL ?>/Login/registrar">
<div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Nombre</label>
    <input type="text"  class="form-control-plaintext" required name="Nombre"  placeholder="Introduce tu nombre">
  </div>
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Apellido</label>
    <input type="text"  class="form-control-plaintext" required name="Apellido" placeholder="Introduce tu apellido">
  </div>
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Email</label>
    <input type="text"  class="form-control-plaintext" required id="staticEmail2" name="Email" placeholder="Introduce tu direccion de email">
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="password" class="form-control" id="inputPassword2" name="contra" required placeholder="Introduce tu contraseña">
  </div>
  <button type="submit" class="btn btn-primary  mx-sm-3 mb-2">Confirmar</button>
</form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
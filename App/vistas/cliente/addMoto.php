<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<form class="form-inline" method="Post" action="<?php echo RUTA_URL ?>/Motos/addMoto">
<div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Marca</label>
    <input type="text"  class="form-control-plaintext" name="Marca"  placeholder="ktm">
  </div>
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Modelo</label>
    <input type="text"  class="form-control-plaintext" name="Modelo" placeholder="duke">
  </div>
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Centimetros cubicos</label>
    <input type="text"  class="form-control-plaintext" id="staticEmail2" name="cc" value="125">
  </div>
    <input type="hidden" value="<?php echo $datos['idPropietario'] ?>" name="idProp">
  <button type="submit" class="btn btn-primary  mx-sm-3 mb-2">Confirmar</button>
</form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>





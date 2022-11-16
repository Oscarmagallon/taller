<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<div style="width:900px; position: relative; margin-left: auto; margin-right: auto;"> 
<h1>Rellene el formulario con los datos de su moto</h1>
<br>
<form class="form-inline" method="Post" action="<?php echo RUTA_URL ?>/Motos/addMoto">
<div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Marca</label>
    <input type="text" required class="form-control-plaintext" name="Marca" required placeholder="Introduzca la marca de su moto">
  </div>
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Modelo</label>
    <input type="text"  class="form-control-plaintext" name="Modelo"required placeholder="Introduzca el modelo de su moto">
  </div>
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Centimetros cubicos</label>
    <input type="text"  class="form-control-plaintext" id="staticEmail2" name="cc" required placeholder="Intorduzca los centímetros cúbicos de su moto">
  </div>
    <input type="hidden" value="<?php echo $datos['idPropietario'] ?>" name="idProp">
  <button type="submit" class="btn btn-primary  mx-sm-3 mb-2">Confirmar</button>
</form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>





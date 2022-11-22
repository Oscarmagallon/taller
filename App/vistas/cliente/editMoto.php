<div class ="container">
<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<h1>Modifique los datos de su moto</h1>
<form class="form-inline" method="Post">
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label"> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Marca</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Marca" required value="<?php echo $datos['Moto']->Marca ?>" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group row">
    <label for="ape" class="col-2 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Modelo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Modelo" id="ape" required placeholder="Modelo" value="<?php echo $datos['Moto']->Modelo ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="correo" class="col-sm-2 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; CC</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" required value="<?php echo $datos['Moto']->CC ?>" name="Cc" id="cc" placeholder="Correo electrónico">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <div class="col-12">
      <input type="hidden" name="idProp" value="<?php echo $datos['Moto']->idPropietario ?>">
      <input type="hidden" name="idMoto" value="<?php echo $datos['Moto']->idMoto ?>">

      <button type="submit" class="btn btn-primary  col-12">Confirmar</button>

    </div>
  </div>
</form>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
</div>
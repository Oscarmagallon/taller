
<div class ="container">
<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<form class="form-inline" method="Post" action="<?php echo RUTA_URL ?>/Tienda/addArticulo">
  <div class="form-group row">
    <label for="tipo" class="col-sm-2 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Tipo</label>
    <div class="col-sm-10">
      <select name="tipo" id="tipo">
        <option value="2">Equipacion</option>
        <option value="3">Casco</option>
        <option value="4">Moto</option>
        <option value="1">Pieza</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; Descripcion</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="descripcion" id="descripcion" required placeholder="descripcion">
    </div>
  </div>
  <div class="form-group row">
    <label for="precio" class="col-sm-2 col-form-label">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; Precio</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="precio" id="precio" required placeholder="precio">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <div class="col-12">
      <button type="submit" class="btn btn-primary  col-12">Confirmar</button>

    </div>
  </div>
</form>
</div>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
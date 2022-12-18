<div class="container">
<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<center>

  <h2>Bienvenido <?php echo $datos['usuarioSesion']->Nombre . " " ?>¡Manda a arreglar tu moto! Te estamos esperando</h2>
  <h4>Gestiona tus motos y haznos una petición para poder arreglarla.</h4>
  <br>
  <a class="center" data-bs-toggle="modal" data-bs-target="#exampleModal" href="<?php echo RUTA_URL ?>/Motos/addMotoVista"><img src="<?php echo RUTA_URL ?>/img/agregar.png" height="50" width="50" alt=""></a>
  <br>
  <div class="container">
    <div class="row">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Moto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="form-inline" method="Post" action="<?php echo RUTA_URL ?>/Motos/addMoto">
    <div class="form-group  mx-sm-3 mb-2">
      <label for="staticEmail2" class="sr-only">Marca</label>
      <input type="text" required class="form-control-plaintext" name="Marca" required placeholder="Introduzca la marca de su moto">
    </div>
    <div class="form-group  mx-sm-3 mb-2">
      <label for="staticEmail2" class="sr-only">Modelo</label>
      <input type="text" class="form-control-plaintext" name="Modelo" required placeholder="Introduzca el modelo de su moto">
    </div>
    <div class="form-group  mx-sm-3 mb-2">
      <label for="staticEmail2" class="sr-only">Centimetros cubicos</label>
      <input type="text" class="form-control-plaintext" id="staticEmail2" name="cc" required placeholder="Intorduzca los centímetros cúbicos de su moto">
    </div>
    <input type="hidden" value="<?php echo $datos['Propietario'] ?>" name="idProp">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>

      </div>
    </div>
  </div>
</div>

      <?php if (!empty($datos['Motos'])) :
      $i = -1;
     
        foreach ($datos["Motos"] as $m) : ?>
        <?php $i++; ?>
          <div class="col-3 col-md-4 col-sm-6 col-12">
            <div class="card " style="width: 18rem;">
              <div class="card-body">
              <h5 class="card-title"><?php echo $m->Marca ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="<?php echo RUTA_URL ?>/Motos/editarMoto/<?php echo $m->idMoto ?>"><i class="bi bi-pencil-square"></i></a> &nbsp; &nbsp; &nbsp; <a onclick="return confirm_delete()" href="<?php echo RUTA_URL ?>/Motos/borrarMoto/<?php echo $m->idMoto ?>"><i class="bi bi-trash"></i></a></h5> 
                <p class="card-text"><?php echo $m->Marca;echo "  "; echo $m->Modelo;echo "  ";echo $m->CC;  ?></p>

                <a href="<?php echo RUTA_URL ?>/Incidencias/<?php echo $m->idMoto ?>" class="btn btn-primary">Mandar a arreglar</a>
                <br> <br>
                <a href="<?php echo RUTA_URL ?>/Incidencias/verEstado/<?php echo $m->idMoto ?>" class="btn btn-primary">Ver estado</a>
                <br> <br>
                <img class="card-img-bottom" src="<?php echo RUTA_URL?>/img/motoCliente.png" height="250px">
                <br>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  </div>

  <?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>


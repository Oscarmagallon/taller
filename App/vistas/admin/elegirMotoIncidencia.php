<div class="container">
  <?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
  <h1>Incidencias disponibles</h1>
  <h4>En esta página se las motos con alguna incidencia <br>
      Para ver mas informacion pichar sobre ver peticiones</h4>
    <?php print_r($datos) ?>
  <div class="row">
    <?php foreach ($datos["Peticiones"] as $m) : ?>
      <div class="col-3 col-md-4 col-sm-6 col-12">
        <div class="card " style="width: 18rem;">
              <div class="card-header">
                <p>Incidencias disponibles: <?php echo $m->numeroIncidencias; ?></p>
              </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $m->Marca ?></h5>
            <p class="card-text"><?php echo $m->Marca; echo "  ";echo $m->Modelo;echo "  ";echo $m->CC;  ?></p>
            <a href="<?php echo RUTA_URL ?>/Peticiones/verPeticiones/<?php echo $m->idMoto ?>" class="btn btn-primary">Ver Peticiones</a>
            <img class="card-img-bottom" src="http://2.bp.blogspot.com/_EZ16vWYvHHg/S9Rmg1NUc9I/AAAAAAAALP4/VcIsVqptCtw/s1600/www.BancodeImagenesGratuitas.com+-Motocicletas-2.jpg" style="height:100%">
            <br>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>

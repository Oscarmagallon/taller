<div class="container">
  <?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
  <h1>Incidencias disponibles</h1>
  <h4>En esta página se las motos con alguna incidencia <br>
      Para ver mas informacion pichar sobre ver peticiones</h4>
  <div class="row">
    <?php foreach ($datos["Peticiones"] as $m) : ?>
      <div class="col-3 col-md-4 col-sm-6 col-12">
        <div class="card " style="width: 18rem;">
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?php echo $m->numeroIncidencias?>
                  <span class="visually-hidden">unread messages</span>
                </span>
          <div class="card-body">
            <h5 class="card-title"><?php echo $m->Marca ?></h5>
            <p class="card-text"><?php echo $m->Marca; echo "  ";echo $m->Modelo;echo "  ";echo $m->CC;  ?></p>
            <a href="<?php echo RUTA_URL ?>/Peticiones/verPeticiones/<?php echo $m->idMoto ?>" class="btn btn-primary">Ver Peticiones</a>
            <img src="<?php echo RUTA_URL ?>/img/rotas.png" height="250px">
            <br>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>

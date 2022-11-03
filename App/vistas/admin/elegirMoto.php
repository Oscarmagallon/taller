<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<p>Zona dejar moto</p>
<?php print_r($datos) ?>
<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<p>Zona dejar moto</p>
<div class="container">
 <div class="row">
  <?php  foreach ($datos["Motos"] as $m ): ?>
    <div class="col-3 col-md-4 col-sm-6 col-12">
  <div class="card " style="width: 18rem;"> 
  <?php  foreach ($datos["Peticiones"] as $p ): ?>
    <?php if($m->idMoto == $p->idMoto ):?>
      <div class="card-header"><?php echo $p->numeroIncidencias; ?></div>
      <?php endif;?>
    <?php endforeach; ?>
      <div class="card-body">
        <h5 class="card-title"><?php echo $m->Marca?></h5>
        <p class="card-text" ><?php  echo $m->Marca; echo "  "; echo $m->Modelo; echo "  ";echo $m->CC;  ?></p>
        <a href="<?php echo RUTA_URL?>/Peticiones/verPeticiones/<?php echo $m->idMoto?>" class="btn btn-primary">Ver Peticiones</a>
        <img class="card-img-bottom" src="http://2.bp.blogspot.com/_EZ16vWYvHHg/S9Rmg1NUc9I/AAAAAAAALP4/VcIsVqptCtw/s1600/www.BancodeImagenesGratuitas.com+-Motocicletas-2.jpg" style="height:100%">
        <br>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  </div>
  </div>
</div>
    <?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
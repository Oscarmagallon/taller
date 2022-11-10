<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<h2>Mandar a arreglar la moto o ver estado en el que se encuentra</h2>
<br>
<div class="container">
 <div class="row">
  <?php  foreach ($datos["Motos"] as $m ): ?>
    <div class="col-3 col-md-4 col-sm-6 col-12">
  <div class="card " style="width: 18rem;"> 
      <div class="card-body">
        <h5 class="card-title"><?php echo $m->Marca?></h5>
        <p class="card-text" ><?php  echo $m->Marca; echo "  "; echo $m->Modelo; echo "  ";echo $m->CC;  ?></p>
        
        <a href="<?php echo RUTA_URL?>/Incidencias/<?php echo $m->idMoto?>" class="btn btn-primary">Mandar a arreglar</a>
      
        <a href="<?php echo RUTA_URL?>/Incidencias/verEstado/<?php echo $m->idMoto?>" class="btn btn-primary">Ver estado</a>        <img class="card-img-bottom" src="http://2.bp.blogspot.com/_EZ16vWYvHHg/S9Rmg1NUc9I/AAAAAAAALP4/VcIsVqptCtw/s1600/www.BancodeImagenesGratuitas.com+-Motocicletas-2.jpg" style="height:100%">
        <br>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  </div>
  </div>
</div>


    <?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
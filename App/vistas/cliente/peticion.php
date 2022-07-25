<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<p>Zona dejar moto</p>

<?php  foreach ($datos["Motos"] as $m ): ?>
<div class="card" style="width: 18rem;">
<img class="card-img-top" src="../cliente/ktm.png" alt="Card image cap">  
    <div class="card-body">
    <h5 class="card-title"><?php echo $m->Marca?></h5>
    <p class="card-text" ><?php  echo $m->Marca; echo "  "; echo $m->Modelo; echo "  ";echo $m->CC;  ?></p>
    <a href="<?php echo RUTA_URL?>/Incidencias/<?php echo $m->idMoto?>" class="btn btn-primary">Mandar a arreglar</a>
    <a href="<?php echo RUTA_URL?>/Incidencias/verEstado/<?php echo $m->idMoto?>" class="btn btn-primary">Ver estado</a>

  </div>
</div>

<?php endforeach; ?>

    <?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
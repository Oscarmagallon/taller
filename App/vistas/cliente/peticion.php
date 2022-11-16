<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<center>

<h2>Bienvenido <?php echo $datos['usuarioSesion']->Nombre." " ?>¡Manda a arreglar tu moto! Te estamos esperando</h2>
<h4>Gestiona tus motos y haznos una petición para poder arreglarla.</h4>
<br>
<a class="center" href="<?php echo RUTA_URL ?>/Motos/addMotoVista"><img src="<?php echo RUTA_URL ?>/img/agregar.png" height="50" width="50" alt=""></a>
<br>
<div class="container">
 <div class="row">

  <?php  foreach ($datos["Motos"] as $m ): ?>
    <div class="col-3 col-md-4 col-sm-6 col-12">
  <div class="card " style="width: 18rem;"> 
      <div class="card-body">
        <h5 class="card-title"><?php echo $m->Marca?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="<?php echo RUTA_URL?>/Motos/editarMoto/<?php echo $m->idMoto ?>"><i class="bi bi-pencil-square"></i></a> &nbsp; &nbsp; &nbsp; <a href="<?php echo RUTA_URL ?>/Motos/borrarMoto/<?php echo $m->idMoto ?>"><i class="bi bi-trash"></i></a></h5>
        <p class="card-text" ><?php  echo $m->Marca; echo "  "; echo $m->Modelo; echo "  ";echo $m->CC;  ?></p>
        
        <a href="<?php echo RUTA_URL?>/Incidencias/<?php echo $m->idMoto?>" class="btn btn-primary">Mandar a arreglar</a> 
        <br> <br>
        <a href="<?php echo RUTA_URL?>/Incidencias/verEstado/<?php echo $m->idMoto?>" class="btn btn-primary">Ver estado</a>        
        <br> <br>
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
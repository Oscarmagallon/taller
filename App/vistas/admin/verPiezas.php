<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<body class="container">
<h1>Piezas añadidas a la moto</h1>   
<div class="row">
    <?php if(empty($datos["piezasMoto"])){
        echo "No hay piezas en esta moto";
    } ?>
    <?php if(!empty($datos["piezasMoto"])):?>
    <?php  foreach ($datos["piezasMoto"] as $p ): ?>
        <div class="card" style="width: 19rem;"> 
            <div class="card-body">
                <h5 class="card-title"><?php echo $p->Tipo?></h5>
                <p class="card-text" ><?php  echo $p->descr?></p>
                <a href="<?php echo RUTA_URL?>/Piezas/borrar/<?php echo $p->idArticulos?>/<?php echo $p->Tipo ?>/<?php echo $p->precio?>/<?php echo $datos['id']?>" class="btn btn-danger">Borrar</a>
            </div class="">
                <img class="card-img-bottom" src="http://2.bp.blogspot.com/_EZ16vWYvHHg/S9Rmg1NUc9I/AAAAAAAALP4/VcIsVqptCtw/s1600/www.BancodeImagenesGratuitas.com+-Motocicletas-2.jpg" style="height:100%">
      </div>
    
    </div>
    <?php endforeach;
          endif; 
          ?>
        </div>

</body>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
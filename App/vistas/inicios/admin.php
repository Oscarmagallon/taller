<div class="container">
  <?php require_once RUTA_APP . '/vistas/inc/header.php' ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    </p><br /><br />

      <div class="n">
          <h2>Bienvenido de nuevo Admin</h2>
          <br>
          <div class="col-3"></div>
      </div>
      <section id="about">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3 content wow fadeInRight">
              <div class="card " style="width: 18rem;">
                <div class="card-body">
                  <h1>Peticiones disponibles</h1>
                  <div class="card-text">
                    <h4>Hay <?php echo $datos['peticiones']->numIncidencias ?> peticiones</h4>
                    <p>Para ver el progreso o aceptar/denegar una nueva petición de un cliente.</p>
                    <a href="<?php echo RUTA_URL ?>/Peticiones"><button class="btn btn-primary">Peticiones</button></a><br>
                  </div>
                  <img class="card-img-bottom" src="<?php echo RUTA_URL ?>/img/incidencia.jpg" style="height:100%">
                  <br>
                </div>
              </div>

            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 content wow fadeInRight">
              <div class="card " style="width: 18rem;">
                <div class="card-body">
                  <h1> Mecanicos registrados</h1>
                  <div class="card-text">
                    <h4>Hay <?php echo $datos['mecanicos']->numMecanicos ?> mecanicos registrados en la aplicación</h4>
                    <p>Gestiona los mecanicos registrados en la aplición.</p>
                    <a href="<?php echo RUTA_URL ?>/Mecanico"><button class="btn btn-primary">Mecanicos</button></a><br>
                  </div>
                  <img class="card-img-bottom" src="<?php echo RUTA_URL ?>/img/mecan.jpg" style="height:100%">
                </div>
              </div>
            </div>
         
          <!-- Fila 2-->
            <div class="col-sm-12 col-md-6 col-lg-3 content wow fadeInRight">
              <div class="card " style="width: 18rem;">
                <div class="card-body">
                  <h3>Motos listas</h3>
                  <div class="card-text">
                    <h4>Hay <?php echo $datos['listas'] ?> motos listas para pagar</h4>
                    <p>Vaya a esta ventana para ver las motos que se encuentran listas para recoger asi como las piezas añadidas.</p>
                    <a href="<?php echo RUTA_URL ?>/MotosListas"><button class="btn btn-primary">Ver Listas</button></a><br>
                  </div>
                  <img class="card-img-bottom" src="<?php echo RUTA_URL ?>/img/check.png" style="height:100%">
                </div>
              </div>
            </div>


            <div class="col-sm-12 col-md-6 col-lg-3 content wow fadeInRight" data-wow-delay="0s" data-wow-duration="1.9s">
              <div class="card " style="width: 18rem;">
                <div class="card-body">
                  <h3>Clientes registrados</h3>
                  <div class="card-text">
                    <h4>Hay <?php echo $datos['clientes']->numClientes ?> clientes dados de alta en la aplicación</h4>
                    <p>Cada vez que se loguee un usuario nuevo subirá en contador de arriba</p>
                    <a href="<?php echo RUTA_URL ?>/Admin"><button class="btn btn-primary">Okay!</button></a><br>
                  </div>
                  <img class="card-img-bottom" src="<?php echo RUTA_URL ?>/img/user.png" style="height:100%">
                </div>
              </div>
    
      </section>
    </div>
    <?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
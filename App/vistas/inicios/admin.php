<div class="container">
  <?php require_once RUTA_APP . '/vistas/inc/header.php' ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    </p><br /><br />
    <?php if(!$datos['peticiones']->numIncidencias == 0): ?>
      <style>
          .notificacionIncidencias{
            color:red;
          }
      </style>
      <?php endif ?>
      <?php if(!$datos['listas']== 0): ?>
      <style>
          .notificacionListas{
            color:red;
          }
      </style>
      <?php endif ?>
      <div class="n">
          <div class="col-3"></div>
      </div>
      <section id="about">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3 content wow fadeInRightt">
              <div class="card " style="width: 18rem;">
                <div class="card-body">
                  <h1>Peticiones disponibles</h1>
  
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?php echo $datos['peticiones']->numIncidencias ?>
                  <span class="visually-hidden">unread messages</span>
                </span>

                  <div class="card-text">
                   
                    <p>Aceptar/denegar nueva petición de un cliente.</p>
                    <a href="<?php echo RUTA_URL ?>/Peticiones/motosConIncidencia"><button class="btn btn-primary">Peticiones</button></a><br>
                  </div>
                  <img class="card-img-bottom" src="<?php echo RUTA_URL ?>/img/incidencia.jpg" style="height:100%">
                  <br>
                </div>
              </div>

            </div>
            <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3 content wow fadeInRight">
              <div class="card " style="width: 18rem;">
                <div class="card-body">
                  <h1> Mecanicos registrados</h1>
                  <div class="card-text">
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?php echo $datos['mecanicos']->numMecanicos ?>
                  <span class="visually-hidden">unread messages</span>
                </span>
                    <p>Gestiona los mecanicos registrados en la aplición.</p>
                    <a href="<?php echo RUTA_URL ?>/Mecanico"><button class="btn btn-primary">Mecanicos</button></a><br>
                  </div>
                  <img class="card-img-bottom" src="<?php echo RUTA_URL ?>/img/mecan.jpg" style="height:100%">
                </div>
              </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3 content wow fadeInRight">
              <div class="card " style="width: 18rem;">
                <div class="card-body">
                  <h1>Motos listas</h1>
                  <div class="card-text">
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?php echo $datos['listas'] ?>
                  <span class="visually-hidden">unread messages</span>
                </span>
                    <p>Vaya a esta ventana para ver las motos que se encuentran listas para recoger asi como las piezas añadidas.</p>
                    <a href="<?php echo RUTA_URL ?>/MotosListas"><button class="btn btn-primary">Ver Listas</button></a><br>
                  </div>
                  <img class="card-img-bottom" src="<?php echo RUTA_URL ?>/img/check.png" style="height:100%">
                </div>
              </div>
            </div>


            <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-3 content wow fadeInRight" data-wow-delay="0s" data-wow-duration="1.9s">
              <div class="card " style="width: 18rem;">
                <div class="card-body">
                  <h1>Clientes registrados</h1>
                  <div class="card-text">
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?php echo $datos['clientes']->numClientes ?>
                  <span class="visually-hidden">unread messages</span>
                </span>
                    <p>Cada vez que se loguee un usuario nuevo subirá en contador de arriba</p>
                    <a href="#"><button class="btn btn-primary">Okay!</button></a><br>
                  </div>
                  <img class="card-img-bottom" src="<?php echo RUTA_URL ?>/img/user.png" style="height:100%">
                </div>
              </div>
            </div>
      </section>
    </div>
    <?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
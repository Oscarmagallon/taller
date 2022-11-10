<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<!DOCTYPE html>


<html lang="en">
<head>
   <?php print_r($datos['usuarioSesion'] ) ?>
    <meta charset="UTF-8">
    <title>Prodact Display</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../Tienda/css/bootstrap.css">
   <!--  <link rel="stylesheet" href="../Tienda/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Tienda/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Tienda/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../Tienda/css/magnific-popup.css">
    <link rel="stylesheet" href="../Tienda/css/jquery.bxSlider.css"> -->
    <link href="../Tienda/style.css" rel="stylesheet" type="text/css" />
   
</head>
<body>
<section class="season">
    <img  src="<?php echo RUTA_URL?>/img/motsmt.jpg">
     <div class="text">
        <?php if($datos['usuarioSesion']->Rol_idRol==20) :?>
         <h2>Tienda</h2>
         <?php endif; ?>

         <?php if($datos['usuarioSesion']->Rol_idRol==10) :?>
         <h2>Proveedores</h2>
         <?php endif; ?>
         
         <h3>Las mejores ofertas</h3>
     </div>
 </section>
 <br>

    <div class="online">
        <div class="col-12">
            <div class="s_product">
                <img  width="285" height="213" src="<?php echo RUTA_URL?>/img/tienda.png">
                <h2>Explorar</h2>                   
            </div>
             <?php if ($datos['usuarioSesion']->Rol_idRol  == 10):?>
            <h3><a href="<?php echo RUTA_URL ?>/Tienda/verTodos">Ver</a></h3>
            <?php endif; ?>
            <?php if ($datos['usuarioSesion']->Rol_idRol == 20):?>
            <h3><a href="<?php echo RUTA_URL ?>/Tienda/verTodos">Ver</a></h3>
            <?php endif; ?>                 
        </div>
    </div>



<div class="related-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bar">
                        <h2>Articulos</h2>
                        <img alt=""  src="<?php echo RUTA_URL?>/img/bar.jpg">
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="s_product">
                            <img  width="285" height="213" src="<?php echo RUTA_URL?>/img/chaquetas.jpg">
                            <div class="s_overlay"></div>
                            <h2>Equipaciones de moto</h2>
                            
                        </div>
                        <?php if ($datos['usuarioSesion']->Rol_idRol  == 10):?>
                        <h3><a href="<?php echo RUTA_URL ?>/Tienda/verArticulos/2">Ver</a></h3>
                        <?php endif; ?>

                        <?php if ($datos['usuarioSesion']->Rol_idRol == 20):?>
                        <h3><a href="<?php echo RUTA_URL ?>/Tienda/verArticulos/2">Ver</a></h3>
                        <?php endif; ?>
                        
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="s_product">
                            <img alt="" height="200" src="<?php echo RUTA_URL?>/img/casco.jpg">
                            <div class="s_overlay"></div>
                            <h2>Cascos</h2>
                        </div>
                        <?php if ($datos['usuarioSesion']->Rol_idRol  == 10):?>
                        <h3><a href="<?php echo RUTA_URL ?>/Tienda/verArticulos/3">Ver</a></h3>
                        <?php endif; ?>

                        <?php if ($datos['usuarioSesion']->Rol_idRol == 20):?>
                        <h3><a href="<?php echo RUTA_URL ?>/Tienda/verArticulos/3">Ver</a></h3>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="s_product">
                            <img alt="50" height="200" src="<?php echo RUTA_URL?>/img/moto.jpg">
                            <div class="s_overlay"></div>
                            <h2>Motos</h2>
                        </div>
                            <?php if ($datos['usuarioSesion']->Rol_idRol  == 10):?>
                        <h3><a href="<?php echo RUTA_URL ?>/Tienda/verArticulos/4">Ver</a></h3>
                        <?php endif; ?>

                        <?php if ($datos['usuarioSesion']->Rol_idRol == 20):?>
                        <h3><a href="<?php echo RUTA_URL ?>/Tienda/verArticulos/4">Ver</a></h3>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="s_product">
                            <img alt="" src="<?php echo RUTA_URL ?>/img/piezas.jpg">
                            <div class="s_overlay"></div>
                            <h2>Piezas</h2>
                            
                        </div> 
                        <?php if ($datos['usuarioSesion']->Rol_idRol  == 10):?>
                        <h3><a href="<?php echo RUTA_URL ?>/Tienda/verArticulos/1">Ver</a></h3>
                        <?php endif; ?>

                        <?php if ($datos['usuarioSesion']->Rol_idRol == 20):?>
                        <h3><a href="<?php echo RUTA_URL ?>/Tienda/verArticulos/1">Ver</a></h3>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
</div>
</div>
<section class="brands">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bar">
                    <h2>Podrás econtrar:</h2>
                    <img src="<?php echo RUTA_URL ?>/img/bar.jpg" alt="">
                </div>
            </div>
        </div>
        
    </div>
</section>
    <section class="yyyy">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="slider-container">
                <marquee  scrolldelay="1" scrollamount="10" direction="left" loop="infinite" onmouseout="this.start()" onmouseover="this.stop()">
                    <img  HSPACE="70" VSPACE="70" src="<?php echo RUTA_URL?>/img/marcas-aprilia.jpg" height ="200px" width="200px"/>
                    <img  HSPACE="70" VSPACE="70" src="<?php echo RUTA_URL?>/img/marca-kawa.jpg" height ="200px" width="200px"/>
                    <img  HSPACE="70" VSPACE="70" src="<?php echo RUTA_URL?>/img/marca-ktm.jpg" height ="200px" width="200px"/>
                    <img  HSPACE="70" VSPACE="70" src="<?php echo RUTA_URL?>/img/marcas-honda.jpg" height ="200px" width="200px"/>
                    <img  HSPACE="70" VSPACE="70" src="<?php echo RUTA_URL?>/img/marcas-yamaha.jpg" height ="200px" width="200px"/>
                </marquee>
                </div>
            </div>
        </div>
        </div>
    </section>
    
   
</footer>
<!-- <script src="../Tienda/js/jquery-3.1.1.min.js"></script>
<script src="../Tienda/js/owl.carousel.min.js"></script> 
<script src="../Tienda/js/bootstrap.min.js"></script>
<script src="../Tienda/js/jquery.magnific-popup.min.js"></script>
<script src="../Tienda/js/jquery.bxSlider.js"></script>
<script src="../Tienda/js/active.js"></script>  
 -->
</body>
</html>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
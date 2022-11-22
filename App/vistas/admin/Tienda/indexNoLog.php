
<!DOCTYPE html>
<div class="container" >
<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>


<html lang="en">
<center>
<head>
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
  

</head>
<style>
    .centrado{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
}

    
</style>
<body>
    <section class="season">
        <img src="<?php echo RUTA_URL ?>/img/motsmt.jpg">
        <div class="centrado">
            <h2>Hechale un vistazo a nuestra tienda</h2>

            <h3>Las mejores ofertas</h3>
        </div>
    </section>

    <div class="related-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bar">
                        <h2>Articulos</h2>
                        <img alt="" src="<?php echo RUTA_URL ?>/img/bar.jpg">
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="s_product">
                            <a href="<?php echo RUTA_URL ?>/Login/verArticulos/2"><img width="285" height="213" src="<?php echo RUTA_URL ?>/img/chaquetas.jpg"></a>
                            <div class="s_overlay"></div>
                            <h2>Equipaciones de moto</h2>

                        </div>
                            <h3><a href="<?php echo RUTA_URL ?>/Login/verArticulos/2">Ver</a></h3>
                        </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="s_product">
                            <a href="<?php echo RUTA_URL ?>/Login/verArticulos/3"><img alt="" height="200" src="<?php echo RUTA_URL ?>/img/casco.jpg"></a>
                            <div class="s_overlay"></div>
                            <h2>Cascos</h2>
                        </div>
                            <h3><a href="<?php echo RUTA_URL ?>/Login/verArticulos/3">Ver</a></h3>
            
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="s_product">
                            <a href="<?php echo RUTA_URL ?>/Login/verArticulos/4"><img alt="50" height="200" src="<?php echo RUTA_URL ?>/img/moto.jpg"></a>

                            <div class="s_overlay"></div>
                            <h2>Motos</h2>
                        </div>
                            <h3><a href="<?php echo RUTA_URL ?>/Login/verArticulos/4">Ver</a></h3>
                        </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="s_product">
                            <a href="<?php echo RUTA_URL ?>/Login/verArticulos/1"> <img alt="" src="<?php echo RUTA_URL ?>/img/piezas.jpg"></a>
                            <div class="s_overlay"></div>
                            <h2>Piezas</h2>

                        </div>
                            <h3><a href="<?php echo RUTA_URL ?>/Login/verArticulos/1">Ver</a></h3>

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
                        <marquee scrolldelay="1" scrollamount="10" direction="left" loop="infinite" onmouseout="this.start()" onmouseover="this.stop()">
                            <img HSPACE="70" VSPACE="70" src="<?php echo RUTA_URL ?>/img/marcas-aprilia.jpg" height="200px" width="200px" />
                            <img HSPACE="70" VSPACE="70" src="<?php echo RUTA_URL ?>/img/marca-kawa.jpg" height="200px" width="200px" />
                            <img HSPACE="70" VSPACE="70" src="<?php echo RUTA_URL ?>/img/marca-ktm.jpg" height="200px" width="200px" />
                            <img HSPACE="70" VSPACE="70" src="<?php echo RUTA_URL ?>/img/marcas-honda.jpg" height="200px" width="200px" />
                            <img HSPACE="70" VSPACE="70" src="<?php echo RUTA_URL ?>/img/marcas-yamaha.jpg" height="200px" width="200px" />
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
</div>

</html>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
</center>
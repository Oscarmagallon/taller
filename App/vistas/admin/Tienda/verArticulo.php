<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Single Product</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
</section>
<?php print_r($datos) ?>

    <div class="clear"></div>
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   <div class="logo">
                    <a href="#"><h2>LOGO</h2></a>
                   </div>
                </div>
                <div class="col-md-7">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="#">HOME</a></li>
                      <li><a href="#">SHOP</a></li>
                      <li><a href="#">BLOG</a></li>
                      <li><a href="#">SHORTCODE</a></li>
                      <li><a href="#">FEATURE</a></li>
                      <li><a href="#">PAGES</a></li>
                    </ul>
                </div>
                <style type="text/css">
.nav.navbar-nav {
  margin-top: 28px;
}
.navbar-nav > li > a {
  color: #665f5f;
  font-size: 21px;
    font-family: 'Roboto', sans-serif;
}
.nav.navbar-nav a:hover {
    background: #fff;
    color: #f39c12
}
</style>
<p>hola</p>
                <div class="col-md-2">
                    <div class="cart">
                        <p><i class="bi bi-cart2"></i><sup>0</sup> &#36;&nbsp;&nbsp;0.00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="related-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bar">
                        <h2>Related Products</h2>
                        <img src="img/bar.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="product">
                <div class="row">
                    <?php foreach ($datos['articulos'] as $a):?>

                    <div class="col-md-3">
                        <div class="s_product">
                            <img src="img/marca-ktm.jpg" alt="">
                            <div class="s_overlay"></div>
                            <h2><?php echo $a->Tipo?></h2>
                            <h><?php echo $a->Descripcion?></h>
                            <h2><?php echo $a->Precio."$" ?></h2>
                            <h5><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Añadir al carrito</h5>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>  
<script src="js/bootstrap.min.js"></script>  
<script src="js/active.js"></script>  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once RUTA_APP.'/vistas/inc/header.php';
json_encode($datos); 
?>
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
                    <form action="javascript:getArticulo()" method="POST" id="getArticulos">
                        <div class="s_product">
                            <img src="img/marca-ktm.jpg" alt="">
                            <div class="s_overlay"></div>
                            <h2><?php echo $a->Tipo?></h2>
                            <h><?php echo $a->Descripcion?></h>
                            <h2><?php echo $a->Precio."$" ?></h2>
                            <input type="hidden" name="cod" value="<?php echo $a->idArticulosProvedores?>">
                            <button name = "boton" id="boton" form="getArticulos">Añadir al carrito</button> 
                        </div>
                        

                        </form>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script>
     let datoss = '<?php echo json_encode($datos); ?>';
        let datos = JSON.parse(datoss);
        button = document.getElementById('boton');
        button.addEventListener("click", function(){
            resultado = confirm('¿?');
            if(resultado){
              getArticulo();
            }
        });
    

        function getArticulo(){
      //cogemos lo datos del formulario
      const data = new FormData(document.getElementById("getArticulos"));
      fetch('<?php echo RUTA_URL?>/Tienda/getArticulos', {
          method: "POST",
          body: data,
      })
          .then((resp) => resp.json())
          .then((data) => {
              if (Boolean(data)){
                console.log(data);                        
                  
              } else {
                console.log('error al borrar el registro')
              }
          })
          .catch(function(error) {
            console.log(error)
          })
  }
     



</script>


  
</html>
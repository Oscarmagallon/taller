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
                <div id="divPrincipal" class="row">
                    
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script>
    let datoss = '<?php echo json_encode($datos['articulos']);?>';
        let datos = JSON.parse(datoss);
 
    function pintarPag(){
        let datoss = '<?php echo json_encode($datos); ?>';
        let datos = JSON.parse(datoss);
        var div = document.getElementById("divPrincipal");
        for (let i = 0; i < datos['articulos'].length; i++){
        var div2 = document.createElement("div")
        var imagen = document.createElement("img");
        var h2 = document.createElement("h2");
        var h = document.createElement("h");
        var h3 = document.createElement("h2");
        var input = document.createElement("input")
        var button = document.createElement("button");
        h2.appendChild(document.createTextNode(datos['articulos'][i]['Tipo']));
        h.appendChild(document.createTextNode(datos['articulos'][i]['Descripcion']));
        h3.appendChild(document.createTextNode(datos['articulos'][i]['Precio']));
        input.appendChild(document.createTextNode(datos['articulos'][i]['idArticulosProvedores']));
        button.appendChild(document.createTextNode("Comprar"))
        imagen.setAttribute("src", 'img/marca-ktm.jpg')
        input.setAttribute("id", "inputCod");
        input.setAttribute("hidden", true);
        div2.setAttribute("class", 'col-4');
        button.addEventListener("click", function(){
            getArticulo(datos['articulos'][i]['idArticulosProvedores']);
            

        });
        div2.appendChild(imagen);
        div2.appendChild(h2);
        div2.appendChild(h);
        div2.appendChild(h3);
        div2.appendChild(input);
        div2.appendChild(button);
        div.appendChild(div2);
        
        }
        
       


    }
    // let datoss = '<?php //echo json_encode($datos); ?>';
      //  let datos = JSON.parse(datoss);

        //console.log(datos['articulos'][1]['Tipo']);
        //button = document.getElementById('boton');
        //button.addEventListener("click", function(){
          //  resultado = confirm('¿?');
            //if(resultado){
              //getArticulo();
            //}
        //});
    

        function getArticulo(id){
      //cogemos lo datos del formulario
      let datoss = '<?php echo json_encode($datos); ?>';
        let datos = JSON.parse(datoss);
      const data = new FormData();
      data.append('id', id);
      data.append('dat', datos);

      fetch('<?php echo RUTA_URL?>/Tienda/getArticulos', {
          method: "POST",
          body: data,
      })
          .then((resp) => resp.json())
          .then((data) => {
              if (Boolean(data)){
                //console.log(data['Carrito']);       
                datos += data['Carrito'];
                console.log(datos);                 
                  
              } else {
                console.log('error al borrar el registro')
              }
          })
          .catch(function(error) {
            console.log(error)
          })
  }
     

pintarPag();

</script>


  
</html>
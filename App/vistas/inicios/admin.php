<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  </p><br /><br />
<p>Centrar toda la pagina</p>    

<div style="width:900px; position: relative; margin-left: auto; margin-right: auto;"> 
<div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col p-5 text-center"><h1><?php echo $datos['usuarioSesion']->Nombre ?></h1></div>
            <div class="col-3"></div>
        </div>
    	<section id="about" >
            <div class="container">
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 about-img wow fadeInLeft"  data-wow-delay="0s"  data-wow-duration="1.9s">                  
                  <img src="logo.png" alt="">
                </div>      
                <div class="col-sm-6 col-md-6 col-lg-6 content wow fadeInRight"  data-wow-delay="0s"  data-wow-duration="1.9s">                
                  <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                  <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>                 
                </div>
              </div>      
            <!-- Fila 2-->
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 about-img order-lg-2 wow fadeInRight"  data-wow-delay="0s"  data-wow-duration="1.9s">                         
                            <img src="../admin/Tienda/img/casco.jpg" alt="">           
                      </div>
                      <div class="col-sm-6 col-md-6 col-lg-6 content order-lg-1 wow fadeInLeft"  data-wow-delay="0s"  data-wow-duration="1.9s">                     
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                            <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>                          
                      </div>                                       
                    </div>
                  </div>
	</section>  
    <div id="pruebas">
        <p>Letras en movimento</p>
    <div class="n"><p>    <b><font color="#000000" face="georgia" size="4"><marquee width="400" scrollamount="5" bgcolor="#FFFFFF">Aquí tu texto</marquee>    </font></b></p><center>
        <br>
        <p>imagen con zoom</p>
    <img src="logoo.jpg" onmouseover="this.width=500;this.height=400;" onmouseout="this.width=200;this.height=150;" width="200" height="100" />
    <br>
    <p>cambiar de img   </p>
    <script language="javascript"> 
imagen1=new Image 
imagen1.src="../admin/Tienda/img/casco.jpg" 
imagen2=new Image 
imagen2.src="url dela imagen 2" 
var i=1; 
function cambiar() { 
if (i == 1) 
{ 
document.images['ejemplo'].src=imagen2.src 
i=2; 
} 
else 
{ 
document.images['ejemplo'].src=imagen1.src; 
i=1; 
} 
} 
</script><img src="url dela imagen 1" name="ejemplo" onMousedown="cambiar()">
<br>


    </div>
    <?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
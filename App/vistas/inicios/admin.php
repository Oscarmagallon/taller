<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<div style="width:900px; position: relative; margin-left: auto; margin-right: auto;"> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  </p><br /><br />
<div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="n"><p>    <b><font color="#000000" face="georgia" size="4"><marquee width="100%" scrollamount="5" bgcolor="#FFFFFF">Bienvenido <?php echo $datos['usuarioSesion']->Nombre ?></marquee>    </font></b></p><center>
<br>
            <div class="col-3"></div>
        </div>
    	<section id="about" >
            <div class="container">
              <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 about-img wow fadeInLeft"  data-wow-delay="0s"  data-wow-duration="1.9s">                  
                  <a href="<?php echo RUTA_URL?>/Tienda"><img onmouseover="this.width=500;this.height=400;"onmouseout="this.width=200;this.height=150;" src="<?php echo RUTA_URL ?>/img/proveedores.jpg" alt="" height="150" width="200" title="Proveedores"></a>
                </div>      
                <div class="col-sm-12 col-md-6 col-lg-6 content wow fadeInRight"  data-wow-delay="0s"  data-wow-duration="1.9s">                
                  <a href="<?php echo RUTA_URL ?>/MotosListas"><img onmouseover="this.width=500;this.height=400;" onmouseout="this.width=200;this.height=150;" src="<?php echo RUTA_URL ?>/img/check.png" height="150" width="200" title="Motos listas"></a>
                </div>
              </div>      
            <!-- Fila 2-->
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 about-img order-lg-2 wow fadeInRight"  data-wow-delay="0s"  data-wow-duration="1.9s">                         
                            <a href="<?php echo RUTA_URL ?>/Peticiones"><img onmouseover="this.width=500;this.height=400;" onmouseout="this.width=200;this.height=150;" src="<?php echo RUTA_URL ?>/img/incidencia.jpg" title="Ver Incidencias" height="150" width="200"></a>           
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-6 content order-lg-1 wow fadeInLeft"  data-wow-delay="0s"  data-wow-duration="1.9s">                     
                            <a href="<?php echo RUTA_URL ?>/Mecanico"><img onmouseover="this.width=500;this.height=400;" onmouseout="this.width=200;this.height=150;" src="<?php echo RUTA_URL ?>/img/mecanico.jpg"  title="Añadir Mecanico" height="150" width="200"></a>                          
                      </div>                                       
                    </div>
                  </div>
	</section>  
    <div id="pruebas">
        <p>Letras en movimento</p>
        <br>
        <p>imagen con zoom</p>
    <img src="logoo.jpg" onmouseover="this.width=500;this.height=400;" onmouseout="this.width=200;this.height=150;" width="200" height="100" />
    <br>
    <p>cambiar de img   </p>
    <script language="javascript"> 
imagen1=new Image 
imagen1.src="/admin/Tienda/img/casco.jpg" 
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
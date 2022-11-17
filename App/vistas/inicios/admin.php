<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<div style="width:900px; position: relative; margin-left: auto; margin-right: auto;"> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  </p><br /><br />
<div class="container">
  <?php print_r($datos['listas']) ?>
        <div class="row">
            <div class="col-3"></div>
            <div class="n"><p>    <b><font color="#000000" face="georgia" size="4"><marquee width="100%" scrollamount="5" bgcolor="#FFFFFF">Bienvenido <?php echo $datos['usuarioSesion']->Nombre ?></marquee>    </font></b></p><center>
<br>
            <div class="col-3"></div>
        </div>
    	<section id="about" >
            <div class="container">
              <div class="row">                
                <div class="col-3 col-md-4 col-sm-6 col-12">
                <div class="card " style="width: 18rem;"> 
                  <div class="card-body">
                    <h5>Numero de peticioes disponibles</h5>
                    <p class="card-text" ><?php  echo $m->Marca; echo "  "; echo $m->Modelo; echo "  ";echo $m->CC;  ?></p>
                    <a href="<?php echo RUTA_URL?>/Incidencias/<?php echo $m->idMoto?>" class="btn btn-primary">Mandar a arreglar</a> 
                      <br> <br>
                    <a href="<?php echo RUTA_URL?>/Incidencias/verEstado/<?php echo $m->idMoto?>" class="btn btn-primary">Ver estado</a>        
                      <br> <br>
                    <img class="card-img-bottom" src="http://2.bp.blogspot.com/_EZ16vWYvHHg/S9Rmg1NUc9I/AAAAAAAALP4/VcIsVqptCtw/s1600/www.BancodeImagenesGratuitas.com+-Motocicletas-2.jpg" style="height:100%">
                      <br>
                    </div>
                  </div>

                </div>      
                <div class="col-sm-12 col-md-6 col-lg-6 content wow fadeInRight"  data-wow-delay="0s"  data-wow-duration="1.9s">                
                  <a href="<?php echo RUTA_URL ?>/MotosListas"><img src="<?php echo RUTA_URL ?>/img/check.png" height="150" width="200" title="Motos listas"></a>
                </div>
              </div>      
            <!-- Fila 2-->
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 about-img order-lg-2 wow fadeInRight"  data-wow-delay="0s"  data-wow-duration="1.9s">                         
                            <a href="<?php echo RUTA_URL ?>/Peticiones"><img src="<?php echo RUTA_URL ?>/img/incidencia.jpg" title="Ver Incidencias" height="150" width="200"></a>           
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-6 content order-lg-1 wow fadeInLeft"  data-wow-delay="0s"  data-wow-duration="1.9s">                     
                            <a href="<?php echo RUTA_URL ?>/Mecanico"><img src="<?php echo RUTA_URL ?>/img/mecanico.jpg"  title="Añadir Mecanico" height="150" width="200"></a>                          
                      </div>                                       
                    </div>
                  </div>
	</section>  
  
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
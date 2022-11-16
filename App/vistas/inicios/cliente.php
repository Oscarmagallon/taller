<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<link href="../Tienda/style.css" rel="stylesheet" type="text/css" />

<div class="container">
    <h3>Bienvenido a nuestro taller de motos</h3>
    <h4>Todo lo que necesitas al alcance de un click</h4>
    <section class="season">
    <img  src="<?php echo RUTA_URL?>/img/motoss.jpg">
    </section>
    <br>
    <div class="row">
        <div class="col-6 col-md-6 col-sm-6 col-12">
            <h3>Manda moto a arreglar</h3>
            <p>Accede a la pagina que te permite gestionar tus motos y generar una petición para arreglar la moto seleccionada. 
                También puedes ver el estado de tu petición a tiempo real. <br>
                Pd: Estate pendiente de tu email. Te mandaremos un mensaje cuando tengamos tu moto lista. <br>
            </p> 
            <button class="button btn-primary"><i class="bi bi-hand-index-thumb"></i> &nbsp;<a href="<?php echo RUTA_URL ?>/Peticiones" style="color:white"> Acceder a Peticiones</a> </button>           
        </div>
        <div class="col-6 col-md-6 col-sm-6 col-12">
            <h3>Tienda</h3>
            <p>Accede a la tienda de nuestra web.Te esperamos con los mejores productos a los mejores precios. <br> ¡A qué estas esperado para visitarnos!</p> 
            <button class="button btn-primary"><i class="bi bi-hand-index-thumb"></i> &nbsp;<a href="<?php echo RUTA_URL ?>/Tienda" style="color:white"></i>Acceder a la tienda</a></button>    
        </div>
    
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
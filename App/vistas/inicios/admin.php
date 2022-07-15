<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col p-5 text-center"><h1><?php echo $datos['usuarioSesion']->Nombre ?></h1></div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col p-5 text-center">LISTA DE SOLICITUDES</div>
            <div class="col-3"></div>
        </div>
        <div class="row mb-4">
            <div class="col-4 p-3">SolicitudSocio1</div>
            <div class="col-2">
                <div class="col">Nombre</div>
                <div class="col">DNI</div>
                <div class="col">Correo</div>
            </div>
            <div class="col-2 text-end p-3"><button type="button" class="btn btn-primary">Aceptar</button></div>
            <div class="col-1 text-center p-3"><button type="button" class="btn btn-primary">Denegar</button></div>
            <div class="col-3 p-3"><button type="button" class="btn btn-primary">Añadir a lista de espera</button></div>
        </div>
        
        <div class="row mb-4">
            <div class="col-4 p-3">SolicitudSocio2</div>
            <div class="col-2">
                <div class="col">Nombre</div>
                <div class="col">DNI</div>
                <div class="col">Correo</div>
            </div>
            <div class="col-2 text-end p-3"><button type="button" class="btn btn-primary">Aceptar</button></div>
            <div class="col-1 text-center p-3"><button type="button" class="btn btn-primary">Denegar</button></div>
            <div class="col-3 p-3"><button type="button" class="btn btn-primary">Añadir a lista de espera</button></div>
        </div>
        
        <div class="row mb-4">
            <div class="col-4 p-3">SolicitudSocio3</div>
            <div class="col-2">
                <div class="col">Nombre</div>
                <div class="col">DNI</div>
                <div class="col">Correo</div>
            </div>
            <div class="col-2 text-end p-3"><button type="button" class="btn btn-primary">Aceptar</button></div>
            <div class="col-1 text-center p-3"><button type="button" class="btn btn-primary">Denegar</button></div>
            <div class="col-3 p-3"><button type="button" class="btn btn-primary">Añadir a lista de espera</button></div>
        </div>
        
        <div class="row">
            <div class="col-3"></div>
            <div class="col p-5 text-center"><button type="button" class="btn btn-primary">Lista de espera</button></div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col p-5 text-center"><button type="button" class="btn btn-primary">Salir</button></div>
            <div class="col-3"></div>
        </div>
    </div>
    <?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
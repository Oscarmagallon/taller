<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<body class="container">
<h1>Estado</h1>
<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
<?php print_r($datos) ?>

    <div class="container-fluid px-2">
              <form autocomplete="off" class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Nombre de la marca" aria-label="Buscar">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>

    </div>
</nav>

<div class="col-12 table-responsive">
    <table class="table table-hover">

        <thead>
            <tr>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['Peticiones'] as $e): ?>
            <?php if(!empty($e->idPersonal) && $e->Terminado == 0):?>
                
            <tr>
                <td><?php echo $e->Tipo ?></td>
                <td><?php echo $e->Descripcion?></td>
                <td><?php echo $e->Fecha ?></td>    
                <td><a href="<?php echo RUTA_URL?>/Peticiones/peticionTerminada/<?php echo $e->idIncidencias ?>/<?php echo $e->idPersonal ?>/<?php echo $e->Fecha?>"><i class="bi bi-check-square-fill"></i></a>
                <a href="<?php echo RUTA_URL?>/Peticiones/addPieza/<?php echo $e->idIncidencias ?>"></a>
                </td>

                 
            </tr>
          
            <?php endif;?>
            <?php endforeach;?>
            
</body>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
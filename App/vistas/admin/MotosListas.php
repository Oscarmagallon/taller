<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<body class="container">
<h1>Motos Listas</h1>
<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
<?php print_r($datos['Listas']) ?>

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
                <th>Marca</th>
                <th>Modelo</th>
                <th>Pago</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['Listas'] as $m): ?>
            <?php if($m->Terminado == 1):?>
                
            <tr>
                <td><?php echo $m->Tipo ?></td>
                <td><?php echo $m->Descripcion?></td>
                <td><?php echo $m->Marca ?></td>
                <td><?php echo $m->Modelo ?></td>
                <td> <a href="<?php echo RUTA_URL?>/Pagos/<?php echo $m->idIncidencias ?>"> Añadir Coste</a></td>    
    
                 
            </tr>
          
            <?php endif;?>
            <?php endforeach;?>
            
</body>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

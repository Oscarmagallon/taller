<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<body class="container">
<h1>Mecánicos disponibles</h1>
<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
<?php print_r($datos['Motos']) ?>

    <div class="container-fluid px-2">
              <form autocomplete="off" class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Nombre de la marca" aria-label="Buscar">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>

    </div>
</nav>
<button type="button" class = "btn btn-primary">
    <a class="enlace" href="<?php echo RUTA_URL ?>/Motos/addMotoVista">Añadir Moto&nbsp;<i class="bi bi-plus-circle-fill"></i>
</a> 
</button>

<style>
    .enlace{
        color:white;
    }
</style>
<div class="col-12 table-responsive">
    <table class="table table-hover">

        <thead class = "cliente">
            <tr>
                <th>Cod</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>CC</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['Motos'] as $m): ?>
            <tr>
                <td><?php echo $m->idMoto ?></td>
                <td><?php echo $m->Marca?></td>
                <td><?php echo $m->Modelo ?></td>
                <td><?php echo $m->CC ?></td>
                <td> 
                    <a href="<?php echo RUTA_URL?>/Motos/editarMoto/<?php echo $m->idMoto ?>"><i class="bi bi-pencil-square"></i></a>
                    <a href="<?php echo RUTA_URL?>/Motos/borrarMoto/<?php echo $m->idMoto ?>"><i class="bi bi-trash"></i></a>
                </td>    
    
                 
            </tr>
            <?php endforeach;?>
            
</body>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

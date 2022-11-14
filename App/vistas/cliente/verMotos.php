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
    <a class="enlace" href="Mecanico/formAdd">Añadir &nbsp;<i class="bi bi-person-plus-fill"></i></a> 
</button>

<style>
    .enlace{
        color:white;
    }
</style>
<div class="col-12 table-responsive">
    <table class="table table-hover">

        <thead>
            <tr>
                <th>Cod</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['Mecanicos'] as $m): ?>
            <tr>
                <td><?php echo $m->idPersonal ?></td>
                <td><?php echo $m->Nombre?></td>
                <td><?php echo $m->Apellido ?></td>
                <td><?php echo $m->Correo ?></td>
                <td> 
                    <a href="<?php echo RUTA_URL?>/Mecanico/editar/<?php echo $m->idPersonal ?>"><i class="bi bi-pencil-square"></i></a>
                    <a href="<?php echo RUTA_URL?>/Mecanico/borrar/<?php echo $m->idPersonal ?>"><i class="bi bi-trash"></i></a>
                </td>    
    
                 
            </tr>
            <?php endforeach;?>
            
</body>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

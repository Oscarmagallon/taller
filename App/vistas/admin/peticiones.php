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
                <th>Mecánico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <form action="<?php echo RUTA_URL?>/Peticiones/anadirMecanico" method="POST">
        <tbody>
            <?php foreach($datos['Peticiones'] as $e): ?>
            <?php if(empty($e->idPersonal)):?>
            <tr>
                <td><?php echo $e->Tipo ?></td>
                <td><?php echo $e->Descripcion?></td>
                <td><?php echo $e->Fecha ?></td>
                <td>
                    <select name="mecanico" id="mecanico">
                        <?php foreach($datos["Mecanicos"] as $m): ?>
                        <option  value="<?php echo $m->idPersonal ?>"><?php echo $m->Nombre ?></option>
                        <?php endforeach?>
                    </select>
                </td>
                <td><button type="submit"> Añadir Mecanico </button></td>
                 
            </tr>
            <?php endif;?>
            <?php endforeach; 
?>
</body>
</form>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

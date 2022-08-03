<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<body class="container">
<h1>Estado</h1>
<?php print_r($datos)?>
<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">

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
                <th>Piezas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <form action="<?php echo RUTA_URL ?>/Piezas/add" method="POST">
        <tbody>
            <td>
            <input type="hidden" name = "idMoto" value=" <?php echo $datos["MotoPeticion"]?>">
            <input type="hidden" name="reparaciones" value="<?php echo $datos["Peticiones"][0]->idreparaciones?>">
            <select name="pieza" id="">
            <?php foreach($datos['Piezas'] as $m): ?>
                <option value="<?php echo $m->idArticulos?>"> <?php echo $m->Tipo." ".$m->Precio."$"?> </option>
            <?php endforeach;?>
            </select>
            </td>
            
            
            <td>
               <button type="submit">Aceptar</button>
            </td>
        </tbody>
        </form>
        
            
</body>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<body class="container">
<h1>Estado</h1>
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
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Pagar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['Estado'] as $e): ?>
                <?php $i =0; ?>
            <tr>
                <td><?php echo $e[$i]->Tipo ?></td>
                <td><?php echo $e[$i]->Descripcion?></td>
                <?php if(empty($e[$i]->idPersonal)){
                    echo "<td> En Espera </td>";
                }elseif(!empty($e[$i]->idPersonal) && $e[$i]->Terminado == 0 ){
                    echo "<td> En Progreso </td>";
                }else{echo  "<td> Terminado </td>";  } ?>
                <?php if(!empty($e[$i]->idreparaciones)):?>
                <td><a href="<?php echo RUTA_URL?>/Pagos/pagar/<?php echo $e[$i]->idreparaciones?>">Pagar</a></td>
                <?php endif; ?>
            </tr>
            <?php endforeach; 
?>
</body>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

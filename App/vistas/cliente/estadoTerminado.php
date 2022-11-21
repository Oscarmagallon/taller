<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<body class="container">
    <h1>Estado</h1>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
        <?php print_r($this->datos['usuarioSesion']) ?>
        <div class="container-fluid px-2">
            <form autocomplete="off" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Nombre de la marca" aria-label="Buscar">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>

        </div>
    </nav>
    <div class="col-12 table-responsive">
        <table class="table table-hover">

            <thead class="cliente" id="cliente">
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Pagar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['Estado'] as $e) : ?>
                    <tr>
                        <td><?php echo $e->Tipo ?></td>
                        <td><?php echo $e->Descripcion ?></td>
                        <?php if (empty($e->idPersonal)) {
                            echo "<td> En Espera </td>";
                        } elseif (!empty($e->idPersonal) && $e->Terminado == 0) {
                            echo "<td> En Progreso </td>";
                        } else {
                            echo  "<td> Terminado </td>";
                        } ?>
                        <?php if ($e->Terminado == 1) : ?>
                            <td><a href="<?php echo RUTA_URL ?>/Pagos/pagar/<?php echo $e->idreparaciones ?>">Pagar</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach;
                ?>
</body>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
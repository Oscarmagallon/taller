<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>


<a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>
<div class="card bg-light mt-5 w-75 card-center" style=" margin: auto;">
    <h2 class="card-header"> Rellenar tabla con las incidencias</h2>
    <form autocomplete="off" action="<?php echo RUTA_URL?>/Incidencias/peticion" method="post" class="card-body">
        <div class="mb-3">
        <label for="tipo">Tipo: <sup>*</sup></label>
            <input type="text" name="tipo" id="tipo" required class="form-control form-control-lg">
        </div>
        <div class="mb-3">
        <label for="descr">Descripcion:</label>
            <input type="text" name="descr" required id="descr" class="form-control form-control-lg" >
        </div>
        <div class="mb-3">
        <label for="fecha">Fecha:</label>
            <input type="text" name="fecha" id="fecha"  value = "<?php echo date('d/m/Y') ?>" disabled r class="form-control form-control-lg">
        </div>
        <input type="hidden" name="idMoto" id="idMoto" class="form-control form-control-lg" value="<?php echo $datos['id']?>">
        <input type="submit" class="btn btn-success" value="Hacer Peticion">
    </form>
    
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<?php print_r($datos) ?>
<body>
    <div class ="container">
        <div class="card">
            <h3>Costo Reparacion</h3>
            <table>
                <tr>
                    <td>Concepto</td>
                    <td>Descripcion</td>
                    <td> Coste </td>
                </tr>
                <?php foreach($datos['reparaciones'] as $e){
                    print_r($e);
                } ?>
            </table>
        </div>
    </div>
</body>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
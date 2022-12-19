<div class="container">
<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<body>
        <div class="row">
            <h3>Costo Reparacion</h3>
            <table class="table">
                <thead id="cliente" class="cliente">
                    <tr>

                        <td>Concepto</td>
                        <td>Descripcion</td>
                        <td> Coste </td>
                    </tr>
                </thead>
                <tfoot>
                    <?php $total = 0 ?>
                    <?php foreach ($datos['reparaciones'] as $e) : ?>
                        <tr>
                            <td><?php echo $e->Descr ?></td>
                            <td>Reparacion</td>
                            <td><?php echo $e->Ingreso ?></td>
                        </tr>
                        <?php $total = $total + $e->Ingreso ?>
                    <?php endforeach; ?>
                </tfoot>
            </table>
            <?php if (!$total == 0) : ?>
                <h3>Total &nbsp;<?php echo $total ?>&nbsp;&nbsp;<a href="<?php echo RUTA_URL ?>/Pagos/pagosCliente/<?php echo $datos['reparaciones'][0]->reparaciones_idreparaciones ?>"><button class="btn btn-primary">Pagar <i class="bi bi-cash-stack"></i></button></a></h3>
            <?php endif ?>
            <?php if ($total == 0) : ?>
                <p>No hay ningun coste para la moto</p>
            <?php endif ?>
      
        </div>
    </div>
</body>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
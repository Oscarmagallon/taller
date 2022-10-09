<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<body class="container">
<h1>Estado</h1>
<?php print_r($datos);
json_encode($datos); ?>

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
                <select name="Filtrar" id="elegir" onchange="javascript:ShowSelected()" >
                    <option value="1">Pieza</option>
                    <option value="2">Equipacion</option>
                    <option value="3">Casco </option>
                    <option value="4">Moto</option>
                </select>
            <input type="hidden" name = "idMoto" value=" <?php echo $datos["MotoPeticion"]?>">
            <input type="hidden" name="reparaciones" value="<?php echo $datos["Peticiones"][0]->idreparaciones?>">
            <select name="pieza" id="pieza">
            </select>
            </td>

            
            
            <td>
               <button type="submit">Aceptar</button>
            </td>
        </tbody>
        </form>
        <script>
             let datoss = '<?php echo json_encode($datos);?>';
             let datos = JSON.parse(datoss);
            function ShowSelected(){
            var select2 = document.getElementById("pieza");
            select2.innerHTML='';
            var select = document.getElementById("elegir"); /*Obtener el SELECT */
            var valor = select.options[select .selectedIndex].value
            for (let i = 0; i < datos['Piezas'].length; i++) {
                    option = document.createElement('option');
                    if (datos['Piezas'][i]['Tipo'] == valor && datos['Piezas'][i]['Vendido'] == 0 ){
                    option.appendChild(document.createTextNode(datos['Piezas'][i]['descr']+ '  '+datos['Piezas'][i]['Precio']));
                    option.setAttribute("value", datos['Piezas'][i]['idArticulos']);
                    console.log(datos['Piezas'][i]['idArticulos']);

                    select2.appendChild(option);
                    }
                   
                    
                    
             }
            
        }
            </script>
            
</body>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

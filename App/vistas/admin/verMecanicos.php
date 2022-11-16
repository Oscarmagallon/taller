<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<body class="container">
<h1>Mecánicos disponibles</h1>
<nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
<?php print_r($datos);
if(!empty($datos['tareas'])){
json_encode($datos['tareas']); 
}?>

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
                <td><a href="<?php echo RUTA_URL ?>/Mecanico/seguimiento/<?php echo $m->idPersonal ?>"><?php echo $m->Nombre?></a></td>
                <td><?php echo $m->Apellido ?></td>
                <td><?php echo $m->Correo ?></td>
                <td> 
                    <a href="<?php echo RUTA_URL?>/Mecanico/editar/<?php echo $m->idPersonal ?>"><i class="bi bi-pencil-square"></i></a>
                    <a href="<?php echo RUTA_URL?>/Mecanico/borrar/<?php echo $m->idPersonal ?>"><i class="bi bi-trash"></i></a>
                </td>    
    
                 
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <div id="seguimiento"></div>
</body>
<script>
    let datoss = '<?php echo json_encode($datos['tareas']); ?>';
    let datos = JSON.parse(datoss);

    if(datos.length != 0){
        div = document.getElementById("seguimiento")
        table = document.createElement('table')
        tr = document.createElement('tr')
        th1 = document.createElement('th')
        th2 = document.createElement('th')
        th3 = document.createElement('th')
        th1.appendChild(document.createTextNode('Tarea'))
        th2.appendChild(document.createTextNode('Titulo'))
        th3.appendChild(document.createTextNode('Descripción'))
        tr2 = document.createElement('tr');
        let i = 0;
        for( i = 0; i<datos.length; i++){
            console.log(datos[i])
        td = document.createElement('td')
        td.appendChild(document.createTextNode('Reparacion'))
        td1 = document.createElement('td')
        td1.appendChild(document.createTextNode(datos[i]['Tipo']))
        td2 = document.createElement('td')
        td2.appendChild(document.createTextNode(datos[i]['Descripcion']))
        }
        tr.appendChild(th1);
        tr.appendChild(th2);
        tr.appendChild(th3);
        tr2.appendChild(td)
        tr2.appendChild(td1)
        tr2.appendChild(td2)
        table.appendChild(tr)
        table.appendChild(tr2)
        div.appendChild(table)
    }
</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

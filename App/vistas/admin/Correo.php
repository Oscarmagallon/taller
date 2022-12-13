<div class="container">
  <?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
    <div class = "row">
        <h2>Correo</h2>
        <h4>Elije el usuario de la aplicacion con el cual te quieres comunicar y escribe un mensaje</h4>
        <form method="POST" action="<?php echo RUTA_URL ?>/Correo/correo">
            <label for="select"> <b>Usuarios a elegir:</b> </label>
            <select class="form-select" id="select" name ="correo">
                    <?php foreach ($datos['personal'] as $p):  ?>
                            <option  value="<?php echo $p->idPersonal ?>"><?php echo $p->Nombre ." ". $p->Apellido;  ?></option>
                    <?php endforeach; ?>
                   
            </select>
            <br>
            <input class = "col-12 form-control" placeholder="Cabecera del mensaje" name ="cabecera" type="text">
            <br>
            <input class = "col-12 form-control" placeholder="Escribe tu mensaje" name ="mensaje" type="text">
            <br>
            <button class="btn btn-primary">Enviar Correo</button>
        </form>
    </div>
  <?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" integrity="sha384-7ynz3n3tAGNUYFZD3cWe5PDcE36xj85vyFkawcF6tIwxvIecqKvfwLiaFdizhPpN" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo RUTA_URL ?>/css/estilos.css">
  <!-- <link rel="stylesheet" href="css/estilos.css"> -->
  <title><?php echo NOMBRE_SITIO ?></title>
</head>

<body>
  <!-- menú -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <?php if (empty($datos['usuarioSesion'])) : ?>
          <a class="navbar-brand" href="">¡Registrate!, Te estamos esperando</a>
        <?php endif; ?>
        <?php if (!empty($datos['usuarioSesion'])) : ?>
          <div class="imgcontainer">
            <img width="50px" height="50px" src="<?php echo RUTA_URL ?>/img/bicicleta.png">
          </div>
          <div><span style="visibility:hidden">............</span></div>
          <a class="navbar-brand" href="">Bienvenido <?php echo($datos['usuarioSesion']->Nombre) ?></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <?php endif; ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php if (!empty($datos['usuarioSesion']) && $datos['usuarioSesion']->Rol_idRol == 20) : ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/Cliente">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/Peticiones">Mandar moto a arregalar</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/Tienda">Tienda</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/Tienda/pedidos/<?php echo $datos['usuarioSesion']->idPersonal ?>">Pedidos</a>
              </li>
            </ul>
          <?php endif ?>
          <?php if (!empty($datos['usuarioSesion']) && $datos['usuarioSesion']->Rol_idRol == 10) : ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/Admin">Home</a>
              </li>
              <div class="dropdown">
              <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Peticiones</a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/Peticiones/motosConIncidencia">Peticiones en curso</a></li>
                <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/Peticiones ">Peticiones</a></li>
              </ul>
            </div>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/MotosListas">Motos Listas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/Tienda">Proveedores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/Mecanico">Añadir Mecanicos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/Tienda/aceptarPedidoAdmin">Peticion pedidos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/Correo">Mandar correo</a>
              </li>
            </ul>

          <?php endif ?>
          <?php if (!empty($datos['usuarioSesion'])) : ?>
            <ul class="d-flex navbar-nav ms-auto mb-2 mb-md-0 col-md-2">
              <li class="navbar-text">
                <?php echo $datos['usuarioSesion']->Nombre ?>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/login/logout">LogOut</a>
              </li>

            </ul>
          <?php endif; ?>
        </div>
      </div>
    </nav>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js "> </script>

  </header>
<br>


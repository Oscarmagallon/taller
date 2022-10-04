<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<form class="form-inline" method="Post">
  <div class="form-group  mx-sm-3 mb-2">
    <label for="staticEmail2" class="sr-only">Email</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary  mx-sm-3 mb-2">Confirm identity</button>
</form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
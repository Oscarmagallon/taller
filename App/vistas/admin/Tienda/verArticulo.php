<!DOCTYPE html>
<html lang="en">
<div class ="container">
<head>
  <?php require_once RUTA_APP . '/vistas/inc/header.php';
  json_encode($datos);
  ?>
  <!DOCTYPE html>


  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Single Product</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  </head>

<body>
  </section>


  <div class="clear"></div>
  <section class="header">
    <div class="container">
      <div class="row">
        <template id="template-footer">
          <th scope="row" colspan="2"> Total Productos </th>
          <td>10</td>
          <td>
            <button class="btn btn-danger btn-sm" id="vaciar-carrito">
              vaciar todo
            </button>
          </td>
          <td>
            <?php if(empty($datos['usuarioSesion']->Rol_idRol)): ?>
              <div title="Debes registrarte para comprar">
                <button class="btn btn-success btn-sm" disabled title="Debes registrarte para comprar" id="aceptar-carrito">
                    Aceptar
                </button>
              </div>
            <?php endif; ?>
            <?php if(!empty($datos['usuarioSesion']->Rol_idRol)): ?>
              <button class="btn btn-success btn-sm" id="aceptar-carrito">
                  Aceptar
              </button>
            <?php endif; ?>
          </td>
          <td class="font-weight-bold">€ <span></td>
        </template>
        <template id="template-carrito">
          <tr>
            <th scope="row">id</th>
            <td>cafe</td>
            <td>1</td>
            <td></td>
            <td>
              <button class="btn btn-info btn-sm">+</button>
              <button class="btn btn-danger btn-sm">-</button>

            </td>
            <td>€ <span>500</span></td>
          </tr>
        </template>

        <div class="col-md-2">
        
        </div>
      </div>
    </div>
  </section>
  <div class="related-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="bar">
            <h2>Productos en stock:</h2>
            <img src="img/bar.jpg" alt="">
          </div>
        </div>
      </div>

      <div class="product">


        <div id="items" class="row"> </div>
        <br> <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Item</th>
              <th scope="col">Cantidad</th>
              <th scope="col" class="descr">Descripcion</th>
              <th scope="col">Acción</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody id="cards"></tbody>
          <tfoot>
            <tr id="footer">
              <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
            </tr>
          </tfoot>

      </div>

      </table>
    </div>
  </div>
  </section>
</body>
</div>
</html>
<script>
  let datoss = '<?php echo json_encode($datos['articulos']); ?>';
  let datos = JSON.parse(datoss);
  let carrito = {};

  const cards = document.getElementById('cards');
  const footer = document.getElementById('footer');
  const items = document.getElementById('items');
  const fragment = document.createDocumentFragment();
  const templateFooter = document.getElementById('template-footer').content;
  const templateCarrito = document.getElementById('template-carrito').content;


//creamos la estructura de la página
  function pintarPag() {
    let datoss = '<?php echo json_encode($datos); ?>';
    let datos = JSON.parse(datoss);
    var div = document.getElementById("items");
    for (let i = 0; i < datos['articulos'].length; i++) {
      var div2 = document.createElement("div")
      var imagen = document.createElement("img");
      var h2 = document.createElement("h2");
      var h = document.createElement("h");
      var h3 = document.createElement("h2");
      var input = document.createElement("input");
      var button = document.createElement("button");
      var tipo = datos['articulos'][i]['Tipo']
      var t = verTipo(tipo)

      h2.appendChild(document.createTextNode(t));
      h.appendChild(document.createTextNode(datos['articulos'][i]['Descripcion']));
      h3.appendChild(document.createTextNode(datos['articulos'][i]['Precio']));
      button.appendChild(document.createTextNode("Comprar"))
      imagen.setAttribute("src", '<?php echo RUTA_URL?>/public/img/<?php echo $datos['articulos'][0]->Tipo ?>.jpg')
      imagen.setAttribute("height", "80")
      imagen.setAttribute("width", "80")

      div2.setAttribute("class", 'col-4');
      button.setAttribute("class", 'btn-comprar');
      h2.setAttribute("class", 'h2');
      h.setAttribute("class", 'h');
      h3.setAttribute("class", 'h3');

      button.dataset.id = datos['articulos'][i]['idArticulosProvedores'];
      h2.dataset.id = datos['articulos'][i]['Tipo'];
      h.dataset.id = datos['articulos'][i]['Descripcion'];
      h3.dataset.id = datos['articulos'][i]['Precio'];
      div2.appendChild(imagen);
      div2.appendChild(h2);
      div2.appendChild(h);
      div2.appendChild(h3);
      div2.appendChild(button);
      div.appendChild(div2);



    }




  }



  //captamos los clicks de la pagina
  items.addEventListener('click', e => {
    addCarrito(e)

  })

  cards.addEventListener('click', e => {
    btnAccion(e);
  })

  //si el click viene de un boton de compra de un articulo
  const addCarrito = e => {
    if (e.target.classList.contains('btn-comprar')) {
      setCarrito(e.target.parentElement) //cogemos ese click y los elementos que engloba
    }
    e.stopPropagation()
  }
  //llenamos el objeto
  setCarrito = objeto => {
    const producto = {
      id: objeto.querySelector('.btn-comprar').dataset.id,
      tipo: objeto.querySelector('.h2').dataset.id,
      descripcion: objeto.querySelector('.h').dataset.id,
      precio: objeto.querySelector('.h3').dataset.id,
      cantidad: 1
    }
    if (carrito.hasOwnProperty(producto.id)) {
      producto.cantidad = carrito[producto.id].cantidad + 1
    }
    carrito[producto.id] = {
      ...producto
    };
    pintarCarrito()
  }
  pintarPag();

  const pintarCarrito = () => {
    console.log(carrito);
    cards.innerHTML = '';
    Object.values(carrito).forEach(producto => {
      //vamos seleccionando los elementos ya creado en el html y los vamos rellenando con datos del carrito
      templateCarrito.querySelector('th').textContent = producto.id;
      templateCarrito.querySelectorAll('td')[0].textContent = producto.tipo;
      templateCarrito.querySelectorAll('td')[1].textContent = producto.cantidad;
      templateCarrito.querySelectorAll('td')[2].textContent = producto.descripcion;
      templateCarrito.querySelector('.btn-info').dataset.id = producto.id;
      templateCarrito.querySelector('.btn-danger').dataset.id = producto.id;
      templateCarrito.querySelector('span').textContent = producto.cantidad * producto.precio;

      const clone = templateCarrito.cloneNode(true);
      fragment.appendChild(clone);

    })
    cards.appendChild(fragment);
    pintarFooterCarrito();

  }

  const pintarFooterCarrito = () => {
    //inicializamos a vacio
    footer.innerHTML = '';
    if (Object.keys(carrito).length === 0) {
      footer.innerHTML = `<th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>`
      return;
    }
    //pasamos el carrito a la funcion donde acc suma cantidad de los productos.
    var nCantidad = Object.values(carrito).reduce((acc, {
      cantidad
    }) => acc + cantidad, 0);
    //pasamos el carrito a la funcion donde acc suma precio de los productos.
    var nPrecio = Object.values(carrito).reduce((acc, {
      cantidad,
      precio
    }) => acc + cantidad * precio, 0);

    //les mandamos los datos para que los pinte
    templateFooter.querySelectorAll('td')[0].textContent = nCantidad;
    templateFooter.querySelector('span').textContent = nPrecio;
    //clonamos el template
    const clone = templateFooter.cloneNode(true);
    fragment.appendChild(clone);
    footer.appendChild(fragment);

    var btnVaciar = document.getElementById('vaciar-carrito');
    btnVaciar.addEventListener('click', () => {
      carrito = {};
      pintarCarrito();
    })

    var btnGuardar = document.getElementById('aceptar-carrito');
    btnGuardar.addEventListener('click', () => {
      guardar();
    })
  }

  function verTipo(tipo) {
    console.log(tipo)
    switch (tipo) {
      case 1:
        tipo = "Pieza"
        break;

      case 2:
        tipo = "Equipacion"
        break;

      case 3:
        tipo = "Casco"
        break;

      case 4:
        tipo = "Moto"
        break;
    }
    return tipo;
  }

  function guardar() {
    //console.log(carrito);
    guardarCarrito(carrito);
    //gracias a libreria de sweetAlert en el header
    swal({
      title: "Compra realizada",
      text: "La compra ha sido relizada con éxito",
      icon: "success"
    });

    //vaciamos el carrito una vez comprado
    footer.innerHTML = '';
    carrito = {};
    pintarCarrito();

  }


  const btnAccion = e => {
    //vemos el objeto clicado, y buscamos que sea el boton de aumentar con clase btn-info 
    console.log(e.target.parentElement);
    if (e.target.classList.contains('btn-info')) {
      //accedemos al elemento del carrito clicado, ya que el botón tiene el id del objeto que queremos sumar.
      const producto = carrito[e.target.dataset.id];
      //aumentamos la cantidad del producto
      producto.cantidad++
      //clonamos el producto en el id que le corresponde dentro del array carrito
      carrito[e.target.dataset.id] = {
        ...producto
      };
      pintarCarrito();
    }
    //restar
    if (e.target.classList.contains('btn-danger')) {
      const producto = carrito[e.target.dataset.id];
      producto.cantidad--;
      if (producto.cantidad === 0) {
        delete carrito[e.target.dataset.id];
      }
      pintarCarrito();
    }

  }

  //funcion asincrona para guardar el carrito, mandando los datos a el controlador
  function guardarCarrito(carrito) {

    fetch(`<?php echo RUTA_URL ?>/Tienda/carrito`, {
        method: 'POST',
        body: JSON.stringify(carrito),
        headers: {
          'Content-Type': 'application/json' // AQUI indicamos el formato
        }

      })
      .then(function(response) {
        return response.text();
      })
      .then(function(data) {
        console.log(data);
      })
      .catch(function(error) {
        console.error(error);
      })
  }
</script>



</html>
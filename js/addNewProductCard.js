var productos = 1;
// Obtener el elemento select por su id
var select = document.getElementById("products");

// Obtener todas las opciones del select
var opciones = select.options;

function addNewProductCard() {
  const products = document.getElementById("productslist");
  productos++;
  // Crea un nuevo div para la tarjeta de producto
  const newProductCard = document.createElement("div");
  newProductCard.className = "card py-4 px-3 producto mb-4";
  var card = `<h5>Producto ${productos}</h5>
                <div class="input-group">
                <select class="form-select" name="products[]" id="products" required="true">
                    <option value="">Seleccionar</option>
                                        `;
  for (var i = 1; i < opciones.length; i++) {
    var option = opciones[i].value;
    card += `<option value=${option}>${opciones[i].text}</option>`;
  }

  card += `</select>
            <input type="number" class="form-control" name="quantity[]" placeholder="Cantidad"
            required="true" />

          <button type="button" class="btn btn-danger" onclick="eliminarElemento(this)">
            <i class="fa-solid fa-trash"></i>
          </button>
          </div>`;

  newProductCard.innerHTML = card;

  // Agrega el nuevo div al contenedor de productos
  products.appendChild(newProductCard);
}


function eliminarElemento(boton) {
  if (productos <= 1) {
    return;
  }
  // Obtén el elemento padre <li> del botón
  var elementoPadre = boton.parentNode;
  elementoPadre = elementoPadre.parentNode;

  console.log(elementoPadre);

  // Obtén el elemento padre <ul> de la lista
  var lista = document.getElementById("productslist");

  // Elimina el elemento <li> de la lista
  lista.removeChild(elementoPadre);

  // Resta uno al contador
  productos--;

  // Actualiza los textos de los elementos restantes
  actualizarNumerosProductos(lista);
}


function actualizarNumerosProductos(lista) {
  // Obtén todos los elementos <div> con clase "producto" dentro de la lista
  var productos = lista.getElementsByClassName("producto");

  // Recorre los elementos y actualiza sus números de producto
  for (var i = 0; i < productos.length; i++) {
      productos[i].querySelector('h5').textContent = "Producto " + (i + 1);
  }
}


function limpiarFormulario() {
  // Obtén una referencia al formulario
  var formulario = document.getElementById("miFormulario");

  // Resetea el formulario
  formulario.reset();
}
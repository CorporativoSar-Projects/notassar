function ocultarInicio() {
    //Aqui ocultamos la columna de importe, para mostrarla después ya con el cálculo hecho.		
    document.getElementById('titImporte').style.display="none";
    document.notas.importe.style.display="none";
    document.notas.importe2.style.display="none";
    document.notas.importe3.style.display="none";
    document.notas.importe4.style.display="none";
}

function calculo() {
    var v=document.notas.precio.value;
    document.notas.importe.value=v;
}

function quitarServicio() {
    var e=document.getElementById('idservicio2');
    e.options[e.selectedIndex].text="Servicio borrado";
}

var currentLoc = window.location.href;
var links = document.querySelectorAll('nav a');
for (var i=0; i<links.length; i++) {
    if (links[i].href===currentLoc) {
        links[i].classList.add('active');
        break;
    }
}
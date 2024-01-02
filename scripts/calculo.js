
$(document).ready(function()
{
    $('#btGenera').click(function()
        {
            insertar();
        });
});

function inicial() {
var f="<?php echo $folio ?>";
var tn="<?php echo $Notes->getIva() ?>";
var nc="<?php echo $nomCliente; ?>";
var dc="<?php echo $domCliente; ?>";
document.notas.folio.value=f;
document.notas.folio.disabled=true;
document.notas.tipoNota.value=tn;
document.notas.nomCliente.value=nc;
document.notas.domCliente.value=dc;
/*Llenado de campos fila 1*/
var ids="<?php echo $idServicio; ?>";
var c="<?php echo $cantidad; ?>";
var d="<?php echo $descripcion; ?>";
var p="<?php echo $precio; ?>";
var i="<?php echo $importe; ?>";

//document.notas.idservicio.value="HOLA TEST";
document.notas.idservicio.value=ids;
document.notas.cantidad.value=c;
document.notas.descripcion.value=d;
document.notas.precio.value=p;
document.notas.importe.value=i;

/*Llenado de campos fila 2*/
var ids2="<?php echo $idServicio2; ?>";
var c2="<?php echo $cantidad2; ?>";
var d2="<?php echo $descripcion2; ?>";
var p2="<?php echo $precio2; ?>";
var i2="<?php echo $importe2; ?>";

document.notas.idservicio2.value=ids2;
document.notas.cantidad2.value=c2;
document.notas.descripcion2.value=d2;
document.notas.precio2.value=p2;
document.notas.importe2.value=i2;

/*Llenado de campos fila 3*/
var ids3="<?php echo $idServicio3; ?>";
var c3="<?php echo $cantidad3; ?>";
var d3="<?php echo $descripcion3; ?>";
var p3="<?php echo $precio3; ?>";
var i3="<?php echo $importe3; ?>";

document.notas.idservicio3.value=ids3;
document.notas.cantidad3.value=c3;
document.notas.descripcion3.value=d3;
document.notas.precio3.value=p3;
document.notas.importe3.value=i3;

/*Llenado de campos fila 4*/
var ids4="<?php echo $idServicio4; ?>";
var c4="<?php echo $cantidad4; ?>";
var d4="<?php echo $descripcion4; ?>";
var p4="<?php echo $precio4; ?>";
var i4="<?php echo $importe4; ?>";

document.notas.idservicio4.value=ids4;
document.notas.cantidad4.value=c4;
document.notas.descripcion4.value=d4;
document.notas.precio4.value=p4;
document.notas.importe4.value=i4;

document.notas.tipoNota.disabled=true;
document.notas.nomCliente.disabled=true;
document.notas.domCliente.disabled=true;
document.notas.idservicio.disabled=true;
document.notas.idservicio2.disabled=true;
document.notas.idservicio3.disabled=true;
document.notas.idservicio4.disabled=true;
document.notas.cantidad.disabled=true;
document.notas.cantidad2.disabled=true;
document.notas.cantidad3.disabled=true;
document.notas.cantidad4.disabled=true;
document.notas.descripcion.disabled=true;
document.notas.descripcion2.disabled=true;
document.notas.descripcion3.disabled=true;
document.notas.descripcion4.disabled=true;
document.notas.precio.disabled=true;
document.notas.precio2.disabled=true;
document.notas.precio3.disabled=true;
document.notas.precio4.disabled=true;
document.notas.importe.disabled=true;
document.notas.importe2.disabled=true;
document.notas.importe3.disabled=true;
document.notas.importe4.disabled=true;
}
var currentLoc = window.location.href;
var links = document.querySelectorAll('nav a');
for (var i=0; i<links.length; i++) {
if (links[i].href===currentLoc) {
    links[i].classList.add('active');
    break;
}
}
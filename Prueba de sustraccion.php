<?php
$cadena = "SA4";
$subcadena = substr($cadena, 2); // Devuelve "Hola"
$subcadena_mb = mb_substr($cadena, 0, 1);
$subcadena = $subcadena++;
$cadena = $subcadena_mb + $subcadena;
echo $cadena;
 //Devuelve "mundo"
?>
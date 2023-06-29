<?php
	//$conexion=mysqli_connect("localhost","corpo240_admin","upiicsa2022","corpo240_corporativosar");
	$conexion=mysqli_connect("localhost","root","","corporativo_sar");
	if (mysqli_connect_errno()) {
		print("<div style='background-color:#D02525; width:100%; color:white;'>Fallo la conexion</div>");
	}
	else{
		//Cambioos en código temporales
		print("<div style='background-color:#0EB50E; width:100%; color:white;'>Estas conectado</div>");
	}
?>
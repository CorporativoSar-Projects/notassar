<?php
	// $conexion=mysqli_connect("localhost", "corpo240_admin", 'INNSOL"="#()', "corpo240_InnsolNotas");
	$conexion=mysqli_connect("localhost", "root",'', "notasinnsol");

	if (mysqli_connect_errno()) {
		print("<div style='background-color:#D02525; width:100%; color:white;'>Fallo la conexion</div>");
	}
	else{
		//Cambioos en código temporales
		print("<div style='background-color:#0EB50E; width:100%; color:white;'>Estas conectado</div>");
	}
?>
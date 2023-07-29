<?php 
    session_start();
	include 'conexion.php';
	error_reporting(0);
	echo "Usuario: ".$_SESSION['$user'];
    $serviceOptSelected=$_GET['precioServicio'];
    $query = "SELECT precio_servicio FROM servicio WHERE nom_servicio='$serviceOptSelected'";
    //$query = "SELECT precio_servicio FROM servicio WHERE nom_servicio='Bungalow Grande'";
    $resultado=$conexion->query($query);
    //$resultado = mysqli_query($conexion, $query);
    // Obtener los resultados de la consulta
    while ($fila =mysqli_fetch_array($resultado)) {
        //echo "<br>Dato de consulta:".$fila[precio_servicio];
        $datos = $fila[precio_servicio];
    }
    // Devolver los resultados en formato JSON
    echo $datos;
?>
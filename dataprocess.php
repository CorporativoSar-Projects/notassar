<?php
	session_start();
	include 'conexion.php';
	error_reporting(0);
	echo "Usuario: ".$_SESSION['$user'];
	$varsesion=$_SESSION['$user'];
	if($varsesion==null || $varsesion=='')
	{
    	echo 'Debes de iniciar sesion para poder ingresar';
    	header('Location: index.php');
		die();
	}
	global $agente;
	$flagDataProcess=$_GET['flagDataProcess'];
	/*$flagAdd=$_GET['flagAdd'];
	$flagSearch=$_GET['flagSearch'];
	$flagDelete=$_GET['flagDelete'];*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/styleSAR.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="img/1.png"/>
	<title>Estatus de operación</title>
</head>
<body>
	<?php include 'menu.php';
	if ($flagDataProcess=="a")
	{
		$idServicio=$_GET['idServ'];
		$nomServicio=$_GET['nomServ'];
		$descServicio=$_GET['descServ'];
		$precioServicio=$_GET['precioServ'];
		$queU="INSERT INTO servicio (id_servicio,nom_servicio,desc_servicio,precio_servicio) VALUES ('$idServicio','$nomServicio','$descServicio','$precioServicio')";
		if ($conexion->query($queU))
		{
			echo "
			<div id='parent'>		
				<div class='alert alert-success' id='divSuccessAdd' role='alert'>
				<h4 class='alert-heading'>Operación exitosa</h4>
				<p>Se ha agregado un nuevo servicio. Ahora podrás visualizarlo con los demás servicios.
				<hr>
				<a href='gestionarservicios.php' class='mb-0'><p class='mb-0'>Finalizar</p></a>
				</div>
			</div>";
			//echo "<script>alert('SERVICIO AGREGADO CORRECTAMENTE.');</script>";
		}
		else
		{
			echo "
			<div id='parent'>		
				<div class='alert alert-danger' id='divSuccessAdd' role='alert'>
				<h4 class='alert-heading'>Fallo en operación</h4>
				<p>No se ha logrado agregar el servicio anterior.</p>
				<p>Por favor valide los datos del servicio y repita el proceso.</p>
				<p><b>Si sigue presentando fallas, comuníquese con el Administrador del sistema.</b></p>
				<hr>
				<br>
				<a href='gestionarservicios.php' class='mb-0'><p class='mb-0'>Finalizar</p></a>
				</div>
			</div>";	
		}
	}
	else if ($flagDataProcess=="e")
	{
		$idServicio=$_GET['idServ'];
		$nomServicio=$_GET['nomServ'];
		if ($nomServicio=="->deleteAllServicesNow") {
			$deleteServices="DELETE FROM servicio WHERE id_servicio<>''";
		}
		else if ($nomServicio=="" && $idServicio=="") {
			
		}
		else if ($nomServicio<>"" && $idServicio=="") {
			$deleteServices="DELETE FROM servicio WHERE nom_servicio='$nomServicio'";
		}
		else if ($nomServicio=="" && $idServicio<>"") {
			$deleteServices="DELETE FROM servicio WHERE id_servicio='$idServicio'";
		}
		else
		{
			$deleteServices="DELETE FROM servicio WHERE id_servicio='$idServicio' or nom_servicio='$nomServicio'";
		}		
		$conexion->query($deleteServices);
		if (mysqli_affected_rows($conexion)>0)
		{
			echo "
			<div id='parent'>		
				<div class='alert alert-success' id='divSuccessAdd' role='alert'>
				<h4 class='alert-heading'>Operación exitosa</h4>
				<p>Se ha <b>eliminado</b> el servicio. Da clic en Finalizar para concluir este proceso y regresar a la página anterior.
				<hr>
				<a href='gestionarservicios.php' class='mb-0'><p class='mb-0'>Finalizar</p></a>
				</div>
			</div>";
			//echo "<script>alert('SERVICIO AGREGADO CORRECTAMENTE.');</script>";
		}
		else
		{
			echo "
			<div id='parent'>		
				<div class='alert alert-danger' id='divSuccessAdd' role='alert'>
				<h4 class='alert-heading'>Fallo en operación</h4>
				<p>No se ha logrado <b>eliminar</b> el servicio.</p>
				<p>Por favor valida los datos del servicio y repite el proceso.</p>
				<p><b>Si sigues presentando fallas, comunícate con el Administrador del sistema.</b></p>
				<hr>
				<br>
				<a href='gestionarservicios.php' class='mb-0'><p class='mb-0'>Finalizar</p></a>
				</div>
			</div>";	
		}
	}
	else if ($flagDataProcess=="ap")
	{
		$queU="SELECT * FROM usuario_admin WHERE nom_usuario='$varsesion'";
		$nou=$conexion->query($queU);
		while ($valor=mysqli_fetch_array($nou))
		{
			$agente=$valor[nombre_s];			
		}
		$nomProsp=$_GET['nomProsp'];
		$domProsp=$_GET['domProsp'];
		$indProsp=$_GET['indProsp'];
		$nomRep=$_GET['nomRep'];
		$telProsp=$_GET['telProsp'];
		$correoProsp=$_GET['correoProsp'];
		$servIntProsp=$_GET['servIntProsp'];
		$origenProsp=$_GET['origenProsp'];
		$estatusProsp=$_GET['estatusProsp'];
		$opcionTextoServ=array('pdmktdig'=>'Plan Despega - MKT Digital','pbmktdig'=>'Plan Básico - MKT Digital','pbplusmktdig'=>'Plan Básico plus - MKT Digital','ptmktdig'=>'Plan Total - MKT Digital','pemktdig'=>'Plan Exponencial - MKT Digital','ds'=>'Desarrollo de software','capms365'=>'Consultoría y capacitación MS365');
		$textoptionServ=$opcionTextoServ[$servIntProsp];
		$queU="INSERT INTO prospecto (id_p,nom_prospecto,dom_prospecto,fig_jur_prospecto,giro,tel_prospecto,correo_prospecto,representante,origen,servicio_interes,estatus,agente,comentario,nom_usuario) VALUES (null,'$nomProsp','$domProsp','','$indProsp','$telProsp','$correoProsp','$nomRep','$origenProsp','$textoptionServ','$estatusProsp','$agente','','$varsesion')";
		if ($conexion->query($queU))
		{
			echo "
			<div id='parent'>		
				<div class='alert alert-success' id='divSuccessAdd' role='alert'>
				<h4 class='alert-heading'>Operación exitosa</h4>
				<p>Se ha agregado un nuevo prospecto. Ahora podrás visualizarlo con los demás.
				<hr>
				<a href='prospeccion.php' class='mb-0'><p class='mb-0'>Finalizar</p></a>
				</div>
			</div>";
			//echo "<script>alert('SERVICIO AGREGADO CORRECTAMENTE.');</script>";
		}
		else
		{
			echo "
			<div id='parent'>		
				<div class='alert alert-danger' id='divSuccessAdd' role='alert'>
				<h4 class='alert-heading'>Fallo en operación</h4>
				<p>No se ha logrado agregar el nuevo prospecto.</p>
				<p>Por favor valide la información y repita el proceso.</p>
				<p><b>Si sigue presentando fallas, comuníquese con el Administrador del sistema.</b></p>
				<hr>
				<br>
				<a href='prospeccion.php' class='mb-0'><p class='mb-0'>Finalizar</p></a>
				</div>
			</div>";	
		}
	}
	?>
</body>
</html>
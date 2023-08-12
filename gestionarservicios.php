<?php 
    session_start();
	include 'conexion.php';
	error_reporting(0);
	echo "Usuario: ".$_SESSION['$user'];
	$CE = $_SESSION['$CodiEmp'];
	$varsesion=$_SESSION['$user'];
	if($varsesion==null || $varsesion=='')
	{
    	echo 'Debes de iniciar sesion para poder ingresar';
    	header('Location: index.php');
		die();
	}
	/*global $cont;
	global $id;
	$cont=1;*/
	$rs = mysqli_query($conexion, "SELECT MAX(folio_nota) AS id FROM nota");
	if ($row = mysqli_fetch_row($rs)) {
		$id = trim($row[0]);
		/*echo "Valor de id:".$id;*/
	}
	else{
		$id=0;
	}
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
	<title>Gestión de servicios</title>
</head>
<style>
	td{		
		padding-top: 10px;
		text-align: center;
	}
	form{
		padding-bottom: 10px;
	}
</style>
<body>
	<?php include 'menu.php'; ?>
	<br>
	<div>
		<table style="width: 100%; text-align: center; border: 0px solid black;">
			<tr>
				<td>
					<svg id="addService" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" style="vertical-align: middle !important;" onclick="verAdd();">
						<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
					</svg>
					<label>Añadir servicio</label>
				</td>
				<td>
					<svg id="selectService" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="vertical-align: middle !important;" onclick="verConsulta();">
						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg>
					<label>Consultar</label>
				</td>
				<td>
					<svg id="delService" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16" style="vertical-align: middle !important;" onclick="verEliminar();">
						<path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
					</svg>
					<label>Eliminar servicio</label>
				</td>
			</tr>
		</table>
	</div>
	<br><br>
	<div align="center" id="existsService">
		<?php
			$selectServices="SELECT * FROM ServiciosProductos WHERE CEmpresa ='$CE'";
		?>
			<table style="width: 100%;">
				<tr>
					<td>
						ID SERVICIO
					</td>
					<td>
						NOMBRE DE SERVICIO
					</td>
					<td>
						DESCRIPCIÓN
					</td>
					<td>
						PRECIO UNITARIO
					</td>
				</tr>
				<?php
				$q=$conexion->query($selectServices);
					while ($valor=mysqli_fetch_array($q))
					{
						echo "<tr><td>".$valor[NombrePS]."
							</td><td>".$valor[PrecioU]."
							</td><td>".$valor[DescripP]."
							</td></tr>";
					}
				?>
			</table>
	</div>
	<div align="center" id="deleteServiceForm">
		<form id="formDelServ" method="GET" action="dataprocess.php">
			<br>
			<h5>Escribe el ID o el nombre del servicio que deseas eliminar</h5>
			<br>
			<table style="text-align: center;">
				<tr>
					<td>
						<label>ID de servicio</label>
					</td>
					<td>
						<input type="text" name="idServ"/>						
					</td>
				</tr>
				<tr>
					<td>
						<label>Nombre de servicio</label>
					</td>
					<td>
						<input type="text" name="nomServ"/>						
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<br>
						<p style="color: red;"><b>Catálogo de servicios:</b></p>
						<select id="idServDel">
							<?php
								$selectServices="SELECT NombrePS FROM ServiciosProductos WHERE id_servicio<>''";
								$q=$conexion->query($selectServices);
								while ($valor=mysqli_fetch_array($q))
								{
									echo "<option value=".$valor[NombrePS].">"."(".$valor[NombrePS].")".$valor[NombrePS]."</option>";
								}
							?>
						</select>
					</td>
				</tr>
			</table>
			<input name="flagDataProcess" type="text" value="e" style="display: none;"/>
			<br>
			<input id="btAddService" type="submit" value="Eliminar servicio" />
		</form>
	</div>
	<div align="center" id="addServiceForm">
		<form id="formServ" method="GET" action="dataprocess.php">
			<table style="text-align: center;">
				<tr>
					<td>
						<label>ID de servicio</label>
					</td>
					<td>
						<input type="text" name="idServ" required="true" />
						<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="red" class="bi bi-asterisk" viewBox="0 0 16 16" style="vertical-align: middle !important;">
							<path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
						</svg>
					</td>
				</tr>
				<tr>
					<td>
						<label>Nombre de servicio</label>
					</td>
					<td>
						<input type="text" name="nomServ" required="true" />
						<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="red" class="bi bi-asterisk" viewBox="0 0 16 16" style="vertical-align: middle !important;">
							<path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
						</svg>
					</td>
				</tr>
				<tr>
					<td>						
						<label>Descripción</label>
					</td>
					<td>
						<textarea name="descServ" id="descServId" cols="20" rows="5" style="width: 100%;"></textarea>						
					</td>
				</tr>
				<tr>
					<td>
						<label>Precio unitario</label>
					</td>
					<td>
						<input type="text" name="precioServ" required="true"/>
						<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="red" class="bi bi-asterisk" viewBox="0 0 16 16" style="vertical-align: middle !important;">
							<path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
						</svg>
					</td>
				</tr>
			</table>
			<input name="flagDataProcess" type="text" value="a" style="display: none;"/>			
			<br>
			<input id="btAddService" type="submit" value="Añadir nuevo"/>
		</form>
	</div>
</body>
<script>
	function verAdd() {
		document.getElementById('addServiceForm').style.display="block";
		document.getElementById('existsService').style.display="none";
		document.getElementById('deleteServiceForm').style.display="none";
	}
	function verConsulta() {
		window.location.reload(true);
		document.getElementById('addServiceForm').style.display="none";
		document.getElementById('existsService').style.display="block";
		document.getElementById('deleteServiceForm').style.display="none";
	}
	function verEliminar() {
		document.getElementById('addServiceForm').style.display="none";
		document.getElementById('existsService').style.display="none";
		document.getElementById('deleteServiceForm').style.display="block";
	}
	var currentLoc = window.location.href;
	var links = document.querySelectorAll('nav a');
	for (var i=0; i<links.length; i++) {
		if (links[i].href===currentLoc) {
			links[i].classList.add('active');
			break;
		}
	}
</script>
</html>